<x-app-layout>
    <x-slot name="titulo">Dashboard
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-container-card>
                    <x-slot name="icone">fas fa-users</x-slot>
                    <x-slot name="titulo">Precisando de companhia para jogar?</x-slot>
                    <x-slot name="corpo">
                        Comece procurando uma atividade existente abaixo.
                        <p>Caso não encontre, crie uma.</p>
                    </x-slot>
                </x-container-card>

            </div>
        </div>
    </div>
    <!-- Refazer os cards abaixo -->
    <div class="container mx-auto px-5">
        <div class="-mx-3 flex flex-wrap">
            @foreach($dados as $info)
                <div>
                    <x-card-activity>
                        <x-slot name="tipo">
                            {{$info->category->tipo}}
                        </x-slot>
                        <x-slot name="descricao">
                            {{$info->category->descricao}}
                        </x-slot>
                        <x-slot name="observacao">
                            {{$info->observacao}}
                        </x-slot>
                        <x-slot name="horario">
                            {{$info->horario}}
                        </x-slot>
                        <x-slot name="jogadores">
                            {{$info->qtd_jogadores}}
                        </x-slot>
                        <x-slot name="usuario">
                            {{$info->user->name}}
                        </x-slot>
                        <x-slot name="conferir">
                            {{$info->id}}
                        </x-slot>
                    </x-card-activity>
                </div>
            @endforeach
        </div>

    </div>
</x-app-layout>
