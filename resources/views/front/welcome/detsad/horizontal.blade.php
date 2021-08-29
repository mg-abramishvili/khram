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
        <div class="header-bottom">Главный экран</div>
    </div>

    <div class="container" style="margin-top: 45px;">

        <div class="row">

            @if(isset($news))
            <div class="col">
                <a href="/front-news/" class="index-item index-item-1">
                    <p>Новости и мероприятия</p>
                </a>
            </div>
            @endif

            @if(isset($page1))
            <div class="col">
                <a href="/front-pages/{{ $page1->id }}" class="index-item index-item-2">
                    <p>{{ $page1->title }}</p>
                </a>
            </div>
            @endif

            @if(isset($page2))
            <div class="col">
                <a href="/front-pages/{{ $page2->id }}" class="index-item index-item-3">
                    <p>{{ $page2->title }}</p>
                </a>
            </div>
            @endif

            @if(isset($page3))
            <div class="col">
                <a href="/front-pages/{{ $page3->id }}" class="index-item index-item-4">
                    <p>{{ $page3->title }}</p>
                </a>
            </div>
            @endif

            @if(isset($page4))
            <div class="col">
                <a href="/front-pages/{{ $page4->id }}" class="index-item index-item-5">
                    <p>{{ $page4->title }}</p>
                </a>
            </div>
            @endif

        </div>

    </div>



</div>
<div class="backbutton">
                <a href="/"><img src="/img/home.svg" alt=""></a>
            </div>
<div class="footer">
        Выберите интересующий Вас раздел и нажмите на него ...
    </div>