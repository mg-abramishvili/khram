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

    <div class="container" style="width: 95vw; margin-top: 25vh;">

    <div class="videoalbum-detail">
    <video src="{{ $videoalbum->gallery }}" autoplay controls disablePictureInPicture controlsList="nodownload"></video>
    </div>
    
        


                

    </div>

    <footer>
        <div class="container">
            <a href="/" class="shkola-home shkola-home-sub">
                <img src="/img/shkolahome.svg" alt="">
            </a>
            <a href="/front-videoalbums" class="shkola-footer-second"><span>Видеогалерея</span></a>
            <a class="shkola-footer-third"><span>{{ $videoalbum->title }}</span></a>
        </div>
    </footer>