<?php

namespace App\Http\Livewire\Lowongans;

use Livewire\Component;
use App\Models\Lowongan;
use LivewireUI\Modal\ModalComponent;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Delete extends ModalComponent
{
    use LivewireAlert;
    public ?int $lowonganId = null;

    public array $lowonganIds = [];
    public array $lowonganNames = [];

    public string $confirmationTitle = '';

    public string $confirmationDescription = '';

    public string $lowonganName = '';

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
        if ($this->lowonganId) {
            Lowongan::query()->find($this->lowonganId)->delete();
            $this->alert('success', 'Data Berhasil Di Hapus');
        }

        if ($this->lowonganIds) {
            Lowongan::query()->whereIn('id', $this->lowonganIds)->delete();
            $this->alert('success', 'Data Berhasil Di Hapus');
        }

        $this->closeModalWithEvents([
            'pg:eventRefresh-default',
        ]);
    }

    public function render()
    {
        return view('livewire.lowongans.delete');
    }
}
