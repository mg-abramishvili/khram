<div class="type-8" style="height: 780px;">
    <div class="row align-items-center" style="height: 780px;">
        
<div class="col-12" style="top: -30px;">

<style>
    #flipbook {
        animation-name: fade;
        animation-duration: 2s;
        position: relative;
    }

        @keyframes fade {
    0% {opacity: 0;}
    50% {opacity: 0;}
    100% {opacity: 1;}
    }

    
</style>

        <div id="flipbook" style="margin: 0 auto;">
            @if(is_array($page->gallery))
                @foreach($page->gallery as $k=>$v)
                <div>
                    <img src="{{$v}}" style="width: 100%; height: auto;">
                </div>
                @endforeach
            @endif
        </div>

        @if($settings->theme == 'default')
            <img src="/img/book.png" class="ccover" style="opacity: 0;">
        @elseif($settings->theme == 'nast')
            <img src="/img/book_old.png" class="ccover" style="opacity: 0;">
        @elseif($settings->theme == 'book')
            <img src="/img/book_old.png" class="ccover" style="opacity: 0;">
        @elseif($settings->theme == 'book')
            <img src="/img/book_old.png" class="ccover" style="opacity: 0;">
        @endif

        </div>
    </div>
    <div class="buttons">
    <button id="prevBtn"><</button>
    <button id="nextBtn">></button>
    </div>
</div>
<div class="col-12" style="opacity:0;">

        <div id="sizer" style="border: 1px solid black; display:block; margin: 0 auto; width: 1200px;">
            @if(is_array($page->gallery))
                @foreach($page->gallery as $k=>$v)
                <div style="width: 50%; float: left;">
                    <img src="{{$v}}" style="width: 100%; height: auto;">
                </div>
                @endforeach
            @endif
        </div>
</div>
<script>
setTimeout(function(){
$("#flipbook").turn({
	width: $('#sizer div:first').find('img').width() * 2,
	height: $('#sizer div:first').find('img').height(),
});
    var ccover_width = $('#sizer div:first').find('img').width() * 2 + 140;
	var ccover_height = $('#sizer div:first').find('img').height() + 40;
    $('.ccover').height(ccover_height).width(ccover_width);
}, 1000);
$("#pageFld").val($("#flipbook").turn("page"));

$("#flipbook").bind("turned", function(event, page, view) {
		$("#pageFld").val(page);
});

$("#pageFld").change(function() {
		$("#flipbook").turn("page", $(this).val());
});

$("#prevBtn").click(function() {
		$("#flipbook").turn("previous");
});

$("#nextBtn").click(function() {
		$("#flipbook").turn("next");
});
</script>