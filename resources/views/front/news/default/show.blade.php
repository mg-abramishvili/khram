@section('styles')
    @parent
    <link href="{{ asset('css/style-default.css') }}" rel="stylesheet">
@endsection

    <div class="container">

        <div class="header">
            <div class="row align-items-center">
                <div class="col-4 header-logo">
                    <a href="/"><img src="{{ $settings->logo }}"></a>
                </div>
                <div class="col-8 header-text">
                    {{ $settings->title }}
                </div>
            </div>
        </div>


        <div class="news-detail">
            <div class="row">
                <div class="col-5">
                    <div class="news-detail-image" style="background: url({{ $news->image }}); background-size: cover; background-position: 50% 50%;"></div>
                </div>
                <div class="col-7">
                    <div class="news-item-text">
                        <span>{{$news->created_at->format('d.m.Y')}}</span>
                        <h1 class="mb-4">{{ $news->title }}</h1>
                        {{ $news->text }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
                

        <div class="footer">
            <a href="/" class="home-button">
                <img src="/img/icon-footer-home.svg">
            </a>
            <a href="/front-news" class="news-button">
                <img src="/img/icon-footer-news.svg">
            </a>
        </div>

    </div>