@section('styles')
    @parent
    <link href="{{ asset('css/style-book.css') }}" rel="stylesheet">
@endsection

    <div class="book">
        <div class="container">

            <div class="page-item">
                @forelse($page->types as $type)
                    @if($type->id == '8')
                        @include('front.pages.book.type-8.horizontal')
                    @endif
                @empty
                    <p>Не задан тип страницы</p>
                @endforelse
            </div>

        </div>
    </div>