@section('styles')
    @parent
    <link href="{{ asset('css/style-shkola.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style-shkola-square.css') }}" rel="stylesheet">
@endsection

    <style>
        .prevnexrroutslide {
            position: absolute;
            font-size: 2.1vh;
            font-weight: 700;
            box-shadow: none;
            border: 0;
            padding: 1.5vh 3vh;
            background-color: #2886bb;
            color: #fff;
            z-index: 20;
            top: 57vh;
            right: 3vh;
            left: 3vh;
            margin: 0 auto;
            width: 29vw;
            border-radius: 1vh;
        }
    </style>

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
    
    <div class="container" style="margin-top: 32vh; width: 95vw;">
        <div class="row">
            <div class="col-5">
                <div class="med-route-sidebar invisible">
                    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Поиск ...">
                    @include('front.keyboard')
                    <ul id="myUL">
                    @foreach ($r01routes as $scheme => $route)
                        @foreach($route as $routeItem)
                            @if($loop->first)
                                @if($routeItem->schemes2->count())
                                    @foreach ($routeItem->schemes2 as $rs)
                                        <strong style="text-transform: uppercase">{{ $rs->title }}</strong>
                                    @endforeach
                                @else
                                    @foreach ($routeItem->schemes as $rs)
                                        <strong style="text-transform: uppercase">{{ $rs->title }}</strong>
                                    @endforeach
                                @endif
                            @endif
                        @endforeach
                        @foreach($route as $routeItem)
                            <li>
                                <a id="route_push_{{ $routeItem->id }}">{{ $routeItem->title }}</a>
                            </li>
                        @endforeach
                    @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-7">

                @foreach ($routes as $route)
                    @foreach($route->schemes as $scheme)
                        <span id="title{{ $route->id }}" class="title_zh title_zh1 invisible" style="color: #333; font-size: 3vh; text-transform: uppercase; font-weight: 700; text-align: center; position: absolute; top: 0; left: 1vh; right: 1vh;">{{ $scheme->title }}</span>
                        @if(count($route->schemes2))
                            @foreach($route->schemes2 as $scheme2)
                                <span id="title2{{ $route->id }}" class="title_zh title_zh2 invisible" style="color: #333; font-size: 3vh; text-transform: uppercase; font-weight: 700; text-align: center; position: absolute; top: 0; left: 1vh; right: 1vh;">{{ $scheme2->title }}</span>
                            @endforeach
                        @endif
                    @endforeach
                @endforeach
                
                <div class="wrapperm invisible" id="wrapper">
                    <div id="wrapper-inner">
                    
                    @foreach ($routes as $route)

                    <div class="map map-image map-image{{ $route->id }}" id="map">
                        <div class="slide">
                            @foreach($route->schemes as $scheme)
                            <img src="{{$scheme->image}}"/>
                            @endforeach
            
                            <div class="routesbox route{{ $route->id }}">
                                <svg class="map-path" viewBox="0 0 800 450">
                                    @empty(!$route->x_01)
                                    <path class="key-anim01" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" d="M{{ $route->x_01 }} {{ $route->y_01 }}, undefined undefined"></path>
                                    <circle id="01" cx="{{ $route->x_01 }}" cy="{{ $route->y_01 }}" r="7" fill="#f33"></circle>
                                    
                                    <text style="stroke: #ffffff; stroke-width: 0.5px;" x='{{ $route->x_01 }}' y='{{ $route->y_01 }}' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ $route->t_1_begin }}</tspan></text>
                                    @endempty
            
                                    @empty(!$route->x_02)
                                    <path class="key-anim02" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" d="M{{ $route->x_02 }} {{ $route->y_02 }}, {{ $route->x_01 }} {{ $route->y_01 }}"></path>
                                    <circle id="02" cx="{{ $route->x_02 }}" cy="{{ $route->y_02 }}" r="7" fill="#f33"></circle>
                                    <text style="stroke: #ffffff; stroke-width: 0.5px;" x='{{ $route->x_02 }}' y='{{ $route->y_02 }}' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ $route->t_1_end }}</tspan></text>
                                    @endempty
            
                                    @empty(!$route->x_03)
                                    <path class="key-anim03" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" d="M{{ $route->x_03 }} {{ $route->y_03 }}, {{ $route->x_02 }} {{ $route->y_02 }}"></path>
                                    <circle id="03" cx="{{ $route->x_03 }}" cy="{{ $route->y_03 }}" r="7" fill="#f33"></circle>
                                    <text style="stroke: #ffffff; stroke-width: 0.5px;" x='{{ $route->x_03 }}' y='{{ $route->y_03 }}' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ $route->t_1_end }}</tspan></text>
                                    @endempty
            
                                    @empty(!$route->x_04)
                                    <path class="key-anim04" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" d="M{{ $route->x_04 }} {{ $route->y_04 }}, {{ $route->x_03 }} {{ $route->y_03 }}"></path>
                                    <circle id="03" cx="{{ $route->x_04 }}" cy="{{ $route->y_04 }}" r="7" fill="#f33"></circle>
                                    <text style="stroke: #ffffff; stroke-width: 0.5px;" x='{{ $route->x_04 }}' y='{{ $route->y_04 }}' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ $route->t_1_end }}</tspan></text>
                                    @endempty
            
                                    @empty(!$route->x_05)
                                    <path class="key-anim05" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" d="M{{ $route->x_05 }} {{ $route->y_05 }}, {{ $route->x_04 }} {{ $route->y_04 }}"></path>
                                    <circle id="03" cx="{{ $route->x_05 }}" cy="{{ $route->y_05 }}" r="7" fill="#f33"></circle>
                                    <text style="stroke: #ffffff; stroke-width: 0.5px;" x='{{ $route->x_05 }}' y='{{ $route->y_05 }}' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ $route->t_1_end }}</tspan></text>
                                    @endempty
            
                                    @empty(!$route->x_06)
                                    <path class="key-anim06" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" d="M{{ $route->x_06 }} {{ $route->y_06 }}, {{ $route->x_05 }} {{ $route->y_05 }}"></path>
                                    <circle id="03" cx="{{ $route->x_06 }}" cy="{{ $route->y_06 }}" r="7" fill="#f33"></circle>
                                    <text style="stroke: #ffffff; stroke-width: 0.5px;" x='{{ $route->x_06 }}' y='{{ $route->y_06 }}' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ $route->t_1_end }}</tspan></text>
                                    @endempty
            
                                    @empty(!$route->x_07)
                                    <path class="key-anim07" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" d="M{{ $route->x_07 }} {{ $route->y_07 }}, {{ $route->x_06 }} {{ $route->y_06 }}"></path>
                                    <circle id="03" cx="{{ $route->x_07 }}" cy="{{ $route->y_07 }}" r="7" fill="#f33"></circle>
                                    <text style="stroke: #ffffff; stroke-width: 0.5px;" x='{{ $route->x_07 }}' y='{{ $route->y_07 }}' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ $route->t_1_end }}</tspan></text>
                                    @endempty
            
                                    @empty(!$route->x_08)
                                    <path class="key-anim08" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" d="M{{ $route->x_08 }} {{ $route->y_08 }}, {{ $route->x_07 }} {{ $route->y_07 }}"></path>
                                    <circle id="03" cx="{{ $route->x_08 }}" cy="{{ $route->y_08 }}" r="7" fill="#f33"></circle>
                                    <text style="stroke: #ffffff; stroke-width: 0.5px;" x='{{ $route->x_08 }}' y='{{ $route->y_08 }}' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ $route->t_1_end }}</tspan></text>
                                    @endempty
            
                                    @empty(!$route->x_09)
                                    <path class="key-anim09" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" d="M{{ $route->x_09 }} {{ $route->y_09 }}, {{ $route->x_08 }} {{ $route->y_08 }}"></path>
                                    <circle id="03" cx="{{ $route->x_09 }}" cy="{{ $route->y_09 }}" r="7" fill="#f33"></circle>
                                    <text style="stroke: #ffffff; stroke-width: 0.5px;" x='{{ $route->x_09 }}' y='{{ $route->y_09 }}' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ $route->t_1_end }}</tspan></text>
                                    @endempty
            
                                    @empty(!$route->x_10)
                                    <path class="key-anim10" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" d="M{{ $route->x_10 }} {{ $route->y_10 }}, {{ $route->x_09 }} {{ $route->y_09 }}"></path>
                                    <circle id="03" cx="{{ $route->x_10 }}" cy="{{ $route->y_10 }}" r="7" fill="#f33"></circle>
                                    <text style="stroke: #ffffff; stroke-width: 0.5px;" x='{{ $route->x_10 }}' y='{{ $route->y_10 }}' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ $route->t_1_end }}</tspan></text>
                                    @endempty
            
                                    @empty(!$route->x_11)
                                    <path class="key-anim11" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" d="M{{ $route->x_11 }} {{ $route->y_11 }}, {{ $route->x_10 }} {{ $route->y_10 }}"></path>
                                    <circle id="03" cx="{{ $route->x_11 }}" cy="{{ $route->y_11 }}" r="7" fill="#f33"></circle>
                                    <text style="stroke: #ffffff; stroke-width: 0.5px;" x='{{ $route->x_11 }}' y='{{ $route->y_11 }}' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ $route->t_1_end }}</tspan></text>
                                    @endempty
            
                                    @empty(!$route->x_12)
                                    <path class="key-anim12" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" d="M{{ $route->x_12 }} {{ $route->y_12 }}, {{ $route->x_11 }} {{ $route->y_11 }}"></path>
                                    <circle id="03" cx="{{ $route->x_12 }}" cy="{{ $route->y_12 }}" r="7" fill="#f33"></circle>
                                    <text style="stroke: #ffffff; stroke-width: 0.5px;" x='{{ $route->x_12 }}' y='{{ $route->y_12 }}' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ $route->t_1_end }}</tspan></text>
                                    @endempty
                                </svg>
                            </div>
                        </div>
                        @if(count($route->schemes2))
                        <div class="slide">
                            @foreach($route->schemes2 as $scheme2)
                            <img src="{{$scheme2->image}}"/>
                            @endforeach
            
                            <div class="routesbox route{{ $route->id }}">
                                <svg class="map-path" viewBox="0 0 800 450">
                                    @empty(!$route->x_101)
                                    <path class="key-anim01" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" d="M{{ $route->x_101 }} {{ $route->y_101 }}, undefined undefined"></path>
                                    <circle id="01" cx="{{ $route->x_101 }}" cy="{{ $route->y_101 }}" r="7" fill="#f33"></circle>
                                    <text style="stroke: #ffffff; stroke-width: 0.5px;" x='{{ $route->x_101 }}' y='{{ $route->y_101 }}' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ $route->t_2_begin }}</tspan></text>
                                    @endempty
            
                                    @empty(!$route->x_102)
                                    <path class="key-anim02" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" d="M{{ $route->x_102 }} {{ $route->y_102 }}, {{ $route->x_101 }} {{ $route->y_101 }}"></path>
                                    <circle id="02" cx="{{ $route->x_102 }}" cy="{{ $route->y_102 }}" r="7" fill="#f33"></circle>
                                    <text style="stroke: #ffffff; stroke-width: 0.5px;" x='{{ $route->x_102 }}' y='{{ $route->y_102 }}' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ $route->t_2_end }}</tspan></text>
                                    @endempty
            
                                    @empty(!$route->x_103)
                                    <path class="key-anim03" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" d="M{{ $route->x_103 }} {{ $route->y_103 }}, {{ $route->x_102 }} {{ $route->y_102 }}"></path>
                                    <circle id="03" cx="{{ $route->x_103 }}" cy="{{ $route->y_103 }}" r="7" fill="#f33"></circle>
                                    <text style="stroke: #ffffff; stroke-width: 0.5px;" x='{{ $route->x_103 }}' y='{{ $route->y_103 }}' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ $route->t_2_end }}</tspan></text>
                                    @endempty
            
                                    @empty(!$route->x_104)
                                    <path class="key-anim04" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" d="M{{ $route->x_104 }} {{ $route->y_104 }}, {{ $route->x_103 }} {{ $route->y_103 }}"></path>
                                    <circle id="03" cx="{{ $route->x_104 }}" cy="{{ $route->y_104 }}" r="7" fill="#f33"></circle>
                                    <text style="stroke: #ffffff; stroke-width: 0.5px;" x='{{ $route->x_104 }}' y='{{ $route->y_104 }}' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ $route->t_2_end }}</tspan></text>
                                    @endempty
            
                                    @empty(!$route->x_105)
                                    <path class="key-anim05" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" d="M{{ $route->x_105 }} {{ $route->y_105 }}, {{ $route->x_104 }} {{ $route->y_104 }}"></path>
                                    <circle id="03" cx="{{ $route->x_105 }}" cy="{{ $route->y_105 }}" r="7" fill="#f33"></circle>
                                    <text style="stroke: #ffffff; stroke-width: 0.5px;" x='{{ $route->x_105 }}' y='{{ $route->y_105 }}' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ $route->t_2_end }}</tspan></text>
                                    @endempty
            
                                    @empty(!$route->x_106)
                                    <path class="key-anim06" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" d="M{{ $route->x_106 }} {{ $route->y_106 }}, {{ $route->x_105 }} {{ $route->y_105 }}"></path>
                                    <circle id="03" cx="{{ $route->x_106 }}" cy="{{ $route->y_106 }}" r="7" fill="#f33"></circle>
                                    <text style="stroke: #ffffff; stroke-width: 0.5px;" x='{{ $route->x_106 }}' y='{{ $route->y_106 }}' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ $route->t_2_end }}</tspan></text>
                                    @endempty
            
                                    @empty(!$route->x_107)
                                    <path class="key-anim07" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" d="M{{ $route->x_107 }} {{ $route->y_107 }}, {{ $route->x_106 }} {{ $route->y_106 }}"></path>
                                    <circle id="03" cx="{{ $route->x_107 }}" cy="{{ $route->y_107 }}" r="7" fill="#f33"></circle>
                                    <text style="stroke: #ffffff; stroke-width: 0.5px;" x='{{ $route->x_107 }}' y='{{ $route->y_107 }}' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ $route->t_2_end }}</tspan></text>
                                    @endempty
            
                                    @empty(!$route->x_108)
                                    <path class="key-anim08" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" d="M{{ $route->x_108 }} {{ $route->y_108 }}, {{ $route->x_107 }} {{ $route->y_107 }}"></path>
                                    <circle id="03" cx="{{ $route->x_108 }}" cy="{{ $route->y_108 }}" r="7" fill="#f33"></circle>
                                    <text style="stroke: #ffffff; stroke-width: 0.5px;" x='{{ $route->x_108 }}' y='{{ $route->y_108 }}' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ $route->t_2_end }}</tspan></text>
                                    @endempty
            
                                    @empty(!$route->x_109)
                                    <path class="key-anim09" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" d="M{{ $route->x_109 }} {{ $route->y_109 }}, {{ $route->x_108 }} {{ $route->y_108 }}"></path>
                                    <circle id="03" cx="{{ $route->x_109 }}" cy="{{ $route->y_109 }}" r="7" fill="#f33"></circle>
                                    <text style="stroke: #ffffff; stroke-width: 0.5px;" x='{{ $route->x_109 }}' y='{{ $route->y_109 }}' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ $route->t_2_end }}</tspan></text>
                                    @endempty
            
                                    @empty(!$route->x_110)
                                    <path class="key-anim10" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" d="M{{ $route->x_110 }} {{ $route->y_110 }}, {{ $route->x_109 }} {{ $route->y_109 }}"></path>
                                    <circle id="03" cx="{{ $route->x_110 }}" cy="{{ $route->y_110 }}" r="7" fill="#f33"></circle>
                                    <text style="stroke: #ffffff; stroke-width: 0.5px;" x='{{ $route->x_110 }}' y='{{ $route->y_110 }}' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ $route->t_2_end }}</tspan></text>
                                    @endempty
            
                                    @empty(!$route->x_111)
                                    <path class="key-anim11" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" d="M{{ $route->x_111 }} {{ $route->y_111 }}, {{ $route->x_110 }} {{ $route->y_110 }}"></path>
                                    <circle id="03" cx="{{ $route->x_111 }}" cy="{{ $route->y_111 }}" r="7" fill="#f33"></circle>
                                    <text style="stroke: #ffffff; stroke-width: 0.5px;" x='{{ $route->x_111 }}' y='{{ $route->y_111 }}' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ $route->t_2_end }}</tspan></text>
                                    @endempty
            
                                    @empty(!$route->x_112)
                                    <path class="key-anim12" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" d="M{{ $route->x_112 }} {{ $route->y_112 }}, {{ $route->x_111 }} {{ $route->y_111 }}"></path>
                                    <circle id="03" cx="{{ $route->x_112 }}" cy="{{ $route->y_112 }}" r="7" fill="#f33"></circle>
                                    <text style="stroke: #ffffff; stroke-width: 0.5px;" x='{{ $route->x_112 }}' y='{{ $route->y_112 }}' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ $route->t_2_end }}</tspan></text>
                                    @endempty
                                </svg>
                            </div>
                        </div>
                        @endif
                    </div>

                    @endforeach

                </div>
            </div>

            @foreach($routes as $route)
                @if(count($route->schemes2))
                    <button id="prev-route-slide{{ $route->id }}" class="prevnexrroutslide invisible">< Начало маршрута</button>
                    <button id="next-route-slide{{ $route->id }}" class="prevnexrroutslide invisible">Продолжение маршрута ></button>
                @endif

                <script>
                    var $carousel_{{ $route->id }} = $('.map-image{{ $route->id }}').flickity({
                        cellAlign: 'left',
                        contain: true,
                        draggable: false,
                        imagesLoaded: true,
                        pageDots: false,
                        prevNextButtons: false,
                    });

                    $('#prev-route-slide{{ $route->id }}').on( 'click', function() {
                    $(".map-image{{ $route->id }}").css('opacity', '0');
                    panzoom.reset({ startScale: 1 })
                    setTimeout(function () {
                    panzoom.reset({ startScale: 1.1 })
                    }, 250);
                    setTimeout(function () {
                    panzoom.reset({ startScale: 1 });
                    $(".map-image{{ $route->id }}").css('opacity', '1');
                    }, 500);
                    $carousel_{{ $route->id }}.flickity('previous');
                    $('.title_zh').removeClass('visible');
                    $('.title_zh').addClass('invisible');
                    $('#title{{ $route->id }}').removeClass('invisible');
                    $('#title{{ $route->id }}').addClass('visible');
                    });
                    $('#next-route-slide{{ $route->id }}').on( 'click', function() {
                    $(".map-image{{ $route->id }}").css('opacity', '0');
                    panzoom.reset({ startScale: 1 })
                    setTimeout(function () {
                    panzoom.reset({ startScale: 1.1 })
                    }, 250);
                    setTimeout(function () {
                    panzoom.reset({ startScale: 1 });
                    $(".map-image{{ $route->id }}").css('opacity', '1');
                    }, 500);
                    $carousel_{{ $route->id }}.flickity('next');
                    $('.title_zh').removeClass('visible');
                    $('.title_zh').addClass('invisible');
                    $('#title2{{ $route->id }}').removeClass('invisible');
                    $('#title2{{ $route->id }}').addClass('visible');
                    });
                </script>

                <script>
                    $('#route_push_{{ $route->id }}').on('click', function() {
                    $(".map-image").hide();
                    $('.prevnexrroutslide').hide();
                    $(".map-image{{ $route->id }}").show();
                    $(".map-image{{ $route->id }}").css('opacity', '1');
                    $(".map svg").css('opacity', '1');
                    $('#prev-route-slide{{ $route->id }}').hide();
                    $('#next-route-slide{{ $route->id }}').show();
                    $('.map-image{{ $route->id }}').flickity('previous');
                    $('.title_zh').removeClass('visible');
                    $('.title_zh').addClass('invisible');
                    $('#title{{ $route->id }}').removeClass('invisible');
                    $('#title{{ $route->id }}').addClass('visible');

                    $carousel_{{ $route->id }}.on( 'select.flickity', function( event, index ) {
                            if (index == 0) {
                                $('#prev-route-slide{{ $route->id }}').hide();
                                $('#next-route-slide{{ $route->id }}').show();
                            }
                            if (index == 1) {
                                $('#prev-route-slide{{ $route->id }}').show();
                                $('#next-route-slide{{ $route->id }}').hide();
                            }
                        });
                    });
                </script>

            @endforeach

            </div>
        </div>
    </div>    

    <footer>
        <div class="container">
            <a href="/" class="shkola-home shkola-home-sub">
                <img src="/img/shkolahome.svg" alt="">
            </a>
            <a href="/front-r01routes" class="shkola-footer-second"><span>План школы</span></a>
        </div>
    </footer>

    <script>
        $(document).ready(function(){
            $("svg").find("text").hide();
            $("svg").find("text:first").show();
            $("svg").find("text:last").show();
            //$("#wrapper").html($("#wrapper").html());
        });
    </script>

    <script> // ZOOM
        const elem = document.getElementById('wrapper-inner');
            const zoomInButton = document.getElementById('zoomin');
            const zoomOutButton = document.getElementById('zoomout');
            const resetButton = document.getElementById('reset');
            const panzoom = Panzoom(elem, {
                contain: 'outside',
                duration: 200,
                startX: 0,
                startY: 0,
                startScale: 1,
                maxScale: 1,
                minScale: 1,
            });
            const parent = elem.parentElement
        parent.addEventListener('wheel', panzoom.zoomWithWheel);
        //zoomInButton.addEventListener('click', panzoom.zoomIn);
        //zoomOutButton.addEventListener('click', panzoom.zoomOut);
        //resetButton.addEventListener('click', panzoom.reset);
    </script>