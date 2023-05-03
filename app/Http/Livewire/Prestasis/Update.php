<?php

namespace App\Http\Livewire\Prestasis;

use App\Models\Prestasi;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;
use Illuminate\Support\Facades\Storage;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Update extends ModalComponent
{
    public $prestasi;
    public $keterangan;
    public $berkas;
    public ?int $prestasiId = null;

    use WithFileUploads;
    use LivewireAlert;


    public string $confirmationTitle = '';

    public function rules()
    {
         return [
            // 'prestasi' => 'required',
            'berkas' => 'required',
            // 'logo' => 'required|image|mimes:jpg,bmp,png|max:5120',
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


    public function mount(Prestasi $prestasi)
    {
        $data = Prestasi::findOrFail($this->prestasiId);
        $this->prestasi = $data->prestasi;
        $this->keterangan = $data->keterangan;
        $this->berkas = $data->berkas;
        $this->preview_berkas = $data->berkas;

        $this->rules = $this->rules();
    }

    public function update()
    {
        // if ($this->logo) {
        //     dd($this->logo);
        // }else{
        //     dd('kosong');
        // }
        // dd($this->berkas);
        try {
            $this->validate();
            $data = Prestasi::find($this->prestasiId);


            // 'logo' => 'logo_sekolah/'.date('Ymd').'.'.$this->logo->extension(),
            // 'berkas' => 'berkas_prestasi/'.time().'_'.$this->prestasi.'.'.$this->berkas->extension(),
            // dd($data->berkas);

                if(Storage::exists('public/'.$data->berkas)){
                    Storage::delete('public/'.$data->berkas);
                    /*
                        Delete Multiple files this way
                        Storage::delete(['upload/test.png', 'upload/test2.png']);
                    */
                }else{
                    $this->alert('error', 'File does not exist');
                }

                $this->berkas->storeAs('public/berkas_prestasi/', time().'_'.$this->prestasi.'.'.$this->berkas->extension());
                $data->berkas = 'berkas_prestasi/'.time().'_'.$this->prestasi.'.'.$this->berkas->extension();


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
        return view('livewire.prestasis.update');
    }
}
