<?php

namespace App\Http\Livewire;

use App\Models\Lowongan;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Exportable;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\PowerGridEloquent;
use PowerComponents\LivewirePowerGrid\Rules\Rule;
use PowerComponents\LivewirePowerGrid\Rules\RuleActions;use PowerComponents\LivewirePowerGrid\Traits\ActionButton;

final class LowonganTable extends PowerGridComponent
{
    use ActionButton;

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
                ->openModal('lowongans.add', [
                    'confirmationTitle' => 'Tambah Data',
                ])
                ->can(Auth::user()->hasRole('admin'))
                ->class('bg-green-500 cursor-pointer text-white px-3 py-2.5 m-1 rounded text-sm'),
            //    ->route('user.edit', ['user' => 'id']),

            Button::add('bulk-delete')
                ->caption(__('Bulk delete'))
                ->class('bg-red-500 cursor-pointer text-white px-3 py-2.5 m-1 rounded text-sm')
                ->can(Auth::user()->hasRole('admin'))
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

        $this->emit('openModal', 'lowongans.delete', [
            'lowonganIds' => $this->checkboxValues,
            'lowonganNames' => Lowongan::query()->whereIn('id', $this->checkboxValues)->get('job_title'),
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
     * @return Builder<\App\Models\Lowongan>
     */
    public function datasource(): Builder
    {
        return Lowongan::query();
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
            ->addColumn('job_title')

        /** Example of custom column using a closure **/
            ->addColumn('job_title_lower', function (Lowongan $model) {
                return strtolower(e($model->job_title));
            })

            ->addColumn('job_description')
            ->addColumn('job_location')
            ->addColumn('job_salary')
            ->addColumn('job_requirements')
            ->addColumn('job_contact')
            ->addColumn('created_at_formatted', fn(Lowongan $model) => Carbon::parse($model->created_at)->format('d/m/Y H:i:s'))
            ->addColumn('updated_at_formatted', fn(Lowongan $model) => Carbon::parse($model->updated_at)->format('d/m/Y H:i:s'));
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
            Column::make('ID', 'id'),
            // ->makeInputRange(),

            Column::make('Judul Pekerjaan', 'job_title')
                ->sortable()
                ->searchable(),
            // ->makeInputText(),

            Column::make('Deskripsi Pekerjaan', 'job_description')
                ->sortable(),
            // ->searchable(),

            Column::make('Lokasi', 'job_location')
                ->sortable()
                ->searchable(),
            // ->makeInputText(),

            Column::make('Gaji', 'job_salary')
                ->sortable()
                ->searchable(),
            // ->makeInputText(),

            Column::make('Syarat', 'job_requirements')
                ->sortable()
                ->searchable(),

            Column::make('Kontak', 'job_contact')
                ->sortable()
                ->searchable(),
            // ->makeInputText(),

            // Column::make('CREATED AT', 'created_at_formatted', 'created_at')
            //     ->searchable()
            //     ->sortable(),
            // ->makeInputDatePicker(),

            // Column::make('UPDATED AT', 'updated_at_formatted', 'updated_at')
            //     ->searchable()
            //     ->sortable(),
            // ->makeInputDatePicker(),

        ];
    }

    public function actions(): array
    {
        $theme = config('livewire-powergrid.theme');

        $edit = ($theme == 'tailwind') ? 'bg-indigo-500 cursor-pointer text-white px-3 py-2 m-1 rounded text-sm' : 'btn btn-primary';

        $delete = ($theme == 'tailwind') ? 'bg-red-500 text-white px-3 py-2 m-1 rounded text-sm' : 'btn btn-danger';

        return [
            Button::make('edit', 'Edit')
                ->openModal('lowongans.update', [
                    'lowonganId' => 'id',
                    'confirmationTitle' => 'Update Data',
                ])
                ->class('bg-indigo-500 cursor-pointer text-white px-3 py-2.5 m-1 rounded text-sm'),
            //    ->route('user.edit', ['user' => 'id']),

            Button::add('destroy')
                ->caption(__('Hapus'))
                ->class('bg-red-500 text-white px-3 py-2 m-1 rounded text-sm')
                ->openModal('lowongans.delete', [
                    'lowonganId' => 'id',
                    'lowonganName' => 'job_title',
                    'confirmationTitle' => 'Hapus Data',
                    'confirmationDescription' => 'Apakah Anda yakin ingin menghapus data ini?',
                ]),

        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Actions Method
    |--------------------------------------------------------------------------
    | Enable the method below only if the Routes below are defined in your app.
    |
     */

    /**
     * PowerGrid Lowongan Action Buttons.
     *
     * @return array<int, Button>
     */

    /*
    public function actions(): array
    {
    return [
    Button::make('edit', 'Edit')
    ->class('bg-indigo-500 cursor-pointer text-white px-3 py-2.5 m-1 rounded text-sm')
    ->route('lowongan.edit', ['lowongan' => 'id']),

    Button::make('destroy', 'Delete')
    ->class('bg-red-500 cursor-pointer text-white px-3 py-2 m-1 rounded text-sm')
    ->route('lowongan.destroy', ['lowongan' => 'id'])
    ->method('delete')
    ];
    }
     */

    /*
    |--------------------------------------------------------------------------
    | Actions Rules
    |--------------------------------------------------------------------------
    | Enable the method below to configure Rules for your Table and Action Buttons.
    |
     */

    /**
     * PowerGrid Lowongan Action Rules.
     *
     * @return array<int, RuleActions>
     */

    /*
public function actionRules(): array
{
return [

//Hide button edit for ID 1
Rule::button('edit')
->when(fn($lowongan) => $lowongan->id === 1)
->hide(),
];
}
 */
}
