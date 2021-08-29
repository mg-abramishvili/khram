<div class="type-6 container-index">
    <div class="row">
    @foreach($childs->children as $child)
        <div class="col-6">
            <div class="user-pages-item-item">
                <a href="/front-pages/{{ $child->id }}" class="index-button">
                    
                    @if($child->image_as_icon == 1)
                        <div class="user-pages-item-image" style="background-image:url({{ $child->image }});"></div>
                        <span class="t6-p">{{ $child->title }}</span>
                    @else
                    <span>{{ $child->title }}</span>
                    @endif
                </a>
            </div>
        </div>
    @endforeach
</div>
