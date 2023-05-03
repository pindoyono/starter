<?php

namespace App\Http\Livewire\Perusahaans;

use App\Models\Perusahaan;
use LivewireUI\Modal\ModalComponent;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Update extends ModalComponent
{
    use LivewireAlert;

    public string $confirmationTitle = '';
    public ?int $perusahaanId = null;

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
        $data = Perusahaan::findOrFail($this->perusahaanId);

        $this->nama = $data->nama;
        $this->bidang_usaha = $data->bidang_usaha;
        $this->bidang_usaha = $data->bidang_usaha;
        $this->fax = $data->fax;
        $this->fax = $data->fax;
        $this->fax = $data->fax;
        $this->fax = $data->fax;
        $this->alamat = $data->alamat;
        $this->rt = $data->rt;
        $this->rw = $data->rw;
        $this->nama_dusun = $data->nama_dusun;
        $this->kelurahan = $data->kelurahan;
        $this->kecamatan = $data->kecamatan;
        $this->kabupaten = $data->kabupaten;
        $this->nakode_posma = $data->kode_pos;
        $this->lintang = $data->lintang;
        $this->bujur = $data->bujur;

        $this->rules = $this->rules();
    }

    public function render()
    {
        return view('livewire.perusahaans.update');
    }
}
