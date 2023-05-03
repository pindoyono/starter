<?php

namespace App\Http\Livewire\Ruangs;

use App\Models\Ruang;
use Livewire\Component;
use App\Models\Perusahaan;
use LivewireUI\Modal\ModalComponent;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Update extends ModalComponent
{

    use LivewireAlert;

    public string $confirmationTitle = '';
    public ?int $ruangId = null;

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


    public function mount(Ruang $ruang)
    {
        $data = Ruang::findOrFail($this->ruangId);

        $this->bidang_keahlian = $data->bidang_keahlian;
        $this->nama_ruang = $data->nama_ruang;
        $this->jumlah_siswa = $data->jumlah_siswa;
        $this->panjang = $data->panjang;
        $this->lebar = $data->lebar;
        $this->kondisi_ruang1 =  $data->kondisi_ruang1;
        $this->kondisi_ruang2 = $data->kondisi_ruang2;
        $this->kondisi_ruang3 = $data->kondisi_ruang3;
        $this->kondisi_ruang4 = $data->kondisi_ruang4;
        $this->kondisi_ruang5 = $data->kondisi_ruang5;
        $this->kondisi_ruang6 = $data->kondisi_ruang6;
        $this->kondisi_ruang7 = $data->kondisi_ruang7;
        $this->apd1 = $data->apd1;
        $this->apd2 = $data->apd2;
        $this->apd3 = $data->apd3;
        $this->keterangan = $data->keterangan;

        $this->rules = $this->rules();
    }

    public function update()
    {

        try {
            $this->validate();
            $data = Ruang::find($this->ruangId);
            $data->bidang_keahlian = $this->bidang_keahlian;
            $data->nama_ruang = $this->nama_ruang;
            $data->jumlah_siswa = $this->jumlah_siswa;
            $data->panjang = $this->panjang;
            $data->lebar = $this->lebar;
            $data->kondisi_ruang1 = $this->kondisi_ruang1;
            $data->kondisi_ruang2 = $this->kondisi_ruang2;
            $data->kondisi_ruang3 = $this->kondisi_ruang3;
            $data->kondisi_ruang4 = $this->kondisi_ruang4;
            $data->kondisi_ruang5 = $this->kondisi_ruang5;
            $data->kondisi_ruang6 = $this->kondisi_ruang6;
            $data->kondisi_ruang7 = $this->kondisi_ruang7;
            $data->apd1 = $this->apd1;
            $data->apd2 = $this->apd2;
            $data->apd3 = $this->apd3;
            $data->keterangan = $this->keterangan;

            $data->save();

            $this->closeModal();
            $this->alert('success', 'Berhasil Update Data');
            $this->closeModalWithEvents([
                'pg:eventRefresh-default',
            ]);
        }  catch (QueryException $exception) {
            //throw $th;
            $this->alert('warning', 'Gagal Update Data'.$exception);
        }
    }



    public function render()
    {
        return view('livewire.ruangs.update');
    }
}
