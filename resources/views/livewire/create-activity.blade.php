<div>
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
                            <p class="text-sm">{{ session('message') }}</p>
                        </div>
                    </div>
                </div>
                @endif
                <button wire:click="create()"
                    class="my-4 inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-red-600 text-base font-bold text-white shadow-sm hover:bg-red-700">
                    Iniciar atividade
                </button>
                @if($isOpen)
                    @include('livewire.modal-template')
                @endif          
            </div>
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
                            <x-jet-button class="bg-yellow-200 border-black">
                                <a wire:click="edit({{ $atividade->id }})">Editar</a>
                            </x-jet-button>

                            <x-jet-button class="bg-red-500 mt-1 border-black">
                                <a wire:click="delete({{ $atividade->id }})">Excluir</a>
                            </x-jet-button>
                            </td>
                        @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
</div>
