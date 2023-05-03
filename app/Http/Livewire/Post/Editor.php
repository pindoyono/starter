<?php

namespace App\Http\Livewire\Post;

use LivewireUI\Modal\ModalComponent;

class Editor extends ModalComponent
{
    public int $counter = 0;

    public function update()
    {
        $this->counter++;
    }

    public function render()
    {
        return view('livewire.post.editor');
    }
}
