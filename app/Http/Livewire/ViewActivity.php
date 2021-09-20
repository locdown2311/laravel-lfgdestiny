<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Activity;
class ViewActivity extends Component
{

    public Atividade $activity;

    public function render()
    {
        return view('livewire.view-activity');
    }
}
