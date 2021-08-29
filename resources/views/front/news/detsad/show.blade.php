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
        <div class="news-item">
            <div class="row">
                <div class="col-4">
                    <div class="news-item-img" style="background-image: url({{ $news->image }});"></div>
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



</div>
<div class="backbutton">
                <a href="/"><img src="/img/home.svg" alt=""></a>
                <a href="/front-news" style="margin-left: 50px; color: #fff; font-size: 20px; line-height: 72px;"><i style="display: inline-block; padding-right: 20px; padding-left: 30px; font-style: normal;">Новости</i></a>
                <span>{{ $news->title }}</span>
            </div>
<div class="footer">
        Выберите интересующий Вас раздел и нажмите на него ...
    </div>

