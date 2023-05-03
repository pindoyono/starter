<?php

namespace App\Http\Livewire\Users;
use App\Models\User;
use Illuminate\Validation\Rule;

use Illuminate\Support\Facades\Hash;
use LivewireUI\Modal\ModalComponent;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Update extends ModalComponent
{
    use LivewireAlert;
    public ?int $userId = null;
    public ?int $counter = 0;

    public array $userIds = [];
    public array $userNames = [];

    public string $confirmationTitle = '';

    public string $confirmationDescription = '';

    public string $userName = '';

    public  $name;
    public  $email;
    public  $password;
    public $confir_password;

    public array $roles = [];

    public User $user;

    public array $role_user = [];


    // protected array $rules = [
    //     'name' => 'required',
    //     'email' => 'required|email|min:2|unique:users,email,' . $this->userId,
    //     'password' => 'same:confir_password',
    // ];


    public function rules()
    {
         return [
            'name' => 'required',
            'email' => 'required|email|min:2|unique:users,email,' . $this->userId,
            'password' => 'same:confir_password',
            'role_user' => 'required',

        ];
    }

    // 'name' => 'required',
    // 'email' => 'required|email|unique:users,email_address,'.$userId,
    // 'password' => "required|min:6|same:password_confirm",
    // 'password_confirm' => "required:min:6|same:password",

    public function mount(User $user)
    {
        $user = User::findOrFail($this->userId);
        $this->name = $user->name;
        $this->email = $user->email;
        $this->user = $user;
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

    public function update()
    {
        try {
            // dd($this->userId);
            $this->validate();
            $user = User::findOrFail($this->userId);

            if ($this->password) {
                $update = $user->update([
                    'name' => $this->name,
                    'email' => $this->email,
                    'password' => Hash::make($this->password),
                ]);
                $user->syncRoles($this->role_user);
            }else{
                $update = $user->update([
                    'name' => $this->name,
                    'email' => $this->email,
                ]);
                $user->syncRoles($this->role_user);
            }

            $this->closeModal();

                $this->alert('success', 'Berhasil Update Data');

        }  catch (QueryException $exception) {
            //throw $th;
            $this->alert('warning', 'Gagal Update Data'.$exception);
        }

        $this->closeModalWithEvents([
            'pg:eventRefresh-default',
        ]);

    }

    public function render()
    {
        return view('livewire.users.update');
    }
}
