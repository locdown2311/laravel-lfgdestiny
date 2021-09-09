<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ContainerCard extends Component
{
    public $icone;
    public $titulo;
    public $corpo;
    
    public function render()
    {
        return view('livewire.container-card');
    }
}
