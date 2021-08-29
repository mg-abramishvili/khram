@section('styles')
    @parent
    <link href="{{ asset('css/style-nast.css') }}" rel="stylesheet">
@endsection

<div class="nast">

    <div class="container" >
            <div class="row">
                <div class="col-12">
                    <ul class="news-list">
                    <h1>Новости</h1>
                        @foreach($news_nast as $new)
                        <li class="news-list-item">  
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <h2>{{ $new->title }}</h2>
                                    <div class="news-list-item-text-preview">
                                        {{ \Illuminate\Support\Str::limit($new->text ?? '', 100, $end='...') }}
                                    </div>
                                </div>
                                <div class="col-3">
                                    <a href="/front-news/{{ $new->id }}">Подробнее</a>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    <div class="news-nav">
                        {{ $news_nast->links('paginate') }}
                    </div>
                </div>
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

</div>

