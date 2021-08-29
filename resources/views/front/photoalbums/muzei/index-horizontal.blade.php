@section('styles')
    @parent
    <link href="{{ asset('css/style-muzei.css') }}" rel="stylesheet">
@endsection

<div class="muzei">

    <div class="container">

    <div class="row">
        <div class="col-3">
            <div class="m-sidebar">
                <div class="m-logo">
                    <a href="/"><img src="{{ $settings->logo }}"></a>
                </div>
                <div class="m-title">
                    <p>{{ $settings->title }}</p>
                </div>

                @if($settings->module_videoalbums == 'y')
                    <a href="/front-videoalbums/" class="m-sidebar-button">
                        <span>Видеогалерея</span>
                        <img src="/img/muzei/vdbtn.png">
                    </a>
                @endif
            </div>
        </div>
        <div class="col-9">
            <div class="news-content">

                <h1 class="title_title">Фотогалерея</h1>

                <div class="subindex-buttons">
                    @foreach($photoalbums as $photoalbum)
                        <a href="/front-photoalbums/{{ $photoalbum->id }}" class="subindex-button">
                            @if(is_array($photoalbum->gallery))
                                @foreach($photoalbum->gallery as $k=>$v)
                                    @if ($loop->first)
                                        <div class="user-pages-item-image" style="background-image: url({{ $v }});"></div>
                                    @endif
                                @endforeach
                            @endif
                            <span class="t6-p">{{ $photoalbum->title }}</span>
                        </a>
                    @endforeach
                </div>

            </div>
        </div>
    </div>

    </div>

</div>