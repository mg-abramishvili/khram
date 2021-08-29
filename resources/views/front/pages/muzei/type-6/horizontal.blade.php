<div class="type-6">
    <div class="subindex-buttons">
        @foreach($childs->children as $child)
            <a href="/front-pages/{{ $child->id }}" class="subindex-button">
                @if($child->image_as_icon == 1)
                    <div class="user-pages-item-image" style="background-image:url({{ $child->image }});"></div>
                    <span class="t6-p">{{ $child->title }}</span>
                @else
                    <span>{{ $child->title }}</span>
                @endif
            </a>
        @endforeach
    </div>
</div>
