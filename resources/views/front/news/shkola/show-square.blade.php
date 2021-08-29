@section('styles')
    @parent
    <link href="{{ asset('css/style-shkola.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style-shkola-square.css') }}" rel="stylesheet">
@endsection

<div class="shkola">

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
        <div class="news-item">
            <div class="row">
                @if($news->image)
                <div class="col-5">
                    <div class="news-item-img" style="background-image: url({{ $news->image }});"></div>
                </div>
                @endif

                @if($news->image)
                <div class="col-7">
                @else
                <div class="col-12">
                @endif
                    <div class="news-item-text">
                        <span>{{$news->created_at->format('d.m.Y')}}</span>
                        <h1>{{ $news->title }}</h1>
                        {{ $news->text }}
                        </div>
                    </div>
            </div>
            <div class="backbutton">
                
            </div>
        </div>
    </div>

    <footer>
        <div class="container">
            <a href="/" class="shkola-home shkola-home-sub">
                <img src="/img/shkolahome.svg" alt="">
            </a>
            <a href="/front-news" class="shkola-footer-second"><span>Новости</span></a>
            <a class="shkola-footer-third"><span>{{ $news->title }}</span></a>
        </div>
    </footer>

</div>

