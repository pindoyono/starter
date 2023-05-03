<?php

namespace App\Http\Livewire\Perusahaans;

use App\Models\Perusahaan;
use LivewireUI\Modal\ModalComponent;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Delete extends ModalComponent
{
    use LivewireAlert;
    public ?int $perusahaanId = null;

    public array $perusahaanIds = [];
    public array $perusahaanNames = [];

    public string $confirmationTitle = '';

    public string $confirmationDescription = '';

    public string $perusahaanName = '';

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
        if ($this->perusahaanId) {
            Perusahaan::query()->find($this->perusahaanId)->delete();
            $this->alert('success', 'Data Berhasil Di Hapus');
        }

        if ($this->perusahaanIds) {
            Perusahaan::query()->whereIn('id', $this->perusahaanIds)->delete();
            $this->alert('success', 'Data Berhasil Di Hapus');
        }

        $this->closeModalWithEvents([
            'pg:eventRefresh-default',
        ]);
    }

    public function render()
    {
        return view('livewire.perusahaans.delete');
    }
}
