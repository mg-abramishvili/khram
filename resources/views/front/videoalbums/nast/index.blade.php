@section('styles')
    @parent
    <link href="{{ asset('css/style-nast.css') }}" rel="stylesheet">
@endsection

    <div class="container">

        <h1 class="title">Видеогалерея</h1>

        <div class="gallery">
            <div class="gallery-list">
                @foreach($videoalbums_nast as $videoalbum)
                    <div class="gallery-list-item">
                        <a href="/front-videoalbums/{{ $videoalbum->id }}">
                            <div class="gallery-list-item-pic" style="background: url({{ $videoalbum->cover }}); background-size: cover; background-position: 50% 50%:"></div>
                            <h2>{{ $videoalbum->title }}</h2>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="photoalbums-nav">
            {{ $videoalbums_nast->links('paginate') }}
        </div>

    </div>

    <footer>
        <div class="home">
            <a href="/" class="home-home"><img src="/img/nast-home.png"></a>
        </div>
        <div class="container">
            Выберите интересующий Вас разздел и нажмите на него
        </div>
    </footer>

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
        pageDots: false,
        });
    </script>

    <script>
        $( document ).ready(function() {
            $(".gallery-list-item a h2").text(function(index, currentText) {
                return currentText.substr(0, 75);
            });
        });
    </script>