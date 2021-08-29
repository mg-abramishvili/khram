<div class="type-6 container-index" style="margin-left: 1.1vh;">
    <div class="sortable">
        @foreach($childs->children as $child)
            <a href="/front-pages/{{ $child->id }}" class="index-button index-button-full">
                
                @if($child->image_as_icon == 1)
                    <div class="user-pages-item-image" style="background-image:url({{ $child->image }});"></div>
                    <span class="t6-p">{{ $child->title }}</span>
                    @else
                        @if($child->icons()->exists())
                            @foreach($child->icons as $icon)
                                <div class="index-button-icon">
                                    <img src="{{ $icon->icon }}">
                                </div>
                                <span>{{ $child->title }}</span>
                            @endforeach
                        @else
                            <div class="index-button-icon">
                                <img src="/img/icons/014-passport.svg">
                            </div>
                            <span>{{ $child->title }}</span>
                        @endif
                    @endif

            </a>
        @endforeach
</div>
@section('scripts')
    @parent
    <script>
        asc=false;   
        var sorted=$('.index-button').sort(function(a,b){
                return (asc ==
                    ($(a).data('index') <  $(b).data('index'))) ? 1 : -1;
            });
            asc = asc ? false : true;
            $('.sortable').html(sorted);
    </script>

    <script>
        $('.sortable').flickity({
        cellAlign: 'left',
        contain: true,
        prevNextButtons: false,
        pageDots: false,
        groupCells: 4,
        draggable: '>1',
        });
    </script>
@endsection
