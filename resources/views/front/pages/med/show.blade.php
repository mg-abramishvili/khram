@section('styles')
    @parent
    <link href="{{ asset('css/style-med.css') }}" rel="stylesheet">
    @if($settings->orientation == 'vertical')
        <link href="{{ asset('css/style-med-vert.css') }}" rel="stylesheet">
    @endif
@endsection

    <div class="med">

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

            <div class="page-item">
                @forelse($page->types as $type)

                    @if($type->id == '1')
                        @if($settings->orientation == 'horizontal')
                            @include('front.pages.med.type-1.horizontal')
                        @elseif($settings->orientation == 'vertical')
                            @include('front.pages.med.type-1.vertical')
                        @endif

                    @elseif($type->id == '2')
                        @if($settings->orientation == 'horizontal')
                            @include('front.pages.med.type-2.horizontal')
                        @elseif($settings->orientation == 'vertical')
                            @include('front.pages.med.type-2.vertical')
                        @endif

                    @elseif($type->id == '3')
                        @include('front.pages.med.type-3.horizontal')

                    @elseif($type->id == '4')
                        @include('front.pages.med.type-4.horizontal')

                    @elseif($type->id == '5')
                        @include('front.pages.med.type-5.horizontal')

                    @elseif($type->id == '6')
                        @include('front.pages.med.type-6.horizontal')

                    @elseif($type->id == '7')
                        @include('front.pages.med.type-7.horizontal')

                    @elseif($type->id == '8')
                        @include('front.pages.med.type-8.horizontal')

                    @elseif($type->id == '9')
                        @if($settings->orientation == 'horizontal')
                            @include('front.pages.med.type-9.horizontal')
                        @elseif($settings->orientation == 'vertical')
                            @include('front.pages.med.type-9.vertical')
                        @endif
                    @endif
                @empty
                    <p>Не задан тип страницы</p>
                @endforelse
            </div>

        </div>

        <footer>
            <div class="container">
                <a href="/" class="med-home med-home-sub">
                    <img src="/img/medhome.svg" alt="">
                </a>
                @if($page->parent_id)
                    @foreach ($pages as $parent_page)
                        @if($parent_page->id == $page->parent_id)
                        <a href="/front-pages/{{ $parent_page->id }}" class="med-footer-second"><span>{{ $parent_page->title }}</span></a>
                        <a class="med-footer-third"><span>{{ $page->title }}</span></a>
                        @endif
                    @endforeach
                @else
                    <a href="/front-pages/{{ $page->id }}" class="med-footer-second"><span>{{ $page->title }}</span></a>
                @endif
            </div>
        </footer>
    </div>