<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @livewire('container-card', [
                                'icone' => 'lni-question-circle',
                                'titulo' => 'Precisando de companhia para jogar?',
                                'corpo' => 'Disponibilidade é um fator decisivo em jogos, principalmente em 
                                        atividades de vários jogadores. Em Destiny isso se repete com grupos
                                        cada vez menos participativos.'
                            ])
            </div>
        </div>
    </div>
</x-app-layout>
