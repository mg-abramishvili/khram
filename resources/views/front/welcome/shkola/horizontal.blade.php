@section('styles')
    @parent
    <link href="{{ asset('css/style-shkola.css') }}" rel="stylesheet">
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

    <div class="container container-index">
        <div class="sortable">

            @foreach($pages as $page)
                <a href="/front-pages/{{ $page->id }}" class="index-button" @if($page->sort) data-index="sort_{{ $page->sort }} @endif">
                    @if($page->image_as_icon == 1)
                        <div class="user-pages-item-image" style="background-image:url({{ $page->image }});"></div>
                        <span class="t6-p">{{ $page->title }}</span>
                    @else
                        @if($page->icons()->exists())
                            @foreach($page->icons as $icon)
                                <div class="index-button-icon">
                                    <img src="{{ $icon->icon }}">
                                </div>
                                <span>{{ $page->title }}</span>
                            @endforeach
                        @else
                            <div class="index-button-icon">
                                <img src="/img/icons/014-passport.svg">
                            </div>
                            <span>{{ $page->title }}</span>
                        @endif
                    @endif
                </a>
            @endforeach

            @if($settings->module_routes == 'y')
                <a href="/front-r01routes/" class="index-button" @if($settings->module_routes_sort) data-index="sort_{{ $settings->module_routes_sort }} @endif">
                    <div class="index-button-icon">
                        <img src="/img/icons/019-home-1.svg">
                    </div>
                    <span>План школы</span>
                </a>
            @endif

            @if($settings->module_news == 'y')
                @if($news->count() >= 1)
                    <a href="/front-news/" class="index-button" @if($settings->module_news_sort) data-index="sort_{{ $settings->module_news_sort }} @endif">
                        <div class="index-button-icon">
                            <img src="/img/icons/002-newspaper.svg">
                        </div>
                        <span>Новости</span>
                    </a>
                @endif
            @endif

            @if($settings->module_photoalbums == 'y')
                <a href="/front-photoalbums/" class="index-button" @if($settings->module_photoalbums_sort) data-index="sort_{{ $settings->module_photoalbums_sort }} @endif">
                    <div class="index-button-icon">
                        <img src="/img/icons/001-picture.svg">
                    </div>
                    <span>Фотогалерея</span>
                </a>
            @endif

            @if($settings->module_videoalbums == 'y')
                <a href="/front-videoalbums/" class="index-button" @if($settings->module_videoalbums_sort) data-index="sort_{{ $settings->module_videoalbums_sort }} @endif">
                    <div class="index-button-icon">
                        <img src="/img/icons/006-video-player.svg">
                    </div>
                    <span>Видеогалерея</span>
                </a>
            @endif

            @if($settings->module_reviews == 'y')
                <a href="/front-reviews/" class="index-button" @if($settings->module_reviews_sort) data-index="sort_{{ $settings->module_reviews_sort }} @endif">
                    <div class="index-button-icon">
                        <img src="/img/icons/021-email.svg">
                    </div>
                    <span>Оставить отзыв</span>
                </a>
            @endif

        </div>
    </div>

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
        var divs = $(".sortable .index-button");
            for(var i = 0; i < divs.length; i+=2) {
            divs.slice(i, i+2).wrapAll("<div class='user-pages-item'></div>");
        }
    </script>

    <script>
        $('.sortable').flickity({
        cellAlign: 'left',
        contain: true,
        prevNextButtons: false,
        pageDots: false,
        groupCells: 4,
        draggable: '>1',
        });
    </script>
@endsection