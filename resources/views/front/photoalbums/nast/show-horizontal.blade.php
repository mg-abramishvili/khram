@section('styles')
    @parent
    <link href="{{ asset('css/style-nast.css') }}" rel="stylesheet">
@endsection

    <div class="container">

    <h1 class="title"><small style="font-weight: bold; margin-top: -20px; display: block; font-size: 60%; text-align: center;">{{ $photoalbum->title }}</small></h1>


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

    </div>

    <footer>
        <div class="home">
            <a href="/" class="home-home"><img src="/img/nast-home.png"></a>
            <a href="/front-photoalbums" class="home-back"><img src="/img/nast-back.png"></a>
        </div>
        <div class="container">
            Выберите интересующий Вас разздел и нажмите на него
        </div>
    </footer>