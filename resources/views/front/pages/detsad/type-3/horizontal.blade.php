<div class="type-3">
    <div class="row">

        <div class="col-4">
            <div class="page-detail-text">
                <h1 class="mb-4">{{ $page->title }}</h1>
                {!! $page->text !!}
            </div>
        </div>
        <div class="col-8">
            <div id="gallery" class="row">
                @if(is_array($page->gallery))
                @foreach($page->gallery as $k=>$v)
                    <div class="col-6">
                        <a href="{{$v}}" style="background-image: url({{$v}});"></a>
                    </div>
                @endforeach
                @endif
            </div>
            <script>
                lightGallery(document.getElementById('gallery'), {
                    selector: 'a'
                });
            </script>
        </div>
    </div>
</div>