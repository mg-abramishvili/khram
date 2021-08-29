@extends('layouts.app')
@section('content')

    <div class="px-4 py-4">
        <div class="row align-items-center mb-4">
            <div class="col-6">
                <h1>Настройки</h1>
            </div>
        </div>

        <form action="/settings/{{$settings->id}}" method="post" enctype="multipart/form-data">@csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{$settings->id}}">

            <div class="row align-items-center mb-2">    
                <dt class="col-sm-3">
                    SMTP-сервер
                    <br>и отправка E-mail
                </dt>
                <dd class="col-sm-9">
                    <div class="row">
                        <div class="col-12">
                            <label>Сервер (хост)</label>
                            <input type="text" class="form-control mb-1" name="smtp_host" placeholder="Сервер (хост)" value="{{$settings->smtp_host}}">
                        </div>
                        <div class="col-6">
                            <label>Порт</label>
                            <input type="text" class="form-control mb-1" name="smtp_port" placeholder="Порт" value="{{$settings->smtp_port}}">
                        </div>
                        <div class="col-6">
                            <label>SSL</label>
                            <input type="text" class="form-control mb-1" name="smtp_sec" placeholder="SSL" value="{{$settings->smtp_sec}}">
                        </div>
                        <div class="col-6">
                            <label>Логин</label>
                            <input type="text" class="form-control mb-1" name="smtp_user" placeholder="Логин" value="{{$settings->smtp_user}}">
                        </div>
                        <div class="col-6">
                            <label>Пароль</label>
                            <input type="text" class="form-control" name="smtp_password" placeholder="Пароль" value="{{$settings->smtp_password}}">
                        </div>
                        <div class="col-6">
                            <label>От кого</label>
                            <input type="text" class="form-control mb-1" name="email_from" placeholder="От кого" value="{{$settings->email_from}}">
                        </div>
                        <div class="col-6">
                            <label>Куда</label>
                            <input type="text" class="form-control" name="email_to" placeholder="Куда" value="{{$settings->email_to}}">
                        </div>
                    </div>
                </dd>
            </div>

            <div class="row align-items-center mb-2">    
                <dt class="col-sm-3">
                    Логотип
                </dt>
                <dd class="col-sm-9">
                    <input class="logo" type="file" name="logo" x-ref="logo">
                </dd>
            </div>

            <div class="row align-items-center mb-2">    
                <dt class="col-sm-3">
                    Заголовок
                </dt>
                <dd class="col-sm-9">
                    <input type="text" class="form-control" name="title" value="{{$settings->title}}">
                    <p><small>Для переноса текста на новую строку используйте символ *</small></p>
                </dd>
            </div>

            <div style="@if(\Auth::user()->id == '1') display: block; @else display: none; @endif">
            <div class="row align-items-center mb-2">    
                <dt class="col-sm-3">
                    Тема
                </dt>
                <dd class="col-sm-9">
                    <select name="theme" id="theme" class="form-control">
                        <option value="khram" @if($settings->theme == "khram") selected @endif>Храм</option>
                    </select>

                    <script>
                        var optionValues =[];
                        $('#theme option').each(function(){
                        if($.inArray(this.value, optionValues) >-1){
                            $(this).remove()
                        }else{
                            optionValues.push(this.value);
                        }
                        });
                    </script>
                </dd>
            </div>

            <div class="row align-items-center mb-2">    
                <dt class="col-sm-3">
                    Ориентация экрана
                </dt>
                <dd class="col-sm-9">
                    <select class="form-control" name="orientation">
                        <option value="vertical" @if($settings->orientation == "vertical") selected @endif>Вертикальная</option>
                    </select>
                </dd>
            </div>

            <hr>

            <div class="row align-items-center mb-2">    
                <dt class="col-sm-3">
                    Модуль "Новости"
                </dt>
                <dd class="col-sm-9">
                    <select class="form-control" name="module_news">
                        <option value="y" @if($settings->module_news == "y") selected @endif>Вкл</option>
                        <option value="n" @if($settings->module_news == "n") selected @endif>Выкл</option>
                    </select>
                </dd>
            </div>

            <div class="row align-items-center mb-2">    
                <dt class="col-sm-3">
                    Модуль "Фотогалерея"
                </dt>
                <dd class="col-sm-9">
                    <select class="form-control" name="module_photoalbums">
                        <option value="y" @if($settings->module_photoalbums == "y") selected @endif>Вкл</option>
                        <option value="n" @if($settings->module_photoalbums == "n") selected @endif>Выкл</option>
                    </select>
                </dd>
            </div>

            <div class="row align-items-center mb-2">    
                <dt class="col-sm-3">
                    Модуль "Видеогалерея"
                </dt>
                <dd class="col-sm-9">
                    <select class="form-control" name="module_videoalbums">
                        <option value="y" @if($settings->module_videoalbums == "y") selected @endif>Вкл</option>
                        <option value="n" @if($settings->module_videoalbums == "n") selected @endif>Выкл</option>
                    </select>
                </dd>
            </div>

            <div class="row align-items-center mb-2">    
                <dt class="col-sm-3">
                    Модуль "Маршруты"
                </dt>
                <dd class="col-sm-9">
                    <select class="form-control" name="module_routes">
                        <option value="y" @if($settings->module_routes == "y") selected @endif>Вкл</option>
                        <option value="n" @if($settings->module_routes == "n") selected @endif>Выкл</option>
                    </select>
                </dd>
            </div>

            <div class="row align-items-center mb-2">    
                <dt class="col-sm-3">
                    Модуль "Отзывы"
                </dt>
                <dd class="col-sm-9">
                    <select class="form-control" name="module_reviews">
                        <option value="y" @if($settings->module_reviews == "y") selected @endif>Вкл</option>
                        <option value="n" @if($settings->module_reviews == "n") selected @endif>Выкл</option>
                    </select>
                </dd>
            </div>

            <hr>
            </div>

            <div class="row mt-5">
                <div class="col-12">
                    <button type="submit" class="btn btn-lg btn-success">Сохранить</button>
                </div>
            </div>
            
        </form>
    </div>

    <script>
        FilePond.registerPlugin(FilePondPluginImagePreview);
        $('.logo').filepond({
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
                    return  ajax_delete('deletelogo');
                },
                process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                    const formData = new FormData();
                    formData.append(fieldName, file, file.name);
                    const request = new XMLHttpRequest();
                    request.open('POST', '/settings/file/upload');
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
                    source: '{{ $settings->logo }}',
                    options: {
                        type: 'local',
                    }
                }
            ]

        });


        function ajax_delete(methos){
            $.ajax({
               url:'/settings/file/'+methos,
                method:'POST'
            });
        }
    </script>

@endsection