@extends('layouts.app')
@section('content')

    <div class="px-4 py-4">
        <div class="row align-items-center mb-4">
            <div class="col-6">
                <h1>Баннеры</h1>
            </div>
            <div class="col-6" style="text-align: right;">
                <a href="/banners/create" class="btn btn-primary">Добавить</a>
            </div>
        </div>

        <div class="page">
        
            <table class="table table-bordered table-hover">
                @forelse($banners as $banner)
                <tr>
                    <td style="text-align: left; padding-left: 20px; padding-right: 20px;">
                        {{$banner->title}}
                    </td>
                    <td style="width: 25%;">
                        <a href="/banners/{{$banner->id}}/edit" class="btn btn-sm btn-warning">Правка</a>
                        <a href="/banners/delete/{{$banner->id}}" class="btn btn-sm btn-danger">Удалить</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td style="text-align: center;">
                        Пусто &#9785;
                    </td>
                </tr>
                @endforelse
            </table>
        </div>
    </div>
@endsection