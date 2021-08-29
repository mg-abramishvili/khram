@section('styles')
    @parent
    <link href="{{ asset('css/style-nast.css') }}" rel="stylesheet">
@endsection

<div class="nast">
    <div class="container">
        <div class="row">
            
            <div class="col-7 col-7-f">
                <div class="row">

                    @if(count($news))
                    <div class="col-12">
                        <a href="/front-news/" class="news">
                            <h2>Новости</h2>
                            <div class="row">
                                @foreach($news as $news_item)
                                    <div class="col-6">
                                        <div class="news_item">
                                            <h5>{{ $news_item->title }}</h5>
                                            <p>{{ Str::limit($news_item->text, 120) }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </a>
                    </div>
                    @endif
                    
                    @if(isset($photoalbums))
                        <div class="col-6">
                            <a href="/front-photoalbums/" class="photogalleries">
                                <span>Фотогалерея</span>
                            </a>
                        </div>
                    @endif

                    @if(isset($videoalbums))
                        <div class="col-6">
                            <a href="/front-videoalbums/" class="videogalleries">
                                <span>Видеогалерея</span>
                            </a>
                        </div>
                    @endif
                </div>
            </div>

            <div class="col-5 col-5-f">
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
    <footer>
        <div class="container">
            Выберите интересующий Вас разздел и нажмите на него
        </div>
    </footer>
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