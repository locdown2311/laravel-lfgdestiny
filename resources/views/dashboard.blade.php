<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-container-card>
                    <x-slot name="icone">lni-question-circle</x-slot>
                    <x-slot name="titulo">Precisando de companhia para jogar?</x-slot>
                    <x-slot name="corpo">
                        Comece procurando uma atividade existente.
                        <p>Caso não encontre, crie uma.</p>
                    </x-slot>
                </x-container-card>
            </div>
        </div>
    </div>
</x-app-layout>
