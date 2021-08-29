@section('styles')
    @parent
    <link href="{{ asset('css/style-detsad.css') }}" rel="stylesheet">
@endsection

<div class="detsad">

    <div class="header">
        <div class="header-top">
            <div class="row align-items-center">
            <div class="col-2 header-date">
                    
                    </div>
                    <script>
                            $(function() {
                                startRefresh();
                            });
    
                            function startRefresh() {
                                setTimeout(startRefresh,1000);
                                $.get('/time.php', function(data) {
                                    $('.header-date').html(data);    
                                });
                            }
                        </script>
                <div class="col-8"><h1>{{ $settings->title }}</h1></div>
                <div class="col-2 header-map"><a href="/front-pages/7" style="color: #fff;">План <br>здания</a></div>
            </div>
        </div>
        <div class="header-bottom">Новости и мероприятия</div>
    </div>

    <div class="container" style="margin-top: 45px;">
        <div class="news">
            <div class="row">
                <div class="col-12">
                    <ul class="news-list">
                        @foreach($news as $new)
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
                </div>
            </div>
            <div class="backbutton">
                
            </div>
        </div>
    </div>



</div>
<div class="backbutton">
                <a href="/"><img src="/img/home.svg" alt=""></a>
                <span>Новости и мероприятия</span>
            </div>
<div class="footer">
        Выберите интересующий Вас раздел и нажмите на него ...
    </div>

