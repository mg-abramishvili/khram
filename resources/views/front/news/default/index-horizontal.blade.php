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

        <div class="gallery">
            <div class="news-list">
                @foreach($news as $new)
                    <div class="news-list-item">
                        <a href="/front-news/{{ $new->id }}">
                            <div class="news-list-item-pic" style="background: url({{ $new->image }}); background-size: cover; background-position: 50% 50%:"></div>
                            <h2>{{ $new->title }}</h2>
                            <p>{{ Str::limit($new->text, 120) }}</p>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="footer">
            <a href="/" class="home-button">
                <img src="/img/icon-footer-home.svg">
            </a>
        </div>

    </div>

    <script>
        $('.news-list').flickity({
        cellAlign: 'left',
        contain: true,
        prevNextButtons: false,
        pageDots: true,
        });
    </script>

    <script>
        $( document ).ready(function() {
            $(".news-list-item a h2").text(function(index, currentText) {
                return currentText.substr(0, 75);
            });
        });
    </script>