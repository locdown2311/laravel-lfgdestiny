<div>
    <x-slot name="titulo">
        Nova Atividade
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Gerenciador de Atividades</h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                @if (session()->has('message'))
                <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
                    role="alert">
                    <div class="flex">
                        <div>
                            <p class="text-sm text-red-500">{{ session('message') }}</p>
                        </div>
                    </div>
                </div>
                @endif
                <button wire:click="create()"
                    class="my-4 inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-red-600 text-base font-bold text-white shadow-sm hover:bg-red-700">
                    Iniciar atividade
                </button>
                @if($isOpen)
                <x-custom-modal>
                    <x-slot name="content">
                        <form>
                            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                <div class="">
                                    <div class="mb-4">
                                        <label for="categoriaId"
                                            class="block text-gray-700 text-sm font-bold mb-2">Atividade desejada</label>
                                        <select id="categoriaId" name="categoria_id" wire:model="categoria_id">
                                            <option value="">Escolha a atividade desejada</option>
                                            @foreach ($categorias as $categoria)
                                                <option value={{  $categoria->id  }}>{{  $categoria->descricao  }}</option>
                                            @endforeach
                                        </select>
                                        @error('categoria_id') <span class="text-red-500">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="mb-4">
                                        <label for="horaAtividade"
                                            class="block text-gray-700 text-sm font-bold mb-2">Horário da Atividade:</label>
                                        <input type="datetime-local"
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                            id="horaAtividade" wire:model="horario_atv">
                                        @error('horario_atv') <span class="text-red-500">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="mb-4">
                                        <label for="qtdJogadores" class="block text-gray-700 text-sm font-bold mb-2">Número de jogadores:</label>
                                        <select wire:model="qtd_jogadores">
                                            <option value="">Defina o número de jogadores totais</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                        </select>
                                        @error('qtd_jogadores') <span class="text-red-500">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="mb-4">
                                        <label for="obsAtividade"
                                            class="block text-gray-700 text-sm font-bold mb-2">Observações:</label>
                                        <textarea
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                            id="obsAtividade" wire:model="observacao"
                                            placeholder="Favor usar tal tipo de arma | Ter paciência"></textarea>
                                        @error('mobile') <span class="text-red-500">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                                    <button wire:click.prevent="store()" type="button"
                                        class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-red-600 text-base leading-6 font-bold text-white shadow-sm hover:bg-red-700 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                        Store
                                    </button>
                                </span>
                                <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                                    <button wire:click="closeModal()" type="button"
                                        class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-bold text-gray-700 shadow-sm hover:text-gray-700 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                        Close
                                    </button>
                                </span>
                            </div>
                        </form>
                    </x-slot>
                </x-custom-modal>
                @endif
            </div>
            @if (count($atividades_usu) > 0)
            <div class="mt-3 bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                <table class="table-fixed w-full">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-4 py-2 w-20">#</th>
                            <th class="px-4 py-2">Atividade</th>
                            <th class="px-4 py-2">Horário</th>
                            <th class="px-4 py-2">Qtd Jogadores</th>
                            <th class="px-4 py-2">Observações</th>
                            <th class="px-4 py-2">Ações</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($atividades_usu as $atividade)
                        <tr>
                            <td class="border px-4 py-2 text-center">{{ $atividade->id }}</td>
                            <td class="border px-4 py-2 text-center">{{ $atividade->category->descricao }}</td>
                            <td class="border px-4 py-2 text-center">{{ $atividade->horario}}</td>
                            <td class="border px-4 py-2 text-center">{{ $atividade->qtd_jogadores}}</td>
                            <td class="border px-4 py-2 text-center">{{ $atividade->observacao}}</td>
                            <td class="border px-4 py-2 text-center">

                            <x-jet-button class="bg-green-300 mt-1 border-black">
                                <a wire:click="delete({{ $atividade->id }})">Concluir</a>
                            </x-jet-button>
                            </td>
                        @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
            @endif($atividades_usu)
        </div>
    </div>
</div>
