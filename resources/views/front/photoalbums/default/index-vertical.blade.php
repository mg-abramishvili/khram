@section('styles')
    @parent
    <link href="{{ asset('css/style-default.css') }}" rel="stylesheet">
    @if($settings->orientation == 'vertical')
        @parent
        <link href="{{ asset('css/style-default-vert.css') }}" rel="stylesheet">
    @endif
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
                @foreach($photoalbums as $photoalbum)
                    <div class="gallery-list-item">
                        <a href="/front-photoalbums/{{ $photoalbum->id }}">
                            <div class="gallery-list-item-pic" style="background: url({{ $photoalbum->cover }}); background-size: cover; background-position: 50% 50%:"></div>
                            <h2>{{ $photoalbum->title }}</h2>
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
            for(var i = 0; i < divs.length; i+=6) {
            divs.slice(i, i+6).wrapAll("<div class='gallery-list-item-slide'></div>");
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