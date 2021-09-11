<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Activity;
class CreateActivity extends Component
{
    public
        $gAtividade,
        $atividades,
        $categorias,
        $atividade_id,
        $criado_por,
        $categoria_id,
        $horario_atv,
        $qtd_jogadores,
        $observacao;
        
    public $isOpen = 0;

    public function render()
    {
        $this->categorias = Category::all();
        return view('livewire.create-activity');
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function openModal()
    {
        $this->isOpen = true;
    }
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function closeModal()
    {
        $this->isOpen = false;
    }
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    private function resetInputFields(){
        $this->categoria_id = '';
        $this->$horario_atv = '';
        $this->$qtd_jogadores = '';
        $this->$observacao ='';
    }
      
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function store()
    {
        $this->validate([
            'categoria_id' => 'required',
            'horario_atv' => 'required',
            'qtd_jogadores' => 'required',
            'observacao' => 'max:100'
        ]);
    
        Activity::updateOrCreate(['id' => $this->atividade_id], [
            'criado_por' => Auth::user()->name,
            'categoria_id' => $this->categoria_id,
            'horario_atv' => $this->horario_atv,
            'qtd_jogadores' => $this->qtd_jogadores,
            'observacao' => $this->observacao
        ]);
   
        session()->flash('message', 
            $this->atividade_id ? 'Todo Updated Successfully.' : 'Todo Created Successfully.');
   
        $this->closeModal();
        $this->resetInputFields();
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function edit($id)
    {
        $gAtividade = Atividade::findOrFail($id);
        $user = Auth::user();
        if($user->can('edit', $gAtividade)){
            $this->atividade_id = $id;
            $this->categoria_id = $gAtividade->categoria_id;
            $this->horario_atv = $gAtividade->horario_atv;
            $this->qtd_jogadores = $gAtividade->qtd_jogadores;
            $this->observacao = $gAtividade->observacao;   
            $this->openModal();
        }
    }
      
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function delete($id)
    {
        $gAtividade = Atividade::findOrFail($id);
        $user = Auth::user();

        if($user->can('delete',$gAtividade)){
            Atividade::find($id)->delete();
            session()->flash('message', 'Todo Deleted Successfully.');
        }
      
    }
}
