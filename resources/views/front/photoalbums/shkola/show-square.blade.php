@section('styles')
    @parent
    <link href="{{ asset('css/style-shkola.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style-shkola-square.css') }}" rel="stylesheet">
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

    <div class="container"  style="margin-top: 25vh; width: 95vw;">

        @if(is_array($photoalbum->gallery))
        <div class="gallery-detail">
            @foreach($photoalbum->gallery as $k=>$v)
                <div class="gallery-detail-item">
                    <img src="{{ $v }}" />
                </div>
            @endforeach
        </div>
        @endif

        <script>
            $('.gallery-detail').flickity({
            cellAlign: 'center',
            contain: true,
            imagesLoaded: true,
            pageDots: false,
            wrapAround: true,
            });
        </script>
                


    </div>

    <footer>
        <div class="container">
            <a href="/" class="shkola-home shkola-home-sub">
                <img src="/img/shkolahome.svg" alt="">
            </a>
            <a href="/front-photoalbums" class="shkola-footer-second"><span>Фотогалерея</span></a>
            <a class="shkola-footer-third"><span>{{ $photoalbum->title }}</span></a>
        </div>
    </footer>