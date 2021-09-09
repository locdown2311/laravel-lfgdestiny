<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Card extends Component
{
    public $icone;
    public $titulo;
    public $corpo;
    public function render()
    {
        return view('livewire.card');
    }
}
