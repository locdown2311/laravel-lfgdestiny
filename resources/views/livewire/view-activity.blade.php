<div>
    <x-slot name="titulo">
        Visualizando atividade
    </x-slot>
    <x-custom-modal>
        <x-slot name="content">
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Informações da atividade de identificação: {{$dados->slug}}
                    </h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">
                        <i class="far fa-clock"></i> Essa atividade está planejada para ocorrer à partir de:
                        <span class="font-extrabold">
                        @php
                            $date = new Datetime($dados->horario);
                            echo $date->format('d/m H:i')
                        @endphp
                        </span>
                    </p>
                </div>
                <div class="border-t border-gray-200">
                    <dl>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                <i class="text-red-500 far fa-id-card"></i> Criado por
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{$dados->user->name}}
                            </dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                <i class="fas fa-directions"></i> Atividade proposta
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{$dados->category->descricao}}
                            </dd>
                        </div>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                <i class="text-blue-500 fas fa-info-circle"></i> Tipo de atividade
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 uppercase">
                                {{$dados->category->tipo}}
                            </dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                <i class="fas fa-list-ol"></i> Jogadores necessários
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{$dados->qtd_jogadores}}
                            </dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                <i class="fas fa-spinner"></i> Progresso da Lista
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                <div class="p-6 space-y-2 artboard phone">
                                    <progress class="progress" value="{{$iParticipantes}}" max="{{$dados->qtd_jogadores}}"></progress>
                                </div>

                            </dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                <i class=" text-green-400 fas fa-grin-wink"></i> Participe da atividade
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                <div class="btn-group">
                                    @cannot('join activity')
                                        <button wire:click="goBack()" class="btn btn-outline">Fechar aba (usuário suspenso)</button>
                                    @endcannot
                                    @can('join activity')
                                        <button wire:click="joinActivity({{$dados->id}})" class="btn {{$participando ? "btn-disabled":"btn-success"}}">Participar</button>
                                        <button wire:click="quitActivity({{$dados->id}})" class="btn {{$participando ? "btn-error":"btn-disabled"}}">Sair</button>
                                        <button wire:click="goBack()" class="btn btn-outline">Fechar aba</button>
                                        @endcan
                                </div>
                            </dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                <i class="far fa-address-book text-indigo-400"></i>
                                Participantes atuais
                            </dt>

                            <ol class="list-none md:list-decimal xs:ml-6 md:ml-4">
                                @foreach($participantes as $participante)
                                    <li>{{$participante->name}}</li>
                                    <hr>
                                @endforeach
                            </ol>
                        </div>
                    </dl>
                </div>
            </div>
        </x-slot>
    </x-custom-modal>
</div>
