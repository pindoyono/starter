<?php

namespace App\Http\Livewire\Lowongans;

use App\Models\Lowongan;
use LivewireUI\Modal\ModalComponent;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Update extends ModalComponent
{
    use LivewireAlert;

    public string $confirmationTitle = '';
    public ?int $lowonganId = null;

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
        $data = Lowongan::findOrFail($this->lowonganId);

        $this->job_title = $data->job_title;
        $this->job_description = $data->job_description;
        $this->job_location = $data->job_location;
        $this->job_salary = $data->job_salary;
        $this->job_requirements = $data->job_requirements;
        $this->job_contact = $data->job_contact;

        $this->rules = $this->rules();
    }


    public function update()
    {
        try {
            $this->validate();
            $data = Lowongan::find($this->lowonganId);
            $data->job_title = $this->job_title;
            $data->job_description = $this->job_description;
            $data->job_location = $this->job_location;
            $data->job_salary = $this->job_salary;
            $data->job_requirements = $this->job_requirements;
            $data->job_contact = $this->job_contact;

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
        return view('livewire.lowongans.update');
    }
}
