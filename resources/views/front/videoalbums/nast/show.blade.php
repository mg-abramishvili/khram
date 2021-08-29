@section('styles')
    @parent
    <link href="{{ asset('css/style-nast.css') }}" rel="stylesheet">
@endsection

    <div class="container">
    <h1 class="title"><small style="font-weight: bold; margin-top: -20px; display: block; font-size: 60%; text-align: center;">{{ $videoalbum->title }}</small></h1>

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

    </div>

    <footer>
        <div class="home">
            <a href="/" class="home-home"><img src="/img/nast-home.png"></a>
            <a href="/front-videoalbums" class="home-back"><img src="/img/nast-back.png"></a>
        </div>
        <div class="container">
            Выберите интересующий Вас разздел и нажмите на него
        </div>
    </footer>