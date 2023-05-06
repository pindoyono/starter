<?php

namespace App\Http\Livewire;

use App\Models\Perusahaan;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Rules\{Rule, RuleActions};
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\{Button, Column, Exportable, Footer, Header, PowerGrid, PowerGridComponent, PowerGridEloquent};

final class PerusahaanTable extends PowerGridComponent
{
    use ActionButton;
    public  $nama = null;
    public $bidang_usaha = null;
    public $no_telpon = null;
    public $fax = null;
    public $email = null;
    public $website = null;
    public $npwp = null;
    public $alamat = null;
    public $rt = null;
    public $rw = null;
    public $nama_dusun = null;
    public $kelurahan = null;
    public $kecamatan = null;
    public $kabupaten = null;
    public $kode_pos = null;
    public $lintang = null;
    public $bujur = null;

    protected array $rules = [
        'nama.*' => ['required'],
        'bidang_usaha.*' => ['required'],
        'no_telpon.*' => ['required'],
        'alamat.*' => ['required'],
        'kode_pos.*' => ['required'],
    ];

    public function onUpdatedEditable($id, $field, $value): void
    {
        $this->validate();

        Perusahaan::query()->find($id)->update([
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
                ->openModal('perusahaans.add', [
                    'confirmationTitle' => 'Tambah Perusahaan',
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

        $this->emit('openModal', 'perusahaans.delete', [
            'perusahaanIds' => $this->checkboxValues,
            'perusahaanNames' => Perusahaan::query()->whereIn('id', $this->checkboxValues)->get('nama'),
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
    * @return Builder<\App\Models\Perusahaan>
    */
    public function datasource(): Builder
    {
        return Perusahaan::query();
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
            ->addColumn('nama')

           /** Example of custom column using a closure **/
            ->addColumn('nama_lower', function (Perusahaan $model) {
                return strtolower(e($model->nama));
            })

            ->addColumn('bidang_usaha')
            ->addColumn('no_telpon')
            ->addColumn('fax')
            ->addColumn('email')
            ->addColumn('website')
            ->addColumn('npwp')
            ->addColumn('alamat')
            ->addColumn('rt')
            ->addColumn('rw')
            ->addColumn('nama_dusun')
            ->addColumn('kelurahan')
            ->addColumn('kecamatan')
            ->addColumn('kabupaten')
            ->addColumn('kode_pos')
            ->addColumn('lintang')
            ->addColumn('bujur')
            ->addColumn('created_at_formatted', fn (Perusahaan $model) => Carbon::parse($model->created_at)->format('d/m/Y H:i:s'))
            ->addColumn('updated_at_formatted', fn (Perusahaan $model) => Carbon::parse($model->updated_at)->format('d/m/Y H:i:s'));
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
            //     ->makeInputRange(),

            Column::make('NAMA', 'nama')
                ->sortable()
                ->editOnClick()
                ->searchable(),
                // ->makeInputText(),

            Column::make('BIDANG USAHA', 'bidang_usaha')
                ->sortable()
                ->editOnClick()
                ->searchable(),
                // ->makeInputText(),

            Column::make('NO TELPON', 'no_telpon')
                ->sortable()
                ->editOnClick()
                ->searchable(),
                // ->makeInputText(),

            Column::make('FAX', 'fax')
                ->sortable()
                ->editOnClick()
                ->searchable(),
                // ->makeInputText(),

            Column::make('EMAIL', 'email')
                ->sortable()
                ->editOnClick()
                ->searchable(),
                // ->makeInputText(),

            Column::make('WEBSITE', 'website')
                ->sortable()
                ->editOnClick()
                ->searchable(),
                // ->makeInputText(),

            Column::make('NPWP', 'npwp')
                ->sortable()
                ->editOnClick()
                ->searchable(),
                // ->makeInputText(),

            Column::make('ALAMAT', 'alamat')
                ->sortable()
                ->editOnClick()
                ->searchable(),

            Column::make('RT', 'rt')
                ->sortable()
                ->editOnClick()
                ->searchable(),
                // ->makeInputText(),

            Column::make('RW', 'rw')
                ->sortable()
                ->editOnClick()
                ->searchable(),
                // ->makeInputText(),

            Column::make('NAMA DUSUN', 'nama_dusun')
                ->sortable()
                ->editOnClick()
                ->searchable(),
                // ->makeInputText(),

            Column::make('KELURAHAN', 'kelurahan')
                ->sortable()
                ->editOnClick()
                ->searchable(),
                // ->makeInputText(),

            Column::make('KECAMATAN', 'kecamatan')
                ->sortable()
                ->editOnClick()
                ->searchable(),
                // ->makeInputText(),

            Column::make('KABUPATEN', 'kabupaten')
                ->sortable()
                ->editOnClick()
                ->searchable(),
                // ->makeInputText(),

            Column::make('KODE POS', 'kode_pos')
                ->sortable()
                ->editOnClick()
                ->searchable(),
                // ->makeInputText(),

            Column::make('LINTANG', 'lintang')
                ->sortable()
                ->editOnClick()
                ->searchable(),
                // ->makeInputText(),

            Column::make('BUJUR', 'bujur')
                ->sortable()
                ->editOnClick()
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

        ]
;
    }

    public function actions(): array
    {
        $theme = config('livewire-powergrid.theme');

        $edit = ($theme == 'tailwind') ? 'bg-indigo-500 cursor-pointer text-white px-3 py-2 m-1 rounded text-sm' : 'btn btn-primary';

        $delete = ($theme == 'tailwind') ? 'bg-red-500 text-white px-3 py-2 m-1 rounded text-sm' : 'btn btn-danger';

        return [
            // Button::make('edit', 'Edit')
            //     ->openModal('perusahaans.update', [
            //         'perusahaanId' => 'id',
            //         'confirmationTitle' => 'Update Data',
            //     ])
            //     ->class('bg-indigo-500 cursor-pointer text-white px-3 py-2.5 m-1 rounded text-sm'),
            //    ->route('user.edit', ['user' => 'id']),

            Button::add('destroy')
                ->caption(__('Hapus'))
                ->class('bg-red-500 text-white px-3 py-2 m-1 rounded text-sm')
                ->openModal('perusahaans.delete', [
                    'perusahaanId' => 'id',
                    'perusahaanName' => 'nama',
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
     * PowerGrid Perusahaan Action Buttons.
     *
     * @return array<int, Button>
     */

    /*
    public function actions(): array
    {
       return [
           Button::make('edit', 'Edit')
               ->class('bg-indigo-500 cursor-pointer text-white px-3 py-2.5 m-1 rounded text-sm')
               ->route('perusahaan.edit', ['perusahaan' => 'id']),

           Button::make('destroy', 'Delete')
               ->class('bg-red-500 cursor-pointer text-white px-3 py-2 m-1 rounded text-sm')
               ->route('perusahaan.destroy', ['perusahaan' => 'id'])
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
     * PowerGrid Perusahaan Action Rules.
     *
     * @return array<int, RuleActions>
     */

    /*
    public function actionRules(): array
    {
       return [

           //Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($perusahaan) => $perusahaan->id === 1)
                ->hide(),
        ];
    }
    */


}
