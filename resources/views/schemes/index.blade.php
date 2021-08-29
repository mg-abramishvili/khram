@extends('layouts.app')
@section('content')

    <style>
        .table tr:first-child .btn:nth-child(2) {
            display: none;
        }
    </style>

    <div class="px-4 py-4">
        <div class="row align-items-center mb-4">
            <div class="col-6">
                <h1>Планы помещений</h1>
            </div>
            <div class="col-6" style="text-align: right;">
                <a href="/schemes/create" class="btn btn-primary">Добавить</a>
            </div>
        </div>

        <div class="page">
        
            <table class="table table-bordered table-hover">
                @forelse($schemes as $scheme)
                <tr>
                    <td style="text-align: left; padding-left: 20px; padding-right: 20px;">
                        {{$scheme->title}}
                    </td>
                    <td style="width: 200px;">
                        <a href="/schemes/{{$scheme->id}}/edit" class="btn btn-sm btn-warning">Правка</a>
                        <a href="/schemes/delete/{{$scheme->id}}" class="btn btn-sm btn-danger">Удалить</a>
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