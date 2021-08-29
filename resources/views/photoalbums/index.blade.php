@extends('layouts.app')
@section('content')

    <div class="px-4 py-4">
        <div class="row align-items-center mb-4">
            <div class="col-6">
                <h1>Фотогалереи</h1>
            </div>
            <div class="col-6" style="text-align: right;">
                <a href="/photoalbums/create" class="btn btn-primary">Добавить</a>
            </div>
        </div>

        <div class="page">
        
            <table class="table table-bordered table-hover">
                @forelse($photoalbums as $photoalbum)
                <tr>
                    <td style="width: 100px; font-size: 13px;">
                        {{$photoalbum->created_at->format('d.m.Y')}}
                    </td>
                    <td style="text-align: left; padding-left: 20px; padding-right: 20px;">
                        {{$photoalbum->title}}
                    </td>
                    <!--<td>
                        @if(is_array($photoalbum->gallery))
                            @foreach($photoalbum->gallery as $k=>$v)
                                <img src="{{$v}}" style="height: 80px">
                            @endforeach
                        @endif
                    </td>-->
                    <td style="width: 25%;">
                        <a href="/photoalbums/{{$photoalbum->id}}/edit" class="btn btn-sm btn-warning">Правка</a>
                        <a href="/photoalbums/delete/{{$photoalbum->id}}" class="btn btn-sm btn-danger">Удалить</a>
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