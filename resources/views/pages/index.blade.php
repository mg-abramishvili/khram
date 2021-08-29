@extends('layouts.app')
@section('content')

    <style>
        .tree {
            padding: 0;
            margin: 0;
            list-style-type: none;
            margin-left: 30px;
        }

        .tree .btn-sm {
            font-size: 0.600rem;
            padding: 0.15rem 0.4rem;
        }

        .tree ul {
            margin-left: 20px;
        }

        .tree li {
            list-style-type: none;
            margin:10px;
            position: relative;
        }

        .tree li::before {
            content: "";
            position: absolute;
            top:-7px;
            left:-20px;
            border-left: 1px solid #ccc;
            border-bottom:1px solid #ccc;
            border-radius:0 0 0 0px;
            width:20px;
            height:15px;
        }

        .tree li::after {
            position:absolute;
            content:"";
            top:8px;
            left:-20px;
            border-left: 1px solid #ccc;
            border-top:1px solid #ccc;
            border-radius:0px 0 0 0;
            width:20px;
            height:100%;
        }

        .tree li:last-child::after  {
            display:none;
        }

        .tree li:last-child:before{
            border-radius: 0 0 0 5px;
        }

        ul.tree>li:first-child::before {
            display:none;
        }

        ul.tree>li:first-child::after {
            border-radius:5px 0 0 0;
        }

        .tree li span {
            border: 1px #ccc solid;
            border-radius: 5px;
            padding: 5px 10px;
            display: inline-block;
        }

        .tree li {
            font-weight: bold;
        }

        .tree ul li span {
            font-weight: normal;
        }
    </style>

    <div class="px-4 py-4">
        <div class="row align-items-center mb-4">
            <div class="col-6">
                <h1>Страницы</h1>
            </div>
            <div class="col-6" style="text-align: right;">
                <a href="/pages/create" class="btn btn-primary">Создать страницу</a>
            </div>
        </div>

        <div class="page">
            <ul class="tree">
                @forelse($pages as $page)
                    @if(isset($page->parent_id))
                    
                    @else
                        <li>
                            <span>
                            {{$page->title}}
                            @if(!$page->children->count())
                                <a href="/pages/{{$page->id}}/edit" class="btn btn-sm btn-outline-primary">Правка</a>
                                <a href="/pages/delete/{{$page->id}}" class="btn btn-sm btn-outline-danger">Удалить</a>
                            @else
                                <a href="/pages/{{$page->id}}/edit" class="btn btn-sm btn-outline-primary">Правка</a>
                            @endif
                            </span>
                            @if(count($page->children))
                                @include('pages.sub ', ['children' => $page->children])
                            @endif
                        </li>
                    @endif
                @empty
                <li>
                    Пусто &#9785;
                </li>
                @endforelse
            </ul>

        </div>
    </div>
@endsection