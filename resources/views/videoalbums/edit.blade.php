@extends('layouts.app')
@section('content')

    <div class="px-4 py-4">
        <div class="row align-items-center mb-4">
            <div class="col-6">
                <h1>{{$videoalbum->title}}</h1>
                <p style="color: #999">Редактирование видео</p>
            </div>
        </div>

        <form action="/videoalbums/{{$videoalbum->id}}" method="post" enctype="multipart/form-data">@csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{$videoalbum->id}}">

            <div class="row align-items-center mb-2">    
                <dt class="col-sm-3">
                    Название
                </dt>
                <dd class="col-sm-9">
                    <input type="text" class="form-control"  name="title" value="{{$videoalbum->title}}">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    Обложка
                    <br>
                    <p class="field_desc">необязательно</p>
                </dt>
                <dd class="col-sm-9">
                    <input class="cover" type="file" name="cover" x-ref="cover">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    Видеоролик
                </dt>
                <dd class="col-sm-9">
                    <input class="gallery" type="file" name="gallery">
                </dd>
            </div>

            <button type="submit" class="btn btn-lg btn-success">Сохранить</button>
            <a href="/videoalbums" class="btn btn-lg btn-secondary">Отмена</a>
        </form>
    </div>

    <script>
        FilePond.registerPlugin(FilePondPluginImagePreview);
        $('.cover').filepond({
            allowMultiple: false,
            allowReorder: false,
            imagePreviewHeight: 140,
            labelIdle: 'Нажмите для загрузки файлов',
            labelFileProcessing: 'Загрузка',
            labelFileProcessingComplete: 'Загружено',
            labelTapToCancel: '',
            labelTapToUndo: '',

            server: {
                remove: (filename, load) => {
                    load('1');
                    return  ajax_delete('deleteimage');
                },
                process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                    const formData = new FormData();
                    formData.append(fieldName, file, file.name);
                    const request = new XMLHttpRequest();
                    request.open('POST', '/videoalbums/file/upload');
                    request.upload.onprogress = (e) => {
                        progress(e.lengthComputable, e.loaded, e.total);
                    };
                    request.onload = function() {
                        if (request.status >= 200 && request.status < 300) {
                            load(request.responseText);
                        }
                        else {
                            error('oh no');
                        }
                    };
                    request.send(formData);
                    return {
                        abort: () => {
                            request.abort();
                            abort();
                        }
                    };
                },
                revert: (filename, load) => {
                    load(filename)
                },
                load: (source, load, error, progress, abort, headers) => {
                    var myRequest = new Request(source);
                    fetch(myRequest).then(function(response) {
                        response.blob().then(function(myBlob) {
                            load(myBlob)
                        });
                    });
                },
            },

            files: [
            @if(isset($videoalbum->cover))
                {
                    source: '{{ $videoalbum->cover }}',
                    options: {
                        type: 'local',
                    }
                },
            @endif
            ]

        });
        $('.gallery').filepond({
            allowMultiple: false,
            allowReorder: false,
            imagePreviewHeight: 140,
            labelIdle: 'Нажмите для загрузки файлов',
            labelFileProcessing: 'Загрузка',
            labelFileProcessingComplete: 'Загружено',
            labelTapToCancel: '',
            labelTapToUndo: '',

            server: {
                remove: (filename, load) => {
                    load('1');
                    return  ajax_delete('deleteimage');
                },
                process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                    const formData = new FormData();
                    formData.append(fieldName, file, file.name);
                    const request = new XMLHttpRequest();
                    request.open('POST', '/videoalbums/file/upload');
                    request.upload.onprogress = (e) => {
                        progress(e.lengthComputable, e.loaded, e.total);
                    };
                    request.onload = function() {
                        if (request.status >= 200 && request.status < 300) {
                            load(request.responseText);
                        }
                        else {
                            error('oh no');
                        }
                    };
                    request.send(formData);
                    return {
                        abort: () => {
                            request.abort();
                            abort();
                        }
                    };
                },
                revert: (filename, load) => {
                    load(filename)
                },
                load: (source, load, error, progress, abort, headers) => {
                    var myRequest = new Request(source);
                    fetch(myRequest).then(function(response) {
                        response.blob().then(function(myBlob) {
                            load(myBlob)
                        });
                    });
                },
            },

            files: [
                {
                    source: '{{ $videoalbum->gallery }}',
                    options: {
                        type: 'local',
                    }
                }
            ]

        });


        function ajax_delete(methos){
            $.ajax({
               url:'/videoalbums/file/'+methos,
                method:'POST'
            });
        }
    </script>

@endsection