<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\Rules\{Rule, RuleActions};
use PowerComponents\LivewirePowerGrid\{Button, Column, Exportable, Footer, Header, PowerGrid, PowerGridComponent, PowerGridEloquent};
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
final class UserTable extends PowerGridComponent
{
    use ActionButton;
    use LivewireAlert;

    public  $name = null;


    protected array $rules = [
        'name.*' => ['required', 'min:6'],
    ];

    public function onUpdatedEditable($id, $field, $value): void
    {
        $this->validate();

        User::query()->find($id)->update([
            $field => $value,
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    |  Features Setup
    |--------------------------------------------------------------------------
    | Setup Table's general features
    |
    */
    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            Exportable::make('export')
                ->striped()
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()->showSearchInput(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),

        ];
    }

    public function header(): array
    {
        return [
            Button::make('tambah', 'Tambah')
               ->openModal('users.add', [
                            'confirmationTitle'       => 'Tambah User',
                            'roles'       => Role::query()->get(),
                        ])
                ->class('bg-green-500 cursor-pointer text-white px-3 py-2.5 m-1 rounded text-sm'),
            //    ->route('user.edit', ['user' => 'id']),


            Button::add('bulk-delete')
                ->caption(__('Bulk delete'))
                ->class('bg-red-500 cursor-pointer text-white px-3 py-2.5 m-1 rounded text-sm')
                ->emit('bulkDelete', [])
        ];
    }

     /*
    |--------------------------------------------------------------------------
    |  Event listeners
    |--------------------------------------------------------------------------
    | Add custom events to DishesTable
    |
     */
    protected function getListeners(): array
    {
        return array_merge(
            parent::getListeners(), [
                'edit-dish' => 'editDish',
                'bulkDelete',
            ]);
    }

     /*
    |--------------------------------------------------------------------------
    |  Bulk delete button
    |--------------------------------------------------------------------------
     */
    public function bulkDelete(): void
    {
        if (count($this->checkboxValues) == 0) {
            $this->alert('warning', 'Anda Belum Memilih data');

            return;
        }


        $this->emit('openModal', 'users.delete', [
            'userIds' => $this->checkboxValues,
            'userNames' => User::query()->whereIn('id', $this->checkboxValues)->get('name'),
            'confirmationTitle' => 'Delete User',
            'confirmationDescription' => 'Are you sure you want to delete this user?',
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    |  Datasource
    |--------------------------------------------------------------------------
    | Provides data to your Table using a Model or Collection
    |
    */

    /**
    * PowerGrid datasource.
    *
    * @return Builder<\App\Models\User>
    */
    public function datasource(): Builder
    {
        return User::query();
    }

    /*
    |--------------------------------------------------------------------------
    |  Relationship Search
    |--------------------------------------------------------------------------
    | Configure here relationships to be used by the Search and Table Filters.
    |
    */

    /**
     * Relationship search.
     *
     * @return array<string, array<int, string>>
     */
    public function relationSearch(): array
    {
        return [];
    }

    /*
    |--------------------------------------------------------------------------
    |  Add Column
    |--------------------------------------------------------------------------
    | Make Datasource fields available to be used as columns.
    | You can pass a closure to transform/modify the data.
    |
    | ❗ IMPORTANT: When using closures, you must escape any value coming from
    |    the database using the `e()` Laravel Helper function.
    |
    */
    public function addColumns(): PowerGridEloquent
    {
        return PowerGrid::eloquent()
            ->addColumn('id')
            ->addColumn('name')

           /** Example of custom column using a closure **/
            ->addColumn('name_lower', function (User $model) {
                return strtolower(e($model->name));
            })

            ->addColumn('role', function (User $model) {
                // return e( count($model->roles->pluck('name')));
                $roles = "";
                foreach ($model->getRoleNames() as $key => $role) {
                    $roles .= "<span class='inline-block whitespace-nowrap rounded-full bg-info-100 px-[0.65em] pt-[0.35em] pb-[0.25em] text-center align-baseline text-[0.75em] font-bold leading-none text-info-800'>".$role."</span>";
                }
                return e( count($model->roles->pluck('name'))) <= 0 ? "Tidak Ada Role" : $roles ;
            })

            ->addColumn('email')
            ->addColumn('created_at_formatted', fn (User $model) => Carbon::parse($model->created_at)->format('d/m/Y H:i:s'))
            ->addColumn('updated_at_formatted', fn (User $model) => Carbon::parse($model->updated_at)->format('d/m/Y H:i:s'));
    }



    /*
    |--------------------------------------------------------------------------
    |  Include Columns
    |--------------------------------------------------------------------------
    | Include the columns added columns, making them visible on the Table.
    | Each column can be configured with properties, filters, actions...
    |
    */

     /**
     * PowerGrid Columns.
     *
     * @return array<int, Column>
     */
    public function columns(): array
    {
        return [
            Column::make('ID', 'id')
                ->makeInputRange(),

            Column::make('NAME', 'name')
                ->sortable()
                ->searchable()
                ->editOnClick()
                ->makeInputText(),

            Column::make('EMAIL', 'email')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::make('Role', 'role')
                // ->sortable(),
                ->searchable(),
                // ->makeInputText(),



            // Column::make('CREATED AT', 'created_at_formatted', 'created_at')
            //     ->searchable()
            //     ->sortable()
            //     ->makeInputDatePicker(),

            // Column::make('UPDATED AT', 'updated_at_formatted', 'updated_at')
            //     ->searchable()
            //     ->sortable()
            //     ->makeInputDatePicker(),

        ]
;
    }

    /*
    |--------------------------------------------------------------------------
    | Actions Method
    |--------------------------------------------------------------------------
    | Enable the method below only if the Routes below are defined in your app.
    |
    */

     /**
     * PowerGrid User Action Buttons.
     *
     * @return array<int, Button>
     */


    public function actions(): array
    {
        $theme = config('livewire-powergrid.theme');

        $edit   = ($theme == 'tailwind') ? 'bg-indigo-500 cursor-pointer text-white px-3 py-2 m-1 rounded text-sm' : 'btn btn-primary';

        $delete = ($theme == 'tailwind') ? 'bg-red-500 text-white px-3 py-2 m-1 rounded text-sm' : 'btn btn-danger';

       return [
           Button::make('edit', 'Edit')
               ->openModal('users.update', [
                            'userId' => 'id',
                            'confirmationTitle'       => 'Update User',
                            'roles'       => Role::query()->get(),
                        ])
               ->class('bg-indigo-500 cursor-pointer text-white px-3 py-2.5 m-1 rounded text-sm'),
            //    ->route('user.edit', ['user' => 'id']),

            Button::add('destroy')
            ->caption(__('Delete'))
            ->class('bg-red-500 text-white px-3 py-2 m-1 rounded text-sm')
            ->openModal('users.delete', [
                'userId'                  => 'id',
                'userName'                => 'name',
                'confirmationTitle'       => 'Delete User',
                'confirmationDescription' => 'Are you sure you want to delete this user?',
            ]),

        ];
    }



    /*
    |--------------------------------------------------------------------------
    | Actions Rules
    |--------------------------------------------------------------------------
    | Enable the method below to configure Rules for your Table and Action Buttons.
    |
    */

     /**
     * PowerGrid User Action Rules.
     *
     * @return array<int, RuleActions>
     */


    public function actionRules(): array
    {
       return [

           //Hide button edit for ID 1
            Rule::button('destroy')
                ->when(fn($user) => $user->id === 1)
                ->hide(),

        ];
    }
}
