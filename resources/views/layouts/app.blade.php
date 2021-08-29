<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>DreamApp</title>

        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/popper.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>

        <link href="{{ asset('css/filepond.css') }}" rel="stylesheet">
        <link href="{{ asset('css/filepond-plugin-image-preview.css') }}" rel="stylesheet">
        <script src="{{ asset('js/filepond-plugin-image-preview.js') }}"></script>
        <script src="{{ asset('js/filepond-plugin-file-validate-type.js') }}"></script>
        <script src="{{ asset('js/filepond.js') }}"></script>
        <script src="{{ asset('js/filepond.jquery.js') }}"></script>
        
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <link href="{{ asset('css/summernote.min.css') }}" rel="stylesheet">
        <script src="{{ asset('js/summernote.min.js') }}"></script>
        
    </head>
    <body>

        @guest
            @yield('content')
        @endguest
        
        @auth
        <div>
            <nav class="sidebar">

                <div class="mainlogo">
                    <img src="/logo-h.png" style="width: auto; max-width: 70%; display: block; margin: 0 auto; margin-top: 30px; margin-bottom: 30px;">
                </div>
                
                <ul class="nav navbar-nav">
                    <li class="nav-item {{ Request::is('pages') ? 'active' : '' }}">
                        <a href="{{ url('/pages') }}" class="nav-link">Страницы</a>
                    </li>

                    @if($settings->module_news == 'y')
                    <li class="nav-item {{ Request::is('news') ? 'active' : '' }}">
                        <a href="{{ url('/news') }}" class="nav-link">Новости</a>
                    </li>
                    @endif

                    @if($settings->module_photoalbums == 'y')
                    <li class="nav-item {{ Request::is('photoalbums') ? 'active' : '' }}">
                        <a href="{{ url('/photoalbums') }}" class="nav-link">Фотогалерея</a>
                    </li>
                    @endif

                    @if($settings->module_videoalbums == 'y')
                    <li class="nav-item {{ Request::is('videoalbums') ? 'active' : '' }}">
                        <a href="{{ url('/videoalbums') }}" class="nav-link">Видеогалерея</a>
                    </li>
                    @endif

                    @if($settings->module_routes == 'y')
                    <li class="nav-item {{ Request::is('schemes') ? 'active' : '' }}">
                        <a href="{{ url('/schemes') }}" class="nav-link">Планы помещений</a>
                    </li>
                    @endif

                    @if($settings->module_routes == 'y')
                    <li class="nav-item {{ Request::is('routes') ? 'active' : '' }}">
                        <a href="{{ url('/routes') }}" class="nav-link">↳ Маршруты от К1</a>
                    </li>
                    @endif

                    @if($settings->module_reviews == 'y')
                    <li class="nav-item {{ Request::is('reviews') ? 'active' : '' }}">
                        <a href="{{ url('/reviews') }}" class="nav-link">Отзывы</a>
                    </li>
                    @endif

                    <li class="nav-item {{ Request::is('banners') ? 'active' : '' }}">
                        <a href="{{ url('/banners') }}" class="nav-link">Баннеры</a>
                    </li>

                    <li class="nav-item {{ Request::is('settings') ? 'active' : '' }}">
                        <a href="{{ url('/settings') }}" class="nav-link">Настройки</a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ url('/vue-index') }}" class="nav-link">Выйти</a>
                    </li>
                    @if($settings->serial_key)
                        <li class="nav-item">
                            <a class="nav-link" style="font-size: 12px; color: #b6b5b5;">
                                Лицензионный ключ:<br>
                                {{ $settings->serial_key }}
                            </a>
                        </li>
                    @endif
                </ul>
            </nav>
            <main>
                @yield('content')
            </main>
        </div>
        @endauth


        @yield('scripts')
    </body>
</html>