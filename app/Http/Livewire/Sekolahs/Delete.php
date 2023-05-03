<?php

namespace App\Http\Livewire\Sekolahs;

use App\Models\Sekolah;
use LivewireUI\Modal\ModalComponent;
use Illuminate\Support\Facades\Storage;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Delete extends ModalComponent
{
    use LivewireAlert;
    public ?int $SekolahId = null;

    public array $SekolahIds = [];
    public array $SekolahNames = [];
    public array $Sekolahlogos = [];

    public string $confirmationTitle = '';

    public string $confirmationDescription = '';

    public string $SekolahName = '';

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
        if ($this->SekolahId) {
            $data = Sekolah::query()->find($this->SekolahId);

            if(Storage::exists('public/'.$data->logo)){
                Storage::delete('public/'.$data->logo);
                /*
                    Delete Multiple files this way
                    Storage::delete(['upload/test.png', 'upload/test2.png']);
                */
                $data->delete();
                $this->alert('success', 'Data Berhasil Di Hapus');

            }else{
                $this->alert('error', 'File does not exist');
            }
            // $data->delete();

        }

        if ($this->SekolahIds) {
            $data = Sekolah::query()->whereIn('id', $this->SekolahIds)->get();
            // dd($data);
            foreach ($data as $key => $dat) {
                if(Storage::exists('public/'.$dat->logo)){
                    Storage::delete('public/'.$dat->logo);
                    /*
                        Delete Multiple files this way
                        Storage::delete(['upload/test.png', 'upload/test2.png']);
                    */

                }else{
                    $this->alert('error', 'File does not exist');
                }
            }
            Sekolah::query()->whereIn('id', $this->SekolahIds)->delete();
            $this->alert('success', 'Data Berhasil Di Hapus');

            // $this->alert('success', 'Data Berhasil Di Hapus');
        }

        $this->closeModalWithEvents([
            'pg:eventRefresh-default',
        ]);
    }

    public function render()
    {
        return view('livewire.sekolahs.delete');
    }
}
