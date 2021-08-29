@extends('layouts.app')
@section('content')

    <div class="px-4 py-4">
        <div class="row align-items-center mb-4">
            <div class="col-6">
                <h1>Видеогалереи</h1>
            </div>
            <div class="col-6" style="text-align: right;">
                <a href="/videoalbums/create" class="btn btn-primary">Добавить</a>
            </div>
        </div>

        <div class="page">
        
            <table class="table table-bordered table-hover">
                @forelse($videoalbums as $videoalbum)
                <tr>
                    <td style="width: 100px; font-size: 13px;">
                        {{$videoalbum->created_at->format('d.m.Y')}}
                    </td>
                    <td style="text-align: left; padding-left: 20px; padding-right: 20px;">
                        {{$videoalbum->title}}
                    </td>
                    <td style="width: 25%;">
                        <a href="/videoalbums/{{$videoalbum->id}}/edit" class="btn btn-sm btn-warning">Правка</a>
                        <a href="/videoalbums/delete/{{$videoalbum->id}}" class="btn btn-sm btn-danger">Удалить</a>
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