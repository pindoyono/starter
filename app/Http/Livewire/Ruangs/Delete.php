<?php

namespace App\Http\Livewire\Ruangs;

use App\Models\Ruang;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Delete extends ModalComponent
{
    use LivewireAlert;
    public ?int $ruangId = null;

    public array $ruangIds = [];
    public array $ruangNames = [];

    public string $confirmationTitle = '';

    public string $confirmationDescription = '';

    public string $ruangName = '';

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
        if ($this->ruangId) {
            Ruang::query()->find($this->ruangId)->delete();
            $this->alert('success', 'Data Berhasil Di Hapus');
        }

        if ($this->ruangIds) {
            Ruang::query()->whereIn('id', $this->ruangIds)->delete();
            $this->alert('success', 'Data Berhasil Di Hapus');
        }

        $this->closeModalWithEvents([
            'pg:eventRefresh-default',
        ]);
    }
    public function render()
    {
        return view('livewire.ruangs.delete');
    }
}
