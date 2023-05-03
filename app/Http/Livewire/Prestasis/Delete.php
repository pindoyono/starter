<?php

namespace App\Http\Livewire\Prestasis;

use Livewire\Component;
use App\Models\Prestasi;
use LivewireUI\Modal\ModalComponent;
use Illuminate\Support\Facades\Storage;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Delete extends ModalComponent
{
    use LivewireAlert;
    public ?int $prestasiId = null;

    public array $prestasiIds = [];
    public array $prestasiNames = [];
    public array $prestasilogos = [];

    public string $confirmationTitle = '';

    public string $confirmationDescription = '';

    public string $prestasiName = '';

    public static function modalMaxWidth(): string
    {
        return 'md';
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

    public function confirm()
    {
        if ($this->prestasiId) {
            $data = Prestasi::query()->find($this->prestasiId);

            if(Storage::exists('public/'.$data->berkas)){
                Storage::delete('public/'.$data->berkas);
                /*
                    Delete Multiple files this way
                    Storage::delete(['upload/test.png', 'upload/test2.png']);
                */
                $data->delete();
                $this->alert('success', 'Data Berhasil Di Hapus');

            }else{
                $data->delete();
                $this->alert('success', 'Data Berhasil Di Hapus');
                // $this->alert('error', 'File does not exist');
            }
            // $data->delete();

        }

        if ($this->prestasiIds) {
            $data = prestasi::query()->whereIn('id', $this->prestasiIds)->get();
            // dd($data);
            foreach ($data as $key => $dat) {
                if(Storage::exists('public/'.$dat->berkas)){
                    Storage::delete('public/'.$dat->berkas);
                    /*
                        Delete Multiple files this way
                        Storage::delete(['upload/test.png', 'upload/test2.png']);
                    */

                }else{
                    $this->alert('error', 'File does not exist');
                }
            }
            prestasi::query()->whereIn('id', $this->prestasiIds)->delete();
            $this->alert('success', 'Data Berhasil Di Hapus');

            // $this->alert('success', 'Data Berhasil Di Hapus');
        }

        $this->closeModalWithEvents([
            'pg:eventRefresh-default',
        ]);
    }


    public function render()
    {
        return view('livewire.prestasis.delete');
    }
}
