@extends('layouts.front')
@section('content')

@section('styles')
    @parent
    <link href="{{ asset('css/style-med.css') }}" rel="stylesheet">
@endsection

<div class="wrapper" style="">

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
                            setTimeout(startRefresh,60000);
                            $.get('/timeonly.php', function(data) {
                                $('.header-time').html(data);    
                            });
                        }
                    </script>
                </div>
            </div>
        </div>
    </header>

    <div class="container">
        <h1 class="review-h1">Оставьте отзыв</h1>
        <div class="row">
            <div class="col-6">
                <form action="/front-reviews" method="post" enctype="multipart/form-data" class="review-form">@csrf

                    <!--<input type="text" class="form-control mb-3" name="name" placeholder="Имя (необязательно)">-->
            
                    <textarea rows="7" type="text" id="myInput" onkeyup="myFunction()" class="form-control mb-4" name="review"></textarea>
                    @if ($errors->has('review'))
                        <div class="alert alert-danger">
                            Напишите отзыв
                        </div>
                    @endif

                    <button type="submit" class="btn btn-lg btn-med">Отправить</button>

                </form>

                <script>
                    $('form').submit(function() {
                        $(this).find("button[type='submit']").hide();
                    });
                </script>
            </div>
            <div class="col-6">
                <div class="keyboard-reviews">
                    @include('front.keyboard')
                </div>
            </div>
        </div>
    </div>

<footer>
    <div class="container">
        <a href="/" class="med-home med-home-sub">
            <img src="/img/medhome.svg" alt="">
        </a>
        <a href="/front-reviews" class="med-footer-second"><span>Оставить отзыв</span></a>
    </div>
</footer>

                    </div>
@endsection
