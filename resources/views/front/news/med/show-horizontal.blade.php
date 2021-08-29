@section('styles')
    @parent
    <link href="{{ asset('css/style-med.css') }}" rel="stylesheet">
@endsection

<div class="med">

<header>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-4">
                    <div class="calendar">
                        <strong>
                            {{ \Carbon\Carbon::now()->locale('ru')->isoFormat('D')}}
                        </strong>
                        <span>
                            {{ \Carbon\Carbon::now()->locale('ru')->isoFormat('MMMM')}}
                            <small>{{ \Carbon\Carbon::now()->locale('ru')->isoFormat('dddd')}}</small>
                        </span>
                    </div>
                </div>
                <div class="col-4 header-logo">
                    <a href="/"><img src="{{ $settings->logo }}"></a>
                </div>
                <div class="col-4 text-right">
                    <div class="header-time"></div>
                    <script>
                        $(function() {
                            startRefresh();
                        });

                        function startRefresh() {
                            setTimeout(startRefresh,60000);
                            $.get('/timeonly.php', function(data) {
                                $('.header-time').html(data);    
                            });
                        }
                    </script>
                </div>
            </div>
        </div>
    </header>

    <div class="container" style="margin-top: 45px;">
        <div class="news-item">
            <div class="row">
                @if($news->image)
                <div class="col-4">
                    <div class="news-item-img" style="background-image: url({{ $news->image }});"></div>
                </div>
                @endif

                @if($news->image)
                <div class="col-8">
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
            <a href="/" class="med-home med-home-sub">
                <img src="/img/medhome.svg" alt="">
            </a>
            <a href="/front-news" class="med-footer-second"><span>Новости</span></a>
            <a class="med-footer-third"><span>{{ $news->title }}</span></a>
        </div>
    </footer>

</div>

