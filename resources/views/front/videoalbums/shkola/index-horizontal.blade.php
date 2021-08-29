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

    <div class="container" style="width: 90vw; margin-top: 25vh;">

        <div class="gallery">
            <div class="gallery-list">
                @foreach($videoalbums as $videoalbum)
                    <div class="gallery-list-item">
                        <a href="/front-videoalbums/{{ $videoalbum->id }}">
                            @if($videoalbum->cover)
                            <div class="gallery-list-item-pic" style="background: url({{ $videoalbum->cover }}); background-size: cover; background-position: 50% 50%;"></div>
                            @else
                            <div class="gallery-list-item-pic" style="background: url('/img/Video-Placeholder.jpg'); background-size: cover; background-position: 50% 50%;"></div>
                            @endif
                            <h2>{{ $videoalbum->title }}</h2>
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
            <a href="/front-videoalbums" class="shkola-footer-second"><span>Видеогалерея</span></a>
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
        @if($videoalbums->count() > 8)
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