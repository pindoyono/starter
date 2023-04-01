<?php

namespace App\Http\Livewire;

use LivewireUI\Modal\ModalComponent;

class HelloWorld extends ModalComponent
{
    public int $counter = 0;

    public static function modalMaxWidth(): string
    {
        // 'sm'
        // 'md'
        // 'lg'
        // 'xl'
        // '2xl'
        // '3xl'
        // '4xl'
        // '5xl'
        // '6xl'
        // '7xl'
        return '4xl';
    }


    public function update()
    {
        $this->counter++;
    }

    public function render()
    {
        return view('livewire.hello-world');
    }
}
