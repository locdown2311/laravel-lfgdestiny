<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Activity;
class ViewActivity extends Component
{

    public $dados;
 
    public function mount($id)
    {
        $this->dados = Activity::with('category','user')
                        ->where('id','=',$id)
                        ->get();
    }
    public function render()
    {
        return view('livewire.view-activity');
    }
}
