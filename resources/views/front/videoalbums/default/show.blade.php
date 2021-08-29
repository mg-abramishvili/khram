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


        <div class="gallery-detail">
            <div class="gallery-detail-item">
                <video src="{{ $videoalbum->gallery }}" autoplay controls></video>
            </div>
        </div>

        <script>
            $('.gallery-detail').flickity({
            cellAlign: 'center',
            contain: true,
            imagesLoaded: true,
            pageDots: false,
            wrapAround: true,
            prevNextButtons: false
            });
        </script>
                

        <div class="footer">
            <a href="/" class="home-button">
                <img src="/img/icon-footer-home.svg">
            </a>
            <a href="/front-videoalbums" class="vgal-button">
                <img src="/img/icon-footer-vgal.svg">
            </a>
        </div>

    </div>