<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class ManageCategory extends Component
{
    use WithPagination;


    public $isOpen = false;
    public $tipo;
    public $descricao;

    protected  $rules = [
        'tipo' => 'required',
        'descricao' => 'required | max:80 | unique:categories',
    ];
    public function render()
    {
        //dd(Category::paginate(10));
        return view('livewire.manage-category',[
            'categorias'=>Category::paginate(6),
        ]);
    }
    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }
    public function store(){
        $validacao = $this->validate();
        Category::updateOrCreate($validacao);
        session()->flash('message', 'Categoria criada com sucesso.');
        $this->reset();
    }
    public function toggleModal(){
        $this->isOpen = !$this->isOpen;
    }
    public function delete($id){
        Category::findOrFail($id)->delete();
        session()->flash('message', 'Categoria removida com sucesso.');
    }

}
