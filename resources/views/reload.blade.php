@foreach ($chicas as $chica)
    @if ($loop->first)
        <div class="chica chica-grande">
            <a class="link" href="{{ $chica['link'] }}" title="" id="enlace">
                <span class="thumb"><img src="images/thumb-grande-01.jpg" width="357" height="307" alt=""
                        title="" /></span>
                <span class="nombre-chica"> <span class="ico-online"></span>{{ $chica['nombre'] }}</span>
                <span id="favorito" class="ico-favorito"></span>
            </a>
        </div>
    @else
        <div class="chica">
            <a class="link" href="{{ $chica['link'] }}" title="" id="enlace">
                <span class="thumb"><img src="images/thumb-01.jpg" width="175" height="150" alt=""
                        title="" /></span>
                <span class="nombre-chica"> <span class="ico-online"></span>{{ $chica['nombre'] }}</span>
                <span id="favorito" class="ico-favorito"></span>
            </a>
        </div>
    @endif
@endforeach

<div class="clear"></div>
