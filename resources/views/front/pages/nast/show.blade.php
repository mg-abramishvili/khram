@section('styles')
    @parent
    <link href="{{ asset('css/style-nast.css') }}" rel="stylesheet">
@endsection

    <div class="default">
        <div class="container">

            <div class="page-item">
                @foreach($page->types as $type)
                    @if($type->id == '1')
                        @include('front.pages_types.type-1.horizontal')
                    @elseif($type->id == '2')
                        @include('front.pages_types.type-2.horizontal')
                    @elseif($type->id == '3')
                        @include('front.pages_types.type-3.horizontal')
                    @elseif($type->id == '4')
                        @include('front.pages_types.type-4.horizontal')
                    @elseif($type->id == '5')
                        @include('front.pages_types.type-5.horizontal')
                    @elseif($type->id == '6')
                        @include('front.pages_types.type-6.horizontal')
                    @elseif($type->id == '7')
                        @include('front.pages_types.type-7.horizontal')
                    @elseif($type->id == '8')
                        @include('front.pages_types.type-8.horizontal')
                    @endif

                @endforeach
            </div>

        </div>

        @foreach($page->types as $type)
            @if($type->id == '6')
                <footer>
                    <div class="home">
                        <a href="/" class="home-home"><img src="/img/nast-home.png"></a>
                    </div>
                    <div class="container">
                        Выберите интересующий Вас разздел и нажмите на него
                    </div>
                </footer>
            @else
                <footer>
                    <div class="home">
                        <a href="/" class="home-home"><img src="/img/nast-home.png"></a>
                        <a href="#" onclick="window.history.go(-1); return false;" class="home-back"><img src="/img/nast-back.png"></a>
                    </div>
                    <div class="container">
                        Выберите интересующий Вас разздел и нажмите на него
                    </div>
                </footer>
            @endif
        @endforeach
        

    </div>