@section('styles')
    @parent
    <link href="{{ asset('css/style-med.css') }}" rel="stylesheet">
    @if($settings->orientation == 'vertical')
        @parent
        <link href="{{ asset('css/style-med-vert.css') }}" rel="stylesheet">
    @endif
@endsection

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

    <div class="container">

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
        <div class="container">
            <a href="/" class="med-home med-home-sub">
                <img src="/img/medhome.svg" alt="">
            </a>
            <a href="/front-photoalbums" class="med-footer-second"><span>Фотогалерея</span></a>
            <a class="med-footer-third"><span>{{ $photoalbum->title }}</span></a>
        </div>
    </footer>