<div class="type-6">
    <div class="row">
        <div class="col-12">
            <div class="user-pages">
                @foreach($childs->children as $child)
                    <div class="user-pages-item-item">
                        <a href="/front-pages/{{ $child->id }}">
                            @if($child->image_as_icon == 1)
                                <div class="user-pages-item-image" style="background-image:url({{ $child->image }});"></div>
                            @else
                                @if($child->icons()->exists())
                                    @foreach($child->icons as $icon)
                                        <img src="{{ $icon->icon }}">
                                    @endforeach
                                @else
                                    <img src="/img/icons/014-passport.svg">
                                @endif
                            @endif
                            {{ $child->title }}
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@section('scripts')
    @parent
    <script>
        var divs = $(".user-pages .user-pages-item-item");
            for(var i = 0; i < divs.length; i+=2) {
            divs.slice(i, i+2).wrapAll("<div class='user-pages-item'></div>");
        }
    </script>

    <script>
        $('.user-pages').flickity({
        cellAlign: 'left',
        contain: true,
        prevNextButtons: false,
        pageDots: false,
        imagesLoaded: true,
        });
    </script>
@endsection