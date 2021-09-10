<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CreateActivity extends Component
{
    public 
        $atividades,
        $atividade_id,
        $categoria_id,
        $horario_atv,
        $qtd_jogadores,
        $observacao;
        
    public $isOpen = 0;

    public function render()
    {
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
    
        Todo::updateOrCreate(['id' => $this->todo_id], [
            'title' => $this->title,
            'description' => $this->description
        ]);
   
        session()->flash('message', 
            $this->todo_id ? 'Todo Updated Successfully.' : 'Todo Created Successfully.');
   
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
        $Todo = Todo::findOrFail($id);
        $this->todo_id = $id;
        $this->title = $Todo->title;
        $this->description = $Todo->description;
     
        $this->openModal();
    }
      
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function delete($id)
    {
        Todo::find($id)->delete();
        session()->flash('message', 'Todo Deleted Successfully.');
    }
}
