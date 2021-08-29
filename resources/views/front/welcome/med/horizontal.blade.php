@section('styles')
    @parent
    <link href="{{ asset('css/style-med.css') }}" rel="stylesheet">
@endsection

<div class="med">

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
        <div class="row sortable">

            @foreach($pages as $page)
                <div class="col-6" @if($page->sort) data-index="sort_{{ $page->sort }} @endif">
                    <div class="user-pages-item-item">
                        <a href="/front-pages/{{ $page->id }}" class="index-button">
                            @if($page->image_as_icon == 1)
                                <div class="user-pages-item-image" style="background-image:url({{ $page->image }});"></div>
                                <span class="t6-p">{{ $page->title }}</span>
                            @else
                            <span>{{ $page->title }}</span>
                            @endif
                        </a>
                    </div>
                </div>
            @endforeach

            @if($settings->module_routes == 'y')
                <div class="col-6" @if($settings->module_routes_sort) data-index="sort_{{ $settings->module_routes_sort }} @endif">
                    <a href="/front-r01routes/" class="index-button">
                        <span>План клиники</span>
                    </a>
                </div>
            @endif

            @if($settings->module_news == 'y')
                @if($news->count() >= 1)
                    <div class="col-6" @if($settings->module_news_sort) data-index="sort_{{ $settings->module_news_sort }} @endif">
                        <a href="/front-news/" class="index-button">
                            <span>Новости</span>
                        </a>
                    </div>
                @endif
            @endif

            @if($settings->module_photoalbums == 'y')
                <div class="col-6" @if($settings->module_photoalbums_sort) data-index="sort_{{ $settings->module_photoalbums_sort }} @endif">
                    <a href="/front-photoalbums/" class="index-button">
                        <span>Фотогалерея</span>
                    </a>
                </div>
            @endif

            @if($settings->module_videoalbums == 'y')
                <div class="col-6" @if($settings->module_videoalbums_sort) data-index="sort_{{ $settings->module_videoalbums_sort }} @endif">
                    <a href="/front-videoalbums/" class="index-button">
                        <span>Видеогалерея</span>
                    </a>
                </div>
            @endif

            @if($settings->module_reviews == 'y')
                <div class="col-6" @if($settings->module_reviews_sort) data-index="sort_{{ $settings->module_reviews_sort }} @endif">
                    <a href="/front-reviews/" class="index-button">
                        <span>Оставить отзыв</span>
                    </a>
                </div>
            @endif

        </div>
    </div>

    <footer>
        <div class="container">
            <a href="/" class="med-home">
                <img src="/img/medhome.svg" alt="">
            </a>
        </div>
    </footer>

</div>

@section('scripts')
    @parent
    <script>
        asc=false;   
        var sorted=$('.col-6').sort(function(a,b){
                return (asc ==
                    ($(a).data('index') <  $(b).data('index'))) ? 1 : -1;
            });
            asc = asc ? false : true;
            $('.sortable').html(sorted);
    </script>
@endsection