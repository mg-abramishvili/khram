@extends('layouts.app')
@section('content')

    <style>
        .type-radio .radio {
            margin-bottom: 20px;
            background: lightgray;
        }

        .type-radio span {
            display: block;
            position: absolute;
            bottom: 0;
            z-index: 10;
            left: 0;
            right: 0;
            text-align: center;
        }

        .type-radio input[type="radio"] {
            border: 2px solid red;
        }

        .type-radio input[type="radio"]:checked+label {
            border: 4px solid #3171B8;
        } 

        .type-radio .radio label {
            width: 100%;
            height: 180px;
            height: auto;
            position: relative;
        }

        .type-radio .radio img {
            width: auto;
            height: auto;
            max-width: 80%;
            max-height: 80%;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            display: none;
        }

        .icon-radio .radio {
            background: grey;
            margin-bottom: 20px;
        }

        .icon-radio input[type="radio"] {
            border: 2px solid red;
        }

        .icon-radio input[type="radio"]:checked+label {
            border: 4px solid #3171B8;
        } 

        .icon-radio .radio label {
            width: 100%;
            height: 70px;
            position: relative;
        }

        .icon-radio .radio img {
            width: auto;
            height: auto;
            max-width: 70%;
            max-height: 70%;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
    </style>

    <div class="px-4 py-4">
        <div class="row align-items-center mb-4">
            <div class="col-6">
                <h1>Создание страницы</h1>
            </div>
        </div>

        <form action="/pages" method="post" enctype="multipart/form-data">@csrf
            
            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    Тип страницы
                </dt>
                <dd class="col-sm-9">
                    <div class="row" id="typez" style="height:250px; overflow-y:scroll;">
                        @foreach($types as $type)
                        
                        @if($type->id == '8')
                        @else
                        <div class="col-3 type-radio">
                            <div class="radio">
                                <input name="types" id="type{{ $type->id }}" type="radio" value="{{ $type->id }}">
                                <label for="type{{ $type->id }}">
                                    <img src="{{ $type->image }}" style="width:100%">
                                    <span>{{ $type->type }}</span>
                                </label>
                            </div>
                        </div>
                        @endif

                        @endforeach
                    </div>
                    @if ($errors->has('types'))
                        <div class="alert alert-danger">
                            Укажите тип
                        </div>
                    @endif
                </dd>
            </div>

            <div class="row align-items-center mb-4">
                <dt class="col-sm-3">
                    Название
                </dt>
                <dd class="col-sm-9">
                    <input type="text" class="form-control" name="title">
                    @if ($errors->has('title'))
                        <div class="alert alert-danger">
                            Укажите название
                        </div>
                    @endif
                </dd>
            </div>

            @if($settings->theme !== 'med' && $settings->theme !== 'muzei' && $settings->theme !== 'khram')
            <div class="row align-items-center mb-4 type type-1 type-2 type-3 type-4 type-5 type-6 type-7 type-8 type-9">
                <dt class="col-sm-3">
                    Значок
                </dt>
                <dd class="col-sm-9">
                    <div class="row" style="height:250px; overflow-y:scroll;">
                        @foreach($icons as $icon)
                        <div class="col-2 icon-radio">
                            <div class="radio">
                                <input name="icons" id="{{ $icon->id }}" type="radio" value="{{ $icon->id }}">
                                <label for="{{ $icon->id }}">
                                    <img src="{{ $icon->icon }}" style="width:100%">
                                </label>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </dd>
            </div>
            @endif

            <div class="row align-items-center mb-4 type type-1 type-2 type-3">
                <dt class="col-sm-3">
                    Текст
                </dt>
                <dd class="col-sm-9">
                    <textarea rows="7" type="text" class="form-control" id="text" name="text"></textarea>
                </dd>
            </div>

            <div class="row align-items-center mb-4 type type-2">
                <dt class="col-sm-3">
                    Текст 2
                </dt>
                <dd class="col-sm-9">
                    <textarea rows="7" type="text" class="form-control" id="text2" name="text2"></textarea>
                </dd>
            </div>

            <div class="row align-items-center mb-4 type type-2">
                <dt class="col-sm-3">
                    Текст 3
                </dt>
                <dd class="col-sm-9">
                    <textarea rows="7" type="text" class="form-control" id="text3" name="text3"></textarea>
                </dd>
            </div>

            <div class="row align-items-center mb-4 type type-2">
                <dt class="col-sm-3">
                    Текст 4
                </dt>
                <dd class="col-sm-9">
                    <textarea rows="7" type="text" class="form-control" id="text4" name="text4"></textarea>
                </dd>
            </div>

            <div class="row align-items-center mb-4 type type-2">
                <dt class="col-sm-3">
                    Текст 5
                </dt>
                <dd class="col-sm-9">
                    <textarea rows="7" type="text" class="form-control" id="text5" name="text5"></textarea>
                </dd>
            </div>

            <div class="row align-items-center mb-4 type type-2">
                <dt class="col-sm-3">
                    Текст 6
                </dt>
                <dd class="col-sm-9">
                    <textarea rows="7" type="text" class="form-control" id="text6" name="text6"></textarea>
                </dd>
            </div>

            <div class="row align-items-center mb-4 type type-2">
                <dt class="col-sm-3">
                    Текст 7
                </dt>
                <dd class="col-sm-9">
                    <textarea rows="7" type="text" class="form-control" id="text7" name="text7"></textarea>
                </dd>
            </div>

            <div class="row align-items-center mb-4 type type-2">
                <dt class="col-sm-3">
                    Текст 8
                </dt>
                <dd class="col-sm-9">
                    <textarea rows="7" type="text" class="form-control" id="text8" name="text8"></textarea>
                </dd>
            </div>

            <div class="row align-items-center mb-4 type type-2">
                <dt class="col-sm-3">
                    Текст 9
                </dt>
                <dd class="col-sm-9">
                    <textarea rows="7" type="text" class="form-control" id="text9" name="text9"></textarea>
                </dd>
            </div>

            <div class="row align-items-center mb-4 type type-2">
                <dt class="col-sm-3">
                    Текст 10
                </dt>
                <dd class="col-sm-9">
                    <textarea rows="7" type="text" class="form-control" id="text10" name="text10"></textarea>
                </dd>
            </div>

            <div class="row align-items-center mb-4 type type-1 type-2 type-3 type-4 type-5 type-6 type-7 type-9 type-10">
                <dt class="col-sm-3">
                    Картинка
                </dt>
                <dd class="col-sm-9">
                    <input class="image" type="file" name="image" x-ref="image">
                    <div class="form-check">
                        <input type="hidden" name="image_as_icon" value="0">
                        <input type="checkbox" name="image_as_icon" id="image_as_icon" value="1">
                        <label for="image_as_icon">Задать как значок</label>
                    </div>
                </dd>
            </div>

            <div class="row align-items-center mb-4 type type-3 type-4 type-8">
                <dt class="col-sm-3">
                    Галерея
                </dt>
                <dd class="col-sm-9">
                    <input class="gallery" type="file" name="gallery[]" multiple>
                </dd>
            </div>

            <div class="row align-items-center mb-4 type type-7">
                <dt class="col-sm-3">
                    PDF
                </dt>
                <dd class="col-sm-9">
                    <input class="pdf" type="file" name="pdf" x-ref="pdf">
                </dd>
            </div>

            <div class="row align-items-center mb-4 type type-9">
                <dt class="col-sm-3">
                    Excel-файл
                </dt>
                <dd class="col-sm-9">
                    <input class="excel" type="file" name="excel" x-ref="excel">
                </dd>
            </div>

            <div class="row align-items-center mb-4 type type-10">
                <dt class="col-sm-3">
                    iFrame
                </dt>
                <dd class="col-sm-9">
                    <input type="text" name="iframe" class="form-control" x-ref="iframe">
                </dd>
            </div>

            <div class="row align-items-center mb-2 type type-5">
                <dt class="col-sm-3">
                    Видео
                </dt>
                <dd class="col-sm-9">
                    <input class="video" type="file" name="video" x-ref="video">
                </dd>
            </div>

            <div class="row align-items-center mb-4">    
                <dt class="col-sm-3">
                    Родительская страница
                </dt>
                <dd class="col-sm-9">
                    <select name="parent_id" id="parent_id" class="form-control">
                        <option disabled selected value> -- Выберите -- </option>
                        @foreach($parentlist as $parentlistitem)
                            @foreach($parentlistitem->types as $partype)
                                @if($partype->pivot->type_id == '6')
                                    <option value="{{$parentlistitem->id}}">{{$parentlistitem->title}}</option>
                                @endif
                            @endforeach
                        @endforeach
                    </select>
                </dd>
            </div>

            <button type="submit" class="btn btn-lg btn-success">Сохранить</button>

        </form>
    </div>

    <script>
        FilePond.registerPlugin(FilePondPluginImagePreview);
        FilePond.registerPlugin(FilePondPluginFileValidateType);

        $('.image').filepond({
            allowMultiple: false,
            allowReorder: false,
            acceptedFileTypes: ['image/jpeg'],
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
                    request.open('POST', '/pages/file/upload');
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
        });
        $('.video').filepond({
            allowMultiple: false,
            allowReorder: false,
            acceptedFileTypes: ['video/mp4'],
            imagePreviewHeight: 140,
            labelIdle: 'Нажмите для загрузки файлов',
            labelFileProcessing: 'Загрузка',
            labelFileProcessingComplete: 'Загружено',
            labelTapToCancel: '',
            labelTapToUndo: '',

            server: {
                remove: (filename, load) => {
                    load('1');
                    return  ajax_delete('deletevideo');

                },
                process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                    const formData = new FormData();
                    formData.append(fieldName, file, file.name);
                    const request = new XMLHttpRequest();
                    request.open('POST', '/pages/file/upload');
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
        });
        $('.pdf').filepond({
            allowMultiple: false,
            allowReorder: false,
            acceptedFileTypes: ['application/pdf'],
            imagePreviewHeight: 140,
            labelIdle: 'Нажмите для загрузки файлов',
            labelFileProcessing: 'Загрузка',
            labelFileProcessingComplete: 'Загружено',
            labelTapToCancel: '',
            labelTapToUndo: '',

            server: {
                remove: (filename, load) => {
                    load('1');
                    return  ajax_delete('deletepdf');

                },
                process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                    const formData = new FormData();
                    formData.append(fieldName, file, file.name);
                    const request = new XMLHttpRequest();
                    request.open('POST', '/pages/file/upload');
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
        });
        $('.excel').filepond({
            allowMultiple: false,
            allowReorder: false,
            acceptedFileTypes: ['application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'],
            imagePreviewHeight: 140,
            labelIdle: 'Нажмите для загрузки файлов',
            labelFileProcessing: 'Загрузка',
            labelFileProcessingComplete: 'Загружено',
            labelTapToCancel: '',
            labelTapToUndo: '',

            server: {
                remove: (filename, load) => {
                    load('1');
                    return  ajax_delete('deleteexcel');

                },
                process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                    const formData = new FormData();
                    formData.append(fieldName, file, file.name);
                    const request = new XMLHttpRequest();
                    request.open('POST', '/pages/file/upload');
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
        });
        $('.gallery').filepond({
            allowMultiple: true,
            allowReorder: true,
            acceptedFileTypes: ['image/jpeg'],
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
                    request.open('POST', '/pages/file/upload');
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
        });

        function ajax_delete(methos){
            $.ajax({
                url:'/pages/file/'+methos,
                method:'POST'
            });
        }
    </script>

<script>
        $('#typez').change(function () {
        var select=$(this).find(':checked').val();        
        $(".type").hide();
        $('.' + 'type-' + select).show();

        }).change();
    </script>



    <script>
        jQuery(document).ready(function($) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('textarea[id="text"]').summernote({
                height: 300,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['height', ['height']],
                    ['insert', ['picture']],
                    ['view', ['fullscreen', 'codeview']],
                ],
                callbacks: {
                    onImageUpload: function(images) {
                        for (var i = 0; i < images.length; i++) {
                            uploadImage(images[i], this);
                        }
                    },
                }
            });

            $('textarea[id="text2"]').summernote({
                height: 300,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['height', ['height']],
                    ['insert', ['picture']],
                    ['view', ['fullscreen', 'codeview']],
                ],
                callbacks: {
                    onImageUpload: function(images) {
                        for (var i = 0; i < images.length; i++) {
                            uploadImage(images[i], this);
                        }
                    },
                }
            });

            $('textarea[id="text3"]').summernote({
                height: 300,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['height', ['height']],
                    ['insert', ['picture']],
                    ['view', ['fullscreen', 'codeview']],
                ],
                callbacks: {
                    onImageUpload: function(images) {
                        for (var i = 0; i < images.length; i++) {
                            uploadImage(images[i], this);
                        }
                    },
                }
            });

            $('textarea[id="text4"]').summernote({
                height: 300,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['height', ['height']],
                    ['insert', ['picture']],
                    ['view', ['fullscreen', 'codeview']],
                ],
                callbacks: {
                    onImageUpload: function(images) {
                        for (var i = 0; i < images.length; i++) {
                            uploadImage(images[i], this);
                        }
                    },
                }
            });

            $('textarea[id="text5"]').summernote({
                height: 300,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['height', ['height']],
                    ['insert', ['picture']],
                    ['view', ['fullscreen', 'codeview']],
                ],
                callbacks: {
                    onImageUpload: function(images) {
                        for (var i = 0; i < images.length; i++) {
                            uploadImage(images[i], this);
                        }
                    },
                }
            });

            $('textarea[id="text6"]').summernote({
                height: 300,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['height', ['height']],
                    ['insert', ['picture']],
                    ['view', ['fullscreen', 'codeview']],
                ],
                callbacks: {
                    onImageUpload: function(images) {
                        for (var i = 0; i < images.length; i++) {
                            uploadImage(images[i], this);
                        }
                    },
                }
            });

            $('textarea[id="text7"]').summernote({
                height: 300,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['height', ['height']],
                    ['insert', ['picture']],
                    ['view', ['fullscreen', 'codeview']],
                ],
                callbacks: {
                    onImageUpload: function(images) {
                        for (var i = 0; i < images.length; i++) {
                            uploadImage(images[i], this);
                        }
                    },
                }
            });

            $('textarea[id="text8"]').summernote({
                height: 300,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['height', ['height']],
                    ['insert', ['picture']],
                    ['view', ['fullscreen', 'codeview']],
                ],
                callbacks: {
                    onImageUpload: function(images) {
                        for (var i = 0; i < images.length; i++) {
                            uploadImage(images[i], this);
                        }
                    },
                }
            });

            $('textarea[id="text9"]').summernote({
                height: 300,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['height', ['height']],
                    ['insert', ['picture']],
                    ['view', ['fullscreen', 'codeview']],
                ],
                callbacks: {
                    onImageUpload: function(images) {
                        for (var i = 0; i < images.length; i++) {
                            uploadImage(images[i], this);
                        }
                    },
                }
            });

            $('textarea[id="text10"]').summernote({
                height: 300,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['height', ['height']],
                    ['insert', ['picture']],
                    ['view', ['fullscreen', 'codeview']],
                ],
                callbacks: {
                    onImageUpload: function(images) {
                        for (var i = 0; i < images.length; i++) {
                            uploadImage(images[i], this);
                        }
                    },
                }
            });

            function uploadImage(image, textarea) {
                var data = new FormData();
                data.append('image', image);
                $.ajax({
                    data: data,
                    type: 'POST',
                    url: '/pg/upload/image',
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(url) {
                        $(textarea).summernote('insertImage', url, function ($img) {
                            $img.css('max-width', '100%');
                        });
                    }
                });
            }
        });        
    </script>

@endsection