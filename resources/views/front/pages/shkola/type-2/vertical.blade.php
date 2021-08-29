<div class="type-2">
    <div class="row">
        <div class="col-12">
            <div class="page-detail-image" style="background: url({{ $page->image }}); background-size: cover; background-position: 50% 50%;"></div>
        </div>
        <div class="col-12">
            <div class="page-detail-text">
                <h1 class="mb-4">{{ $page->title }}</h1>
                {!! $page->text !!}
            </div>
        </div>
    </div>
</div>