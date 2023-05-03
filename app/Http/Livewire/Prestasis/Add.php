<?php

namespace App\Http\Livewire\Prestasis;

use App\Models\Sekolah;
use Livewire\Component;
use App\Models\Prestasi;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Add extends ModalComponent
{
    public $prestasi;
    public $keterangan;
    public $berkas;

    use WithFileUploads;
    use LivewireAlert;


    public string $confirmationTitle = '';

    public function rules()
    {
         return [
            'prestasi' => 'required',
            'keterangan' => 'required',
            'berkas' => 'required|mimetypes:application/pdf|max:10000',
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


    public function mount(Prestasi $sekolah)
    {
        $this->rules = $this->rules();
    }


    public function save()
    {
        // dd(array_values($this->role_user));
        try {
            $this->validate();
            $data = [
                'prestasi' => $this->prestasi,
                'keterangan' => $this->keterangan,
                'berkas' => 'berkas_prestasi/'.time().'_'.$this->prestasi.'.'.$this->berkas->extension(),
            ];
            $prestasi = Prestasi::create($data);

            if($prestasi){
                $this->berkas->storeAs('public/berkas_prestasi/', time().'_'.$this->prestasi.'.'.$this->berkas->extension());
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
        return view('livewire.prestasis.add');
    }
}
