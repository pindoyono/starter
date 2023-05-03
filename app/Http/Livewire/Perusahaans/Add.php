<?php

namespace App\Http\Livewire\Perusahaans;

use App\Models\Perusahaan;
use LivewireUI\Modal\ModalComponent;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Add extends ModalComponent
{
    use LivewireAlert;

    public string $confirmationTitle = '';

    public $nama;
    public $bidang_usaha;
    public $no_telpon;
    public $fax;
    public $email;
    public $website;
    public $npwp;
    public $alamat;
    public $rt;
    public $rw;
    public $nama_dusun;
    public $kelurahan;
    public $kecamatan;
    public $kabupaten;
    public $kode_pos;
    public $lintang;
    public $bujur;

    public function rules()
    {
         return [
            'nama' => 'required',
            'bidang_usaha' => 'required',
            'no_telpon' => 'required',
            'alamat' => 'required',
            'kode_pos' => 'required',
        ];
    }

    public static function modalMaxWidth(): string
    {
        return '4xl';
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


    public function mount(Perusahaan $sekolah)
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
                'bidang_usaha' => $this->bidang_usaha,
                'no_telpon' => $this->no_telpon,
                'fax' => $this->fax,
                'email' => $this->email,
                'website' => $this->website,
                'npwp' => $this->npwp,
                'alamat' => $this->alamat,
                'rt' => $this->rt,
                'rw' => $this->rw,
                'nama_dusun' => $this->nama_dusun,
                'kelurahan' => $this->kelurahan,
                'kecamatan' => $this->kecamatan,
                'kabupaten' => $this->kabupaten,
                'kode_pos' => $this->kode_pos,
                'lintang' => $this->lintang,
                'bujur' => $this->bujur,
            ];
            $data = Perusahaan::create($data);
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
        return view('livewire.perusahaans.add');
    }
}
