<?php

namespace App\Http\Livewire\Ruangs;

use App\Models\Ruang;
use Livewire\Component;
use App\Models\Perusahaan;
use LivewireUI\Modal\ModalComponent;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Add extends ModalComponent
{
    use LivewireAlert;

    public string $confirmationTitle = '';
    public $bidang_keahlian;
    public $nama_ruang;
    public $jumlah_siswa;
    public $panjang;
    public $lebar;
    public $kondisi_ruang1;
    public $kondisi_ruang2;
    public $kondisi_ruang3;
    public $kondisi_ruang4;
    public $kondisi_ruang5;
    public $kondisi_ruang6;
    public $kondisi_ruang7;
    public $apd1;
    public $apd2;
    public $apd3;
    public $keterangan;



    public function rules()
    {
         return [
            'nama_ruang' => 'required',
            'jumlah_siswa' => 'required|numeric',
            'panjang' => 'required|numeric',
            'lebar' => 'required|numeric',
            'keterangan' => 'required',
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
                'bidang_keahlian' => $this->bidang_keahlian,
                'nama_ruang' => $this->nama_ruang,
                'jumlah_siswa' => $this->jumlah_siswa,
                'panjang' => $this->panjang,
                'lebar' => $this->lebar,
                'kondisi_ruang1' => $this->kondisi_ruang1,
                'kondisi_ruang2' => $this->kondisi_ruang2,
                'kondisi_ruang3' => $this->kondisi_ruang3,
                'kondisi_ruang4' => $this->kondisi_ruang4,
                'kondisi_ruang5' => $this->kondisi_ruang5,
                'kondisi_ruang6' => $this->kondisi_ruang6,
                'kondisi_ruang7' => $this->kondisi_ruang7,
                'apd1' => $this->apd1,
                'apd2' => $this->apd2,
                'apd3' => $this->apd3,
                'keterangan' => $this->keterangan,
            ];
            $data = Ruang::create($data);
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
        return view('livewire.ruangs.add');
    }
}
