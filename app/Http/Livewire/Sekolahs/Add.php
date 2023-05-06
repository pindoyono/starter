<?php

namespace App\Http\Livewire\Sekolahs;


use App\Models\Sekolah;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Add extends ModalComponent
{
    public $nama;
    public $alamat;
    public $tipe;
    public $kurikulum;
    public $no_hp;
    public $provinsi;
    public $kabupaten;
    public $logo;

    use WithFileUploads;
    use LivewireAlert;


    public string $confirmationTitle = '';

    public function rules()
    {
         return [
            'nama' => 'required',
            'alamat' => 'required',
            'tipe' => 'required',
            'kurikulum' => 'required',
            'no_hp' => 'required',
            'provinsi' => 'required',
            'kabupaten' => 'required',
            'logo' => 'required|image|mimes:jpg,bmp,png|max:5120',
        ];
    }

    public static function modalMaxWidth(): string
    {
        return '2xl';
    }

    public static function closeModalOnEscape(): bool
    {
        return false;
    }

    public static function closeModalOnClickAway(): bool
    {
        return false;
    }

    public function cancel()
    {
        $this->closeModal();
    }


    public function mount(Sekolah $sekolah)
    {
        $this->rules = $this->rules();
    }

    public function save()
    {
        // dd(array_values($this->role_user));
        try {
            $this->validate();
            $data = [
                'nama' => $this->nama,
                'alamat' => $this->alamat,
                'tipe' => $this->tipe,
                'kurikulum' => $this->kurikulum,
                'no_hp' => $this->no_hp,
                'provinsi' => $this->provinsi,
                'kabupaten' => $this->kabupaten,
                'logo' => 'logo_sekolah/'.time().'.'.$this->logo->extension(),
            ];
            $sekolah = Sekolah::create($data);

            if($sekolah){
                $this->logo->storeAs('public/logo_sekolah/', time().'.'.$this->logo->extension());
                $this->alert('success', 'Berhasil Tambah Data');
            }
            $this->closeModal();
        }  catch (QueryException $exception) {
            //throw $th;
            $this->alert('warning', 'Gagal Tambah Data'.$exception);
        }


        $this->closeModalWithEvents([
            'pg:eventRefresh-default',
        ]);

    }

    public function render()
    {
        return view('livewire.sekolahs.add');
    }
}
