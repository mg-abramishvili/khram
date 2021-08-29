@section('styles')
    @parent
    <link href="{{ asset('css/style-shkola.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style-shkola-square.css') }}" rel="stylesheet">
@endsection

<div class="shkola">

    <header>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-8 header-logo">
                    <a href="/">
                        <div class="header-logo-img">
                            <img src="{{ $settings->logo }}">
                        </div>
                        <p class="header-title"><?=str_replace('*', '<br>', $settings->title)?></p>
                    </a>
                </div>
                <div class="col-4 text-right">
                    <div class="calendar">
                        <span>
                            {{ \Carbon\Carbon::now()->locale('ru')->isoFormat('D MMMM, dddd')}}
                        </span>
                    </div>
                    <div class="header-time"></div>
                    <script>
                        $(function() {
                            startRefresh();
                        });

                        function startRefresh() {
                            setTimeout(startRefresh,30000);
                            $.get('/timeonly.php', function(data) {
                                $('.header-time').html(data);    
                            });
                        }
                    </script>
                </div>
            </div>
        </div>
    </header>

    <div class="container container-index" style="margin-top: 25vh; width: 95vw;">
        <div class="news sortable">
            @foreach($news as $new)
                <a href="/front-news/{{ $new->id }}" class="index-button index-button-full">
                    @if($new->image)
                        <div class="user-pages-item-image" style="background-image:url({{ $new->image }});"></div>
                        <span class="t6-p">
                            <small style="font-size: 1vw; color: #999; display:block; margin-bottom: 1vh;">{{ \Carbon\Carbon::parse($new->created_at)->locale('ru')->isoFormat('D.MM.YYYY')}}</small>
                            {{ $new->title }}
                        </span>
                    @else
                        <div class="index-button-icon">
                            <img src="/img/icons/002-newspaper.svg">
                        </div>
                        <span>
                            <small style="font-size: 1vw; color: #999; display:block; margin-bottom: 1vh;">{{ \Carbon\Carbon::parse($new->created_at)->locale('ru')->isoFormat('D.MM.YYYY')}}</small>
                            {{ $new->title }}
                        </span>
                    @endif
                </a>
            @endforeach
        </div>
    </div>


    <footer>
        <div class="container">
            <a href="/" class="shkola-home shkola-home-sub">
                <img src="/img/shkolahome.svg" alt="">
            </a>
            <a href="/front-news" class="shkola-footer-second"><span>Новости</span></a>
        </div>
    </footer>
</div>

@section('scripts')
    @parent
    <script>
        asc=false;   
        var sorted=$('.index-button').sort(function(a,b){
                return (asc ==
                    ($(a).data('index') <  $(b).data('index'))) ? 1 : -1;
            });
            asc = asc ? false : true;
            $('.sortable').html(sorted);
    </script>

    <script>
        $('.sortable').flickity({
        cellAlign: 'center',
        contain: true,
        @if($news->count() > 4)
            prevNextButtons: true,
        @else
            prevNextButtons: false,
        @endif
        pageDots: false,
        groupCells: 4,
        draggable: '>1',
        });
    </script>
@endsection