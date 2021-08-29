@section('styles')
    @parent
    <link href="{{ asset('css/style-book.css') }}" rel="stylesheet">
@endsection

<div class="book">
    <div class="container">
        @foreach($pages as $page)
            @if($loop->first)
                <script>window.location = "/front-pages/{{ $page->id }}";</script>
            @endif
        @endforeach
    </div>
</div>