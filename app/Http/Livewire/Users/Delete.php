<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use LivewireUI\Modal\ModalComponent;

class Delete extends ModalComponent
{
    use LivewireAlert;
    public ?int $userId = null;

    public array $userIds = [];
    public array $userNames = [];

    public string $confirmationTitle = '';

    public string $confirmationDescription = '';

    public string $userName = '';

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
        if ($this->userId) {
            User::query()->find($this->userId)->delete();
            $this->alert('success', 'Data Berhasil Di Hapus');
        }

        if ($this->userIds) {
            User::query()->whereIn('id', $this->userIds)->delete();
            $this->alert('success', 'Data Berhasil Di Hapus');
        }

        $this->closeModalWithEvents([
            'pg:eventRefresh-default',
        ]);
    }

    public function render()
    {
        return view('livewire.users.delete');
    }
}
