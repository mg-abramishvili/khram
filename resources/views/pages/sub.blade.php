<ul class="pages-table-sub">
@foreach($children as $pg)
    <li>
        <span>
        {{ $pg->title }}
        @if(!$pg->children->count())
        <a href="/pages/{{$pg->id}}/edit" class="btn btn-sm btn-outline-primary">Правка</a>
        <a href="/pages/delete/{{$pg->id}}" class="btn btn-sm btn-outline-danger">Удалить</a>
        @else
        <a href="/pages/{{$pg->id}}/edit" class="btn btn-sm btn-outline-primary">Правка</a>
        @endif
        </span>
        @if(count($pg->children))
            @include('pages.sub ',['children' => $pg->children])
        @endif
    </li>
@endforeach
</ul>