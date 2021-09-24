<div>
    <div class="w-full flex flex-col p-4">
        <div class="flex-1">
        <a href="{{ route('view.activity',['id' => $conferir]) }}" class="block bg-white shadow-md hover:shadow-xl rounded-lg overflow-hidden">
            <div class="relative pb-48 overflow-hidden">
                <img class="absolute inset-0 h-full w-full object-cover"
                     src=
                     @switch($tipo)
                     @case('raid')
                         https://d1lss44hh2trtw.cloudfront.net/assets/article/2020/10/21/destiny-2-beyond-light-raid-release-date_feature.jpg
                     @break
                     @case('pve')
                     https://www.windowscentral.com/sites/wpcentral.com/files/styles/xlarge/public/field/image/2021/07/glassway-grandmaster-nf-hero.jpg
                    @break
                    @default
                    https://attackofthefanboy.com/wp-content/uploads/2015/02/destiny-crucible-aotf-760x428.jpg
                    @endswitch
                alt="">
            </div>
            <div class="p-4">
                <span class="inline-block px-2 py-1 leading-none bg-gray-200 rounded-full font-semibold uppercase tracking-wide text-xs">{{$tipo}}</span>
                <h2 class="flex-1 mt-2 mb-2  font-bold">{{$descricao}}</h2>
                <p class="flex-1 text-sm break-word">{{$observacao}}</p>
                <div class="mt-3 flex items-center">
                    <span class="text-sm font-semibold">Jogadores necessários: </span>&nbsp
                    <span class="text-sm font-semibold">{{$jogadores}} </span>
                </div>
            </div>
            <div class="p-4 border-t border-b text-xs text-gray-700">
              <span class="flex items-center mb-1">
                <i class="far fa-clock fa-fw mr-2 text-gray-900"></i> Horário previsto:
                  @php
                      $date = new Datetime($horario);
                      echo $date->format('d/m H:i')
                  @endphp
              </span>
                <span class="flex items-center mb-1">
                    <i class="far fa-address-card fa-fw text-gray-900 mr-2"></i> Criado por: {{$usuario}}
                </span>
            </div>
        </a>
    </div>
    </div>
</div>
