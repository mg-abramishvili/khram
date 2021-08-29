@section('styles')
    @parent
    <link href="{{ asset('css/style-nast.css') }}" rel="stylesheet">
@endsection

<div class="nast">

    <div class="container">
        <div class="news-item">
            <div class="row">
                <div class="col-4">
                    <img src="{{ $news->image }}">
                </div>
                <div class="col-8">
                    <div class="news-item-text">
                        <span>{{$news->created_at->format('d.m.Y')}}</span>
                        <h1>{{ $news->title }}</h1>
                        {{ $news->text }}
                        </div>
                    </div>
            </div>
            <div class="backbutton">
                
            </div>
        </div>
    </div>

    <footer>
        <div class="home">
            <a href="/" class="home-home"><img src="/img/nast-home.png"></a>
            <a href="/front-news" class="home-back"><img src="/img/nast-back.png"></a>
        </div>
        <div class="container">
            Выберите интересующий Вас разздел и нажмите на него
        </div>
    </footer>

</div>

