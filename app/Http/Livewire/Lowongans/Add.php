<?php

namespace App\Http\Livewire\Lowongans;

use App\Models\Lowongan;
use Illuminate\Support\Facades\Auth;
use LivewireUI\Modal\ModalComponent;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Add extends ModalComponent
{
    use LivewireAlert;

    public string $confirmationTitle = '';

    public $job_title;
    public $job_description;
    public $job_location;
    public $job_salary;
    public $job_requirements;
    public $job_contact;

    public function rules()
    {
        return [
            'job_title' => 'required',
            'job_description' => 'required',
            'job_location' => 'required',
            // 'job_salary' => 'required',
            'job_requirements' => 'required',
            'job_contact' => 'required',
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

    public function mount(Lowongan $lowongan)
    {
        $this->rules = $this->rules();
    }

    public function save()
    {
        // dd(array_values($this->role_user));
        try {
            $this->validate();
            $data = [
                'job_title' => $this->job_title,
                'job_description' => $this->job_description,
                'job_location' => $this->job_location,
                'job_salary' => $this->job_salary,
                'job_requirements' => $this->job_requirements,
                'job_contact' => $this->job_contact,
                'user_id' => Auth::user()->id,

            ];
            $data = Lowongan::create($data);
            $this->closeModal();
        } catch (QueryException $exception) {
            //throw $th;
            $this->alert('warning', 'Gagal Tambah Data' . $exception);
        }

        $this->closeModalWithEvents([
            'pg:eventRefresh-default',
        ]);

    }

    public function render()
    {
        return view('livewire.lowongans.add');
    }
}
