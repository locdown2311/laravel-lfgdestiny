<div>
    <x-slot name="titulo">Manage Categories</x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Gerenciador de Categorias</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                @if (session()->has('message'))
                    <x-info-alert>
                        <x-slot name="corpo">{{ session('message') }}</x-slot>
                    </x-info-alert>
                @endif
                @can('create activity')
                    <button wire:click="toggleModal()"
                            class="my-4 inline-flex justify-center w-full btn btn-outline btn-primary">
                        Nova categoria
                    </button>
                    @endcan
            </div>
        </div>
        @if($isOpen)
            <x-custom-modal>
                <x-slot name="content">
                    <form class="px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="form-control mb-4">
                            <label class="label">
                                <span class="label-text">Nome da atividade</span>
                            </label>
                            <input type="text" placeholder="Ex: Visitar os pombos de são 14" class="input input-primary input-bordered" wire:model="descricao">
                            @error('descricao') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-control mb-4">
                            <label class="label">
                                <span class="label-text">Tipo da atividade</span>
                            </label>
                            <select class="select select-bordered w-full max-w-xs" wire:model="tipo">
                                <option disabled="disabled" selected="selected">O que melhor se enquadra na atividade</option>
                                <option value="raid">Raid</option>
                                <option value="pvp">PvP</option>
                                <option value="pve">PvE</option>
                            </select>
                            @error('tipo') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                                    <button wire:click.prevent="store()" type="button"
                                            class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-red-600 text-base leading-6 font-bold text-white shadow-sm hover:bg-red-700 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                        Store
                                    </button>
                                </span>
                            <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                                    <button wire:click="toggleModal()" type="button"
                                            class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-bold text-gray-700 shadow-sm hover:text-gray-700 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                        Close
                                    </button>
                                </span>
                        </div>
                    </form>
                </x-slot>
            </x-custom-modal>
            @endif
        @if (count($categorias) > 0)
            <div class="mt-2 max-w-5xl mx-auto sm:px-6 lg:px-8">
                    <table class="table w-full">
                        <thead>
                        <tr class="bg-gray-100">
                            <th class="px-4 py-2 w-20 text-center">#</th>
                            <th class="px-4 py-2 text-center">Descrição</th>
                            <th class="px-4 py-2 text-center">Tipo</th>
                            <th class="px-4 py-2 text-center">Ações</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach ($categorias as $categoria)
                            <tr>
                                <td class="border px-4 py-2 text-center">{{ $categoria->id }}</td>
                                <td class="border px-4 py-2 text-center">{{ $categoria->descricao }}</td>
                                <td class="border px-4 py-2 text-center uppercase">{{ $categoria->tipo}}</td>
                                <td class="border px-4 py-2 text-center">
                                    @can('delete category')
                                        <button wire:click.prevent="delete({{$categoria->id}})" class="btn btn-outline btn-accent">Deletar</button>
                                    @endcan
                                    @cannot('delete category')
                                        <button class="btn btn-disabled">(Suspenso)</button>
                                    @endcannot
                                </td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                {{ $categorias->links() }}
            </div>

        @endif()
    </div>
</div>
