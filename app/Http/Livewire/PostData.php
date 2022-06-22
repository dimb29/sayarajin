<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PostData extends Component
{
    public $post;

    public function mount($post)
    {
        $this->post = $post;
    }
    public function render()
    {
        return view('livewire.post-data');
    }
}
