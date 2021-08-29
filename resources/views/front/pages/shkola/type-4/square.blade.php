<div class="type-4">
    <div class="row">
        <div class="col-12">
            @if(is_array($page->gallery))
            <div class="gallery-detail">
                @foreach($page->gallery as $k=>$v)
                    <div class="gallery-detail-item">
                        <img src="{{ $v }}" />
                    </div>
                @endforeach
            </div>
            @endif

            <script>
                $('.gallery-detail').flickity({
                cellAlign: 'center',
                contain: true,
                imagesLoaded: true,
                pageDots: false,
                wrapAround: true,
                });
            </script>
        </div>
    </div>
    
</div>