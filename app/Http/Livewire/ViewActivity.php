<?php

namespace App\Http\Livewire;

use Auth;
use Livewire\Component;
use App\Models\Activity;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Boolean;

class ViewActivity extends Component
{
    public $usuario;
    public $atividade;
    public $dados;
    public $participantes;
    public $iParticipantes;
    public $participando = false;
    public $busca;

    public function mount($slug)
    {
        $this->dados = Activity::with('category','user')
                        ->where('slug','=',$slug)
                        ->firstOrFail();
        $this->usuario = Auth::id();
        //$this->atividade = $id;

        //dd($this->dados);
        $this->iParticipantes = $this->countPlayers($this->dados->id);
        if($this->checkIfExists($this->usuario,$this->dados->id)){
            $this->participando = true;
        }
        $this->loadParticipantes($this->dados->id);
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
    public function checkIfExists($user_id,$activity_id): bool
    {
        return DB::table('activity_user')
                    ->where('activity_id','=',$activity_id)
                    ->where('user_id','=',$user_id)
                    ->exists();

    }
    public function countPlayers($activity_id){
        return DB::table('activity_user')
            ->where('activity_id',$activity_id)
            ->count();
    }
    public function joinActivity($id){
        $dados = User::findOrFail($this->usuario);

        if($this->checkIfExists($this->usuario,$id) == false){
            $dados->activities()->attach($id);
            $this->participando = true;
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
            $this->participando = false;
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
