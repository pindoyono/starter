<?php

namespace App\Http\Livewire\Sekolahs;

use App\Models\Sekolah;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use LivewireUI\Modal\ModalComponent;
use Livewire\WithFileUploads;

class Update extends ModalComponent
{
    public $nama;
    public $alamat;
    public $tipe;
    public $kurikulum;
    public $no_hp;
    public $provinsi;
    public $kabupaten;
    public $logo;
    public $user_id;
    public array $users = [];
    public ?int $sekolahId = null;

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
            // 'logo' => 'required|image|mimes:jpg,bmp,png|max:5120',
        ];
    }

    public static function modalMaxWidth() : string
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

    public function mount(User $users)
    {
        $data = Sekolah::findOrFail($this->sekolahId);
        $this->nama = $data->nama;
        $this->alamat = $data->alamat;
        $this->tipe = $data->tipe;
        $this->kurikulum = $data->kurikulum;
        $this->no_hp = $data->no_hp;
        $this->provinsi = $data->provinsi;
        $this->kabupaten = $data->kabupaten;
        $this->preview_logo = $data->logo;
        $this->user_id = $data->user_id;

        $this->rules = $this->rules();
    }

    public function update(Request $request)
    {
        // if ($this->logo) {
        //     dd($this->logo);
        // }else{
        //     dd('kosong');
        // }
        // dd(array_values($this->role_user));
        try {
            $this->validate();
            $data = Sekolah::find($this->sekolahId);
            $data->nama = $this->nama;
            $data->alamat = $this->alamat;
            $data->tipe = $this->tipe;
            $data->kurikulum = $this->kurikulum;
            $data->no_hp = $this->no_hp;
            $data->provinsi = $this->provinsi;
            $data->kabupaten = $this->kabupaten;
            $data->user_id = $this->user_id;

            // 'logo' => 'logo_sekolah/'.date('Ymd').'.'.$this->logo->extension(),

            if ($this->logo) {
                if (Storage::exists('public/' . $this->logo)) {
                    Storage::delete('public/' . $this->logo);
                    /*
                Delete Multiple files this way
                Storage::delete(['upload/test.png', 'upload/test2.png']);
                 */
                } else {
                    $this->alert('error', 'File does not exist');
                }
                $this->logo->storeAs('public/logo_sekolah/', time() . '.' . $this->logo->extension());
                $data->logo = 'logo_sekolah/' . time() . '.' . $this->logo->extension();

            }

            $data->save();

            $this->closeModal();
            $this->alert('success', 'Berhasil Update Data');
            $this->closeModalWithEvents([
                'pg:eventRefresh-default',
            ]);
        } catch (QueryException $exception) {
            //throw $th;
            $this->alert('warning', 'Gagal Update Data' . $exception);
        }

        $this->closeModalWithEvents([
            'pg:eventRefresh-default',
        ]);

    }

    public function render()
    {
        return view('livewire.sekolahs.update');
    }
}
