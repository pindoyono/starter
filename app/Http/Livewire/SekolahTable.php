<?php

namespace App\Http\Livewire;

use App\Models\Sekolah;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Exportable;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\PowerGridEloquent;
use PowerComponents\LivewirePowerGrid\Rules\Rule;
use PowerComponents\LivewirePowerGrid\Rules\RuleActions;
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;

final class SekolahTable extends PowerGridComponent
{
    use ActionButton;
    use LivewireAlert;

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
                ->openModal('sekolahs.add', [
                    'confirmationTitle' => 'Tambah Sekolah',
                ])
                ->can(Auth::user()->hasRole('admin'))
                ->class('bg-green-500 cursor-pointer text-white px-3 py-2.5 m-1 rounded text-sm'),
            //    ->route('user.edit', ['user' => 'id']),

            Button::add('bulk-delete')
                ->caption(__('Bulk delete'))
                ->class('bg-red-500 cursor-pointer text-white px-3 py-2.5 m-1 rounded text-sm')
                ->emit('bulkDelete', [])
                ->can(Auth::user()->hasRole('admin'))
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

        $this->emit('openModal', 'sekolahs.delete', [
            'SekolahIds' => $this->checkboxValues,
            'SekolahNames' => Sekolah::query()->whereIn('id', $this->checkboxValues)->get('nama'),
            'SekolahLogos' => Sekolah::query()->whereIn('id', $this->checkboxValues)->get('logo'),
            'confirmationTitle' => 'Hapus Data',
            'confirmationDescription' => 'Apakah anda yakin ingin menghapus data ini',
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
     * @return Builder<\App\Models\Sekolah>
     */
    public function datasource(): Builder
    {
        if (Auth::user()->hasRole('admin')) {
            return Sekolah::query();
        } else {
            return Sekolah::query()->where('user_id', Auth::user()->id);
        }
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
            ->addColumn('logo', function (Sekolah $model) {
                return '
                <img  src="' . asset('storage/' . e($model->logo)) . '"  class="h-10 max-w-sm transition-shadow duration-300 ease-in-out rounded-lg shadow-none hover:shadow-lg hover:shadow-black/30" alt="" />';
            })
            ->addColumn('nama')

        /** Example of custom column using a closure **/
            ->addColumn('nama_lower', function (Sekolah $model) {
                return strtolower(e($model->nama));
            })

            ->addColumn('alamat')
            ->addColumn('tipe')
            ->addColumn('kurikulum')
            ->addColumn('no_hp')
            ->addColumn('provinsi')
            ->addColumn('kabupaten');
        // ->addColumn('created_at_formatted', fn (Sekolah $model) => Carbon::parse($model->created_at)->format('d/m/Y H:i:s'))
        // ->addColumn('updated_at_formatted', fn (Sekolah $model) => Carbon::parse($model->updated_at)->format('d/m/Y H:i:s'));
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
            // Column::make('ID', 'id')
            // ->makeInputRange(),

            Column::make('LOGO', 'logo'),
            // ->sortable()
            // ->searchable(),

            Column::make('NAMA', 'nama')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::make('ALAMAT', 'alamat')
                ->sortable()
                ->searchable(),
            // ->makeInputText(),

            Column::make('TIPE', 'tipe')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::make('KURIKULUM', 'kurikulum')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::make('NO HP', 'no_hp')
                ->sortable()
                ->searchable(),
            // ->makeInputText(),

            Column::make('PROVINSI', 'provinsi')
                ->sortable()
                ->searchable(),
            // ->makeInputText(),

            Column::make('KABUPATEN', 'kabupaten')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            // Column::make('CREATED AT', 'created_at_formatted', 'created_at')
            //     ->searchable()
            //     ->sortable(),
            // ->makeInputDatePicker(),

            // Column::make('UPDATED AT', 'updated_at_formatted', 'updated_at')
            //     ->searchable()
            //     ->sortable(),
            // ->makeInputDatePicker(),

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
     * PowerGrid Sekolah Action Buttons.
     *
     * @return array<int, Button>
     */

    public function actions(): array
    {
        $theme = config('livewire-powergrid.theme');

        $edit = ($theme == 'tailwind') ? 'bg-indigo-500 cursor-pointer text-white px-3 py-2 m-1 rounded text-sm' : 'btn btn-primary';

        $delete = ($theme == 'tailwind') ? 'bg-red-500 text-white px-3 py-2 m-1 rounded text-sm' : 'btn btn-danger';

        return [
            Button::make('edit', 'Edit')
                ->openModal('sekolahs.update', [
                    'sekolahId' => 'id',
                    'confirmationTitle' => 'Update User',
                    'users' => User::query()->select('id', 'name')->get(),

                ])
                ->class('bg-indigo-500 cursor-pointer text-white px-3 py-2.5 m-1 rounded text-sm'),
            //    ->route('user.edit', ['user' => 'id']),

            Button::add('destroy')
                ->caption(__('Delete'))
                ->class('bg-red-500 text-white px-3 py-2 m-1 rounded text-sm')
                ->openModal('sekolahs.delete', [
                    'SekolahId' => 'id',
                    'SekolahName' => 'nama',
                    'confirmationTitle' => 'Hapus Data',
                    'confirmationDescription' => 'Apakah Anda yakin inginmenghapus data ini?',
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
     * PowerGrid Sekolah Action Rules.
     *
     * @return array<int, RuleActions>
     */

    /*
public function actionRules(): array
{
return [

//Hide button edit for ID 1
Rule::button('edit')
->when(fn($sekolah) => $sekolah->id === 1)
->hide(),
];
}
 */
}
