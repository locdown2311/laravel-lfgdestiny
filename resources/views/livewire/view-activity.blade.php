<div>
    <x-custom-modal>
        <x-slot name="content">
            <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Informações da atividade de identificação: {{$dados[0]->id}}
                    </h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">
                        <i class="far fa-clock"></i> Essa atividade está planejada para ocorrer à partir de:
                        <span class="font-extrabold">
                        @php
                            $date = new Datetime($dados[0]->horario);
                            echo $date->format('d-m-Y H:i:s');
                        @endphp
                        </span>
                    </p>
                </div>
                <div class="border-t border-gray-200">
                    <dl>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                <i class="far fa-id-card"></i> Criado por
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{$dados[0]->user->name}}
                            </dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                <i class="fas fa-directions"></i> Atividade proposta
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{$dados[0]->category->descricao}}
                            </dd>
                        </div>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                <i class="fas fa-info-circle"></i> Tipo de atividade
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 uppercase">
                                {{$dados[0]->category->tipo}}
                            </dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                <i class="fas fa-list-ol"></i> Jogadores necessários
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{$dados[0]->qtd_jogadores}}
                            </dd>
                        </div>
                        {{-- <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                About
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                Fugiat ipsum ipsum deserunt culpa aute sint do nostrud anim incididunt cillum culpa
                                consequat. Excepteur qui ipsum aliquip consequat sint. Sit id mollit nulla mollit
                                nostrud in ea officia proident. Irure nostrud pariatur mollit ad adipisicing
                                reprehenderit deserunt qui eu.
                            </dd>
                        </div> --}}
                        
                    </dl>
                </div>
            </div>


        </x-slot>
    </x-custom-modal>
</div>