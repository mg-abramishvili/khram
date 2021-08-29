<div class="type-5">
    <div class="row">
    
        <div class="col-12">

        <div class="gallery-detail">
            <div class="gallery-detail-item">
                <video src="{{ $page->video }}" autoplay controls></video>
            </div>
        </div>

        <script>
            $('.gallery-detail').flickity({
            cellAlign: 'center',
            contain: true,
            imagesLoaded: true,
            pageDots: false,
            wrapAround: true,
            prevNextButtons: false
            });
        </script>
            
        </div>
    </div>
</div>