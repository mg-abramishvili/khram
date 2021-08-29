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

                <h1 class="title_title">Новости</h1>

                <div class="news-buttons">

                    <div class="row">
                        @foreach($news as $new)
                        <div class="col-6">
                            <div class="news-list-item">
                                <a href="/front-news/{{ $new->id }}">
                                    <div class="row align-items-center">
                                        <div class="col-4">
                                            <div class="news-list-item-image" style="background-image: url({{$new->image}});"></div>
                                        </div>
                                        <div class="col-8">
                                            <h2>{{ $new->title }}</h2>
                                            <div class="news-list-item-text-preview">
                                                {{ \Illuminate\Support\Str::limit($new->text ?? '', 100, $end='...') }}
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>

    </div>

</div>

