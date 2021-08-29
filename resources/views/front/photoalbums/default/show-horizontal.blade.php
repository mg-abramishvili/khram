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
                

        <div class="footer">
            <a href="/" class="home-button">
                <img src="/img/icon-footer-home.svg">
            </a>
            <a href="/front-photoalbums" class="gal-button">
                <img src="/img/icon-footer-gal.svg">
            </a>
        </div>

    </div>