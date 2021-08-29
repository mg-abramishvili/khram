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
            <div class="gallery-list">
                @foreach($videoalbums as $videoalbum)
                    <div class="gallery-list-item">
                        <a href="/front-videoalbums/{{ $videoalbum->id }}">
                            <div class="gallery-list-item-pic" style="background: url({{ $videoalbum->cover }}); background-size: cover; background-position: 50% 50%:"></div>
                            <h2>{{ $videoalbum->title }}</h2>
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
        pageDots: true,
        });
    </script>

    <script>
        $( document ).ready(function() {
            $(".gallery-list-item a h2").text(function(index, currentText) {
                return currentText.substr(0, 75);
            });
        });
    </script>