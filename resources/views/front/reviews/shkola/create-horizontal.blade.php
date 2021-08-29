@section('styles')
    @parent
    <link href="{{ asset('css/style-shkola.css') }}" rel="stylesheet">
@endsection

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

    <div class="container" style="margin-top: 25vh; width: 90vw;">
        <h1 class="review-h1">Оставьте отзыв</h1>
        <div class="row">
            <div class="col-5">
                <form action="/front-reviews" method="post" enctype="multipart/form-data" class="review-form">@csrf

                    <!--<input type="text" class="form-control mb-3" name="name" placeholder="Имя (необязательно)">-->
            
                    <textarea rows="7" type="text" id="myInput" onkeyup="myFunction()" class="form-control mb-4" name="review"></textarea>
                    @if ($errors->has('review'))
                        <div class="alert alert-danger">
                            Напишите отзыв
                        </div>
                    @endif

                    <button type="submit" class="btn btn-lg btn-shkola">Отправить</button>

                </form>

                <script>
                    $('form').submit(function() {
                        $(this).find("button[type='submit']").hide();
                    });
                </script>
            </div>
            <div class="col-7">
                <div class="keyboard-reviews">
                    @include('front.keyboard')
                </div>
            </div>
        </div>
    </div>

<footer>
    <div class="container">
        <a href="/" class="shkola-home shkola-home-sub">
            <img src="/img/shkolahome.svg" alt="">
        </a>
        <a href="/front-reviews" class="shkola-footer-second"><span>Оставить отзыв</span></a>
    </div>
</footer>