@section('styles')
    @parent
    <link href="{{ asset('css/style-shkola.css') }}" rel="stylesheet">
@endsection

<header>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-8 header-logo">
                <a href="/">
                    <div class="header-logo-img">
                        <img src="{{ $settings->logo }}">
                    </div>
                    <p class="header-title"><?=str_replace('*', '<br>', $settings->title)?></p>
                </a>
            </div>
            <div class="col-4 text-right">
                <div class="calendar">
                    <span>
                        {{ \Carbon\Carbon::now()->locale('ru')->isoFormat('D MMMM, dddd')}}
                    </span>
                </div>
                <div class="header-time"></div>
                <script>
                    $(function() {
                        startRefresh();
                    });

                    function startRefresh() {
                        setTimeout(startRefresh,30000);
                        $.get('/timeonly.php', function(data) {
                            $('.header-time').html(data);    
                        });
                    }
                </script>
            </div>
        </div>
    </div>
</header>

    <div class="container" style="margin-top: 25vh; width: 90vw;">

        <div class="gallery">
            <div class="gallery-list">
                @foreach($photoalbums as $photoalbum)
                    <div class="gallery-list-item">
                        <a href="/front-photoalbums/{{ $photoalbum->id }}">
                            @if(is_array($photoalbum->gallery))
                                @foreach($photoalbum->gallery as $k=>$v)
                                    @if ($loop->first)
                                        <div class="gallery-list-item-pic" style="background: url({{ $v }}); background-size: cover; background-position: 50% 50%;"></div>
                                    @endif
                                @endforeach
                            @endif
                            <h2>{{ $photoalbum->title }}</h2>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

    </div>

    <footer>
        <div class="container">
            <a href="/" class="shkola-home shkola-home-sub">
                <img src="/img/shkolahome.svg" alt="">
            </a>
            <a href="/front-photoalbums" class="shkola-footer-second"><span>Фотогалерея</span></a>
        </div>
    </footer>

    <script>
        var divs = $(".gallery-list .gallery-list-item");
            for(var i = 0; i < divs.length; i+=8) {
            divs.slice(i, i+8).wrapAll("<div class='gallery-list-item-slide'></div>");
        }
    </script>

    <script>
        $('.gallery-list').flickity({
        cellAlign: 'left',
        contain: true,
        prevNextButtons: false,
        @if($photoalbums->count() > 8)
        pageDots: true,
        @else
        pageDots: false,
        @endif
        });
    </script>

    <script>
        $( document ).ready(function() {
            $(".gallery-list-item a h2").text(function(index, currentText) {
                return currentText.substr(0, 75);
            });
        });
    </script>