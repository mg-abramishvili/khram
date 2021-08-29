@section('styles')
    @parent
    <link href="{{ asset('css/style-muzei.css') }}" rel="stylesheet">
    @if($settings->orientation == 'vertical')
        <link href="{{ asset('css/style-muzei-vert.css') }}" rel="stylesheet">
    @endif
@endsection

<div class="muzei">

    <div class="container">

    <div class="row">
        <div class="col-3">
            <div class="m-sidebar">
                <div class="m-logo">
                    <a href="/"><img src="{{ $settings->logo }}"></a>
                </div>
                <div class="m-title">
                    <p>{{ $settings->title }}</p>
                </div>

                @if($settings->module_videoalbums == 'y')
                    <a href="/front-videoalbums/" class="m-sidebar-button">
                        <span>Видеогалерея</span>
                        <img src="/img/muzei/vdbtn.png">
                    </a>
                @endif
            </div>
        </div>
        <div class="col-9">
            <div class="page-title">
                <div class="breadcrumbs">
                    ←
                    <a href="/">Главная</a>
                    /
                </div>
                <h1>План музея</h1>
            </div>
            <div class="page-item routes-index">
                <div class="row align-items-center">
                <div class="col-5">
                <div class="muzei-route-sidebar">
                    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Поиск ...">
                    @include('front.keyboard')
                    <ul id="myUL">
                    @foreach ($r01routes as $scheme => $route)
                        @foreach($route as $routeItem)
                            @if($loop->first)
                                @foreach($routeItem->schemes as $sch)
                                    <h4><strong>{{ $sch->title }}</strong></h4>
                                @endforeach
                            @endif
                        @endforeach
                        @foreach($route as $routeItem)
                            <li>
                                <a href="/front-r01routes/{{ $routeItem->id }}">{{ $routeItem->title }}</a>
                            </li>
                        @endforeach
                    @endforeach
                    </ul>
                </div>
                </div>
                <div class="col-7">
                    <img src="{{ $schemes->image }}" style="width:auto; height: auto; max-width: 100%; max-height: 70vh; display:block; margin: 0 auto;">
                </div>
                </div>
            </div>
        </div>
    </div>

    </div>

</div> 