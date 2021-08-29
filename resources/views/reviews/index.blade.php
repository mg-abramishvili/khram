@extends('layouts.app')
@section('content')

    <div class="px-4 py-4">
        <div class="row align-items-center mb-4">
            <div class="col-6">
                <h1>Отзывы</h1>
            </div>
            <div class="col-6" style="text-align: right;">
                
            </div>
        </div>

        <div class="page">
        
            <table class="table table-bordered table-hover">
                @forelse($reviews as $review)
                <tr>
                    <td style="width: 100px; font-size: 13px;">
                        @if($review->created_at)
                        {{$review->created_at->format('d.m.Y')}}
                        @endif
                    </td>
                    <td style="text-align: left; padding-left: 20px; padding-right: 20px;">
                        @if($review->name)
                        <strong>{{ $review->name }}</strong><br>
                        @endif
                        {{$review->review}}
                    </td>
                    <td style="width: 25%;">
                        <a href="/reviews/delete/{{$review->id}}" class="btn btn-sm btn-danger">Удалить</a>
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