@section('styles')
    @parent
    <link href="{{ asset('css/style-default.css') }}" rel="stylesheet">
@endsection

<div class="default">
    <div class="container">
        <div class="row">

            <div class="col-12">
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
            </div>
            
            @if($settings->module_news == 'y')
            <div class="col-6">
            @else
            <div class="col-5">
            @endif
                <div class="row">
                    <div class="col">
                        @if($settings->module_photoalbums == 'y')
                            <a href="/front-photoalbums/" class="photogalleries @if($settings->module_videoalbums == 'n') photogalleries-full @endif @if($settings->module_news == 'n') photogalleries-nonews @endif">
                                <img src="/img/icon-photogal.svg">
                                Фотогалерея
                            </a>
                        @endif

                        @if($settings->module_videoalbums == 'y')
                            <a href="/front-videoalbums/" class="videogalleries @if($settings->module_photoalbums == 'n') videogalleries-full @endif">
                                <img src="/img/icon-videogal.svg">
                                Видеогалерея
                            </a>
                        @endif
                    </div>

                    @if($settings->module_news == 'y')
                    <div class="col-7">
                        <a href="/front-news/" class="news">
                            <img src="/img/icon-news.svg">
                            Новости
                        </a>
                    </div>
                    @endif

                </div>
            </div>

            @if($settings->module_news == 'y')
            <div class="col-6">
            @else
            <div class="col-7">
            @endif

                <div class="user-pages">
                    @foreach($pages as $page)
                        <div class="user-pages-item-item">
                            <a href="/front-pages/{{ $page->id }}">
                                @if($page->image_as_icon == 1)
                                    <div class="user-pages-item-image" style="background-image:url({{ $page->image }});"></div>
                                @else
                                    @if($page->icons()->exists())
                                        @foreach($page->icons as $icon)
                                            <img src="{{ $icon->icon }}">
                                        @endforeach
                                    @else
                                        <img src="/img/icons/014-passport.svg">
                                    @endif
                                @endif
                                {{ $page->title }}
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</div>

@section('scripts')
    @parent
    <script>
        var divs = $(".user-pages .user-pages-item-item");
            for(var i = 0; i < divs.length; i+=2) {
            divs.slice(i, i+2).wrapAll("<div class='user-pages-item'></div>");
        }
    </script>

    <script>
        $('.user-pages').flickity({
        cellAlign: 'left',
        contain: true,
        prevNextButtons: false,
        pageDots: false,
        });
    </script>
@endsection