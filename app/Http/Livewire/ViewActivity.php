<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Activity;
use App\Models\User;
use Illuminate\Support\Facades\DB;
class ViewActivity extends Component
{
    public $usuario;
    public $atividade;
    public $dados;
    public $participantes;
    public $participando;
    public $busca;

    public function mount($id)
    {
        $this->participando = false;
        $this->dados = Activity::findOrFail($id)
                        ->with('category','user')
                        ->where('id','=',$id)
                        ->get();
        $this->usuario = \Auth::id();
        $this->atividade = $id;

        if($this->checkIfExists($this->usuario,$this->id)){
            $this->participando = true;
        }
        $this->loadParticipantes($id);
    }

    public function goBack(){
        return redirect('/dashboard');
    }

    public function loadParticipantes($id){
        $this->busca = $id;
        $this->participantes = User::whereHas('activities', function ($query) {
                return $query->where('activities.id', '=', $this->busca);
            })->get();

    }
    public function checkIfExists($user_id,$activity_id)
    {
        return DB::table('activity_user')
                ->where('user_id','=',$user_id)
                ->where('activity_id','=',$activity_id)
                ->exists();

    }
    public function joinActivity($id){
        $dados = User::findOrFail($this->usuario);

        if($this->checkIfExists($this->usuario,$id) == false){
            $dados->activities()->attach($id);
            session()->flash('message','Registrado com sucesso.');
        }else{
            session()->flash('message','Você ja está participando dessa atividade.');
        }
        $this->goBack();
    }
    public function quitActivity($id){
        $dados = User::findOrFail($this->usuario);

        if($this->checkIfExists($this->usuario,$id)){
            $dados->activities()->detach($id);
            session()->flash('message','Você saiu da lista, que pena');
        }else{
            session()->flash('message','Você não está na lista');
        }
        $this->goBack();
    }
    public function render()
    {
        return view('livewire.view-activity');
    }
}
