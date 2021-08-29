<div class="type-1">
    <div class="row">
        <div class="col-12">
            <div class="page-detail-text">

                @if($settings->theme == 'default')
                    <h1 class="mb-4">{{ $page->title }}</h1>
                @elseif($settings->theme == 'nast')
                    <h1 class="mb-4">{{ $page->title }}</h1>
                @endif

                {!! $page->text !!}

            </div>
        </div>
    </div>
</div>