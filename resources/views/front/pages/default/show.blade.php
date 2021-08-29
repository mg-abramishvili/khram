@section('styles')
    @parent
    <link href="{{ asset('css/style-default.css') }}" rel="stylesheet">
    @if($settings->orientation == 'vertical')
        <link href="{{ asset('css/style-default-vert.css') }}" rel="stylesheet">
    @endif
@endsection

    <div class="default">
        <div class="container">
            <div class="header">
                <div class="row align-items-center">
                    <div class="col-4 header-logo">
                        <a href="/"><img src="{{ $settings->logo }}"></a>
                    </div>
                    <div class="col-8 header-text">
                        {{ $settings->title }}
                    </div>
                </div>
            </div>

            <div class="page-item">
                @forelse($page->types as $type)

                    @if($type->id == '1')
                        @if($settings->orientation == 'horizontal')
                            @include('front.pages.default.type-1.horizontal')
                        @elseif($settings->orientation == 'vertical')
                            @include('front.pages.default.type-1.vertical')
                        @endif

                    @elseif($type->id == '2')
                        @if($settings->orientation == 'horizontal')
                            @include('front.pages.default.type-2.horizontal')
                        @elseif($settings->orientation == 'vertical')
                            @include('front.pages.default.type-2.vertical')
                        @endif

                    @elseif($type->id == '3')
                        @include('front.pages.default.type-3.horizontal')

                    @elseif($type->id == '4')
                        @include('front.pages.default.type-4.horizontal')

                    @elseif($type->id == '5')
                        @include('front.pages.default.type-5.horizontal')

                    @elseif($type->id == '6')
                        @include('front.pages.default.type-6.horizontal')

                    @elseif($type->id == '7')
                        @include('front.pages.default.type-7.horizontal')

                    @elseif($type->id == '8')
                        @include('front.pages.default.type-8.horizontal')

                    @elseif($type->id == '9')
                        @if($settings->orientation == 'horizontal')
                            @include('front.pages.default.type-9.horizontal')
                        @elseif($settings->orientation == 'vertical')
                            @include('front.pages.default.type-9.vertical')
                        @endif
                    @endif
                @empty
                    <p>Не задан тип страницы</p>
                @endforelse
            </div>

            <div class="footer">
                <a href="/" class="home-button">
                    <img src="/img/icon-footer-home.svg">
                </a>
            </div>

        </div>
    </div>