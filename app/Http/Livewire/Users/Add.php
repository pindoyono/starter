<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use LivewireUI\Modal\ModalComponent;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Add extends ModalComponent
{
    use LivewireAlert;

    public $name;
    public $email;
    public $password;
    public $confir_password;

    public string $confirmationTitle = '';

    public array $roles = [];
    public array $role_user = [];


    public function rules()
    {
         return [
            'role_user' => 'required',
            'name' => 'required',
            'email' => 'required|email|min:2|unique:users,email,',
            'password' => 'required|same:confir_password',
        ];
    }

    public function mount(User $user)
    {
        $this->rules = $this->rules();
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

    public function save()
    {
        // dd(array_values($this->role_user));
        try {
            $this->validate();
            $data = [
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($this->password),
            ];
            $user = User::create($data);
            if(count($this->role_user) != 0){
                $user->assignRole($this->role_user);
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
        return view('livewire.users.add');
    }
}
