<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>DreamApp</title>

        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/lightgallery.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">

        @yield('styles')

        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/popper.min.js') }}"></script>
        <script src="{{ asset('js/lightgallery.min.js') }}"></script>

        <link rel="stylesheet" href="{{ asset('css/flickity.css') }}">
        <script src="{{ asset('js/flickity.pkgd.min.js') }}"></script>
        <script src="{{ asset('js/panzoom.js') }}"></script>

        <script src="{{ asset('js/turn.min.js') }}"></script>

        <script>
            //document.oncontextmenu = new Function("return false;");
        </script>

    </head>
    <body>

        @php
            $host1file = 'http://localhost/host1.txt';
            $host2file = 'http://localhost/host2.txt';
            $ntafile = 'http://localhost/nta.txt';
            $host1 = file($host1file);
            $host2 = file($host2file);
            $nta = file($ntafile);
            
            foreach ($host1 as $host1line) { $h1 = $host1line; }
            foreach ($host2 as $host2line) { $h2 = $host2line; }
            foreach ($nta as $ntaline) { $hnta = $ntaline; }
        @endphp

        @php if ($hnta == 'y') { @endphp
            @php if ($h1 == $h2) { @endphp
                
                <!--<script>window.location.replace("/vue-index");
                    </script>-->
                

            @php } else { @endphp

                <div style="position: absolute; top: 40vh; left: 0; right: 0; text-align: center;"><p style="font-size: 50px;"><strong>Ошибка</strong><br>Повторное использование лицензии.</p></div>

            @php } @endphp
            @php } elseif ($hnta == 'n') { @endphp

                <div style="position: absolute; top: 15vh; left: 0; right: 0; display: block; margin: 0 auto; text-align: center; font-size: 22px;">
                    
                    <img src="/logo-h.png" style="width: 240px; display: block; margin: 0 auto;margin-bottom: 50px">
                    
                    <div id="phase_one">
                        <input type="text" id="key-input" placeholder="Введите ключ, вместе со знаками -" style="display: inline-block; padding: 18px 40px; border-radius: 10px; width: 500px;">
                        <button id="activate-button" style="display: inline-block; width: 200px; background-color: #ffc940; box-shahow: none; padding: 20px 40px; border: 0; border-radius: 10px; color: #fff;">Активировать</button>

                        @include('layouts.act-keyboard')
                    </div>

                    <div id="activating" style="font-size: 3vh; text-align: center; color: green;">Активация ...</div>

                    <form action="/settings/1" id="form" method="post" enctype="multipart/form-data">@csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="1">

                        <div class="row align-items-center mb-2">    
                            <dt class="col-sm-3">
                                Тема
                            </dt>
                            <dd class="col-sm-9">
                                <input name="theme" id="theme" class="form-control">
                            </dd>
                        </div>

                        <div class="row align-items-center mb-2">    
                            <dt class="col-sm-3">
                                Ориентация экрана
                            </dt>
                            <dd class="col-sm-9">
                                <input name="orientation" id="orientation" class="form-control">
                            </dd>
                        </div>

                        <div class="row align-items-center mb-2">    
                            <dt class="col-sm-3">
                                Заголовок
                            </dt>
                            <dd class="col-sm-9">
                                <input type="text" class="form-control" name="title" id="title">
                            </dd>
                        </div>

                        <div class="row align-items-center mb-2">    
                            <dt class="col-sm-3">
                                Модуль "Новости"
                            </dt>
                            <dd class="col-sm-9">
                                <input type="text" class="form-control" name="module_news" id="module_news">
                            </dd>
                        </div>

                        <div class="row align-items-center mb-2">    
                            <dt class="col-sm-3">
                                Модуль "Фотоагалерея"
                            </dt>
                            <dd class="col-sm-9">
                                <input type="text" class="form-control" name="module_photoalbums" id="module_photoalbums">
                            </dd>
                        </div>

                        <div class="row align-items-center mb-2">    
                            <dt class="col-sm-3">
                                Модуль "Видеогалерея"
                            </dt>
                            <dd class="col-sm-9">
                                <input type="text" class="form-control" name="module_videoalbums" id="module_videoalbums">
                            </dd>
                        </div>

                        <div class="row align-items-center mb-2">    
                            <dt class="col-sm-3">
                                Модуль "Маршруты"
                            </dt>
                            <dd class="col-sm-9">
                                <input type="text" class="form-control" name="module_routes" id="module_routes">
                            </dd>
                        </div>

                        <div class="row align-items-center mb-2">    
                            <dt class="col-sm-3">
                                Модуль "Отзывы"
                            </dt>
                            <dd class="col-sm-9">
                                <input type="text" class="form-control" name="module_reviews" id="module_reviews">
                            </dd>
                        </div>

                        <div class="row align-items-center mb-2">    
                            <dt class="col-sm-3">
                                Seeder
                            </dt>
                            <dd class="col-sm-9">
                                <input type="text" class="form-control" name="seeder" id="seeder" value="y">
                            </dd>
                        </div>

                        <div class="row align-items-center mb-2">    
                            <dt class="col-sm-3">
                                Serial Key
                            </dt>
                            <dd class="col-sm-9">
                                <input type="text" class="form-control" name="serial_key" id="serial_key">
                            </dd>
                        </div>

                        <div class="row mt-5">
                            <div class="col-12">
                                <button type="submit" id="submit-final" class="btn btn-lg btn-success">Активировать</button>
                            </div>
                        </div>
            
                    </form>

                </div>

        @php } @endphp

        @yield('scripts')

        @include('layouts.act')

        <script>
            document.onkeydown = function(e){
                e = e || window.event;
                var key = e.which || e.keyCode;
                // CTRL + Q
                if(key == 81 && e.ctrlKey){
                    window.location.href = "/login";
                }
            }        
        </script>

    </body>
</html>