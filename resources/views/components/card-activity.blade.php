<div class="card bordered">
  <figure>
    <img src=
         @switch($tipo)
        @case('raid')
        "https://d1lss44hh2trtw.cloudfront.net/assets/article/2020/10/21/destiny-2-beyond-light-raid-release-date_feature.jpg"
         @break
         @case('pve')
         "https://www.windowscentral.com/sites/wpcentral.com/files/styles/xlarge/public/field/image/2021/07/glassway-grandmaster-nf-hero.jpg"
      @break
      @default
      "https://attackofthefanboy.com/wp-content/uploads/2015/02/destiny-crucible-aotf-760x428.jpg"
      @endswitch >
  </figure>
  <div class="card-body">
    <h2 class="card-title">{{$descricao}}
      <div class="badge mx-2 badge-secondary uppercase">{{$tipo}}</div>
    </h2>
    <p>{{$observacao}}</p>
      <div class="divider"></div>
      <span class="text-sm font-semibold">Jogadores necessários: {{$jogadores}} </span>
      <p><i class="far fa-clock fa-fw mr-2 text-gray-900"></i>Horário previsto:
      @php
          $date = new Datetime($horario);
          echo $date->format('d/m H:i')
      @endphp
      </p>
      <p>
          <i class="far fa-address-card fa-fw text-gray-900 mr-2"></i>Criado por: {{$usuario}}
      </p>
      <div class="divider"></div>
      <div class="form-control">
          <p><i class="fas fa-paperclip"></i> <input type="text" class="input input-bordered w-full" readonly value="{{ route('view.activity',['slug' => $conferir]) }}"></p>
      </div>
      <div class="justify-end card-actions">
        <a class="btn btn-outline btn-accent" href="{{ route('view.activity',['slug' => $conferir]) }}"><span><i class="fas fa-info-circle"></i> Mais informações</span> </a>
    </div>
  </div>
</div>
