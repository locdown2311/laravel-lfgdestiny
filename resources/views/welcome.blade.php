<x-guest-layout>
    <x-slot name="titulo">Boas vindas
    </x-slot>
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    <x-jet-button>
                        <a href="{{ url('/dashboard') }}">Dashboard</a>
                    </x-jet-button>
                @else

                    <x-jet-button>
                        <a href="{{ route('login') }}" >Log in</a>
                    </x-jet-button>
                    <x-jet-button>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    </x-jet-button>
                @endauth
            </div>
        @endif

        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 ">
            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg border border-black">
                <div class="flex justify-center items-center">
                    <div class="p-6">
                        <p class="text-center">LFG Destiny - Seu buscador de atividades</p>
                    </div>
                </div>
            </div>
            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg border border-black">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-1 ">
                    <div class="p-6">
                        <x-container-card>
                            <x-slot name="icone">fas fa-question-circle</x-slot>
                            <x-slot name="titulo">Precisando de companhia para jogar?</x-slot>
                            <x-slot name="corpo">
                                Disponibilidade é um fator decisivo em jogos, principalmente em
                                atividades de vários jogadores. Em Destiny isso se repete com grupos
                                cada vez menos participativos.
                            </x-slot>
                        </x-container-card>
                    </div>

                    <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">

                        <x-container-card>
                            <x-slot name="icone">fab fa-xbox</x-slot>
                            <x-slot name="titulo">Uma possível solução..</x-slot>
                            <x-slot name="corpo">
                                Uma plataforma criada para unir jogadores de todos os países para
                                evitar que você jogue sozinho. Conheça jogadores novos através de
                                Bungie ID, sistema responsável pelo crossplay.
                            </x-slot>
                        </x-container-card>
                    </div>
                    <div class="p-6 border-t border-gray-200 dark:border-gray-700">
                        <x-container-card>
                            <x-slot name="icone">fab fa-playstation</x-slot>
                            <x-slot name="titulo">O telegram é útil mas..</x-slot>
                            <x-slot name="corpo">
                                Já é comprovado que qualquer atividade que requer
                                etapas extras possuí a menor chance de se concretizar.
                                Dessa forma, acessar um site não requer o download de mais
                                nenhum aplicativo. Poupe tempo, jogue mais.
                            </x-slot>
                        </x-container-card>
                    </div>
                    <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-l">
                        <x-container-card>
                            <x-slot name="icone">fas fa-smile-wink</x-slot>
                            <x-slot name="titulo">Jogos cooperativos são para jogar juntos!</x-slot>
                            <x-slot name="corpo">
                                Chega de ficar se isolando, jogando offline para não te chamarem
                                ou simplesmente não querer jogar com os parça.
                                Ta na hora de fazer a comunidade ser mais unida, junte-se a nós
                            </x-slot>
                        </x-container-card>
                    </div>
                </div>
            </div>
        </div>
</x-guest-layout>
