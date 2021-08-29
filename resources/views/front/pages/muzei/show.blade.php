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
                    @if($page->parent_id)
                    /
                    @foreach ($pages as $parent_page)
                        @if($parent_page->id == $page->parent_id)
                        <a href="/front-pages/{{ $parent_page->id }}">{{ $parent_page->title }}</a>
                        @endif
                    @endforeach
                    /
                    @endif
                </div>
                <h1>{{ $page->title }}</h1>
            </div>
            <div class="page-item">
                @forelse($page->types as $type)

                    @if($type->id == '1')
                        @if($settings->orientation == 'horizontal')
                            @include('front.pages.muzei.type-1.horizontal')
                        @elseif($settings->orientation == 'vertical')
                            @include('front.pages.muzei.type-1.vertical')
                        @endif

                    @elseif($type->id == '2')
                        @if($settings->orientation == 'horizontal')
                            @include('front.pages.muzei.type-2.horizontal')
                        @elseif($settings->orientation == 'vertical')
                            @include('front.pages.muzei.type-2.vertical')
                        @endif

                    @elseif($type->id == '3')
                        @include('front.pages.muzei.type-3.horizontal')

                    @elseif($type->id == '4')
                        @include('front.pages.muzei.type-4.horizontal')

                    @elseif($type->id == '5')
                        @include('front.pages.muzei.type-5.horizontal')

                    @elseif($type->id == '6')
                        @include('front.pages.muzei.type-6.horizontal')

                    @elseif($type->id == '7')
                        @include('front.pages.muzei.type-7.horizontal')

                    @elseif($type->id == '8')
                        @include('front.pages.muzei.type-8.horizontal')

                    @elseif($type->id == '9')
                        @if($settings->orientation == 'horizontal')
                            @include('front.pages.muzei.type-9.horizontal')
                        @elseif($settings->orientation == 'vertical')
                            @include('front.pages.muzei.type-9.vertical')
                        @endif
                    @endif
                @empty
                    <p>Не задан тип страницы</p>
                @endforelse
            </div>
        </div>
    </div>

    </div>

</div>