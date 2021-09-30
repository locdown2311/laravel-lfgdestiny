<?php

namespace App\Http\Livewire;

use Auth;
use Livewire\Component;
use App\Models\Category;
use App\Models\Activity;
use Illuminate\Support\Str;

class CreateActivity extends Component
{
    public
        $atividades,
        $categorias,
        $atividades_usu,
        $atividade_id,
        $criado_por,
        $categoria_id,
        $horario_atv,
        $qtd_jogadores,
        $convertido,
        $observacao;

    public $updateMode = false;
    public $isOpen = 0;

    public function render()
    {
        $this->atividades_usu = Activity::with('category')
                                ->where('user_id','=', Auth::id())
                                ->get();
        $this->categorias = Category::all();
        return view('livewire.create-activity');
    }

    public function create()
    {
        $this->reset();
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

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function store()
    {
        $this->criado_por = Auth::id();


        $this->validate([
            'categoria_id' => 'required',
            'horario_atv' => 'required',
            'qtd_jogadores' => 'required',
            'observacao' => 'max:100'
        ]);
        $categoria = Category::findOrFail($this->categoria_id);

        $dados = new Activity();
        $dados->user_id = $this->criado_por;
        $dados->horario = $this->horario_atv;
        $dados->slug = $random = Str::random(5).Str::limit($categoria->name,5).$this->qtd_jogadores;
        $dados->qtd_jogadores = $this->qtd_jogadores;
        $dados->observacao = $this->observacao;
        $dados->category()->associate($categoria);
        $dados->save();

        session()->flash('message',
            $this->atividade_id ? 'Atividade atualizada com sucesso.' : 'Atividade criada com sucesso.');

        $this->closeModal();
        $this->reset();
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // public function edit($id)
    // {
    //     $gAtividade = Activity::findOrFail($id);
    //     $this->atividade_id = $id;
    //     $this->categoria_id = $gAtividade->categoria_id;
    //     $this->horario_atv = $gAtividade->horario_atv;
    //     $this->qtd_jogadores = $gAtividade->qtd_jogadores;
    //     $this->observacao = $gAtividade->observacao;
    //     $this->openModal();

    // }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function delete($id)
    {
        Activity::findOrFail($id)->delete();
        session()->flash('message', 'Tarefa concluida com sucesso.');
    }
}
