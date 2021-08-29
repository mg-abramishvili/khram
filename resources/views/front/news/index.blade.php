@extends('layouts.front')
@section('content')

<div class="wrapper" style="">

    @if($settings->theme == 'default')
        @if($settings->orientation == 'horizontal')
            @include('front.news.default.index-horizontal')
        @elseif($settings->orientation == 'vertical')
            @include('front.news.default.index-vertical')
        @endif

    @elseif($settings->theme == 'med')
        @if($settings->orientation == 'horizontal')
            @include('front.news.med.index-horizontal')
        @elseif($settings->orientation == 'vertical')
            @include('front.news.med.index-vertical')
        @endif

    @elseif($settings->theme == 'muzei')
        @if($settings->orientation == 'horizontal')
            @include('front.news.muzei.index-horizontal')
        @elseif($settings->orientation == 'vertical')
            @include('front.news.muzei.index-vertical')
        @endif

    @elseif($settings->theme == 'shkola')
        @if($settings->orientation == 'horizontal')
            @include('front.news.shkola.index-horizontal')
        @elseif($settings->orientation == 'vertical')
            @include('front.news.shkola.index-vertical')
        @elseif($settings->orientation == 'square')
            @include('front.news.shkola.index-square')
        @endif

    @elseif($settings->theme == 'nast')
        @include('front.news.nast.index')

    @elseif($settings->theme == 'detsad')
        @include('front.news.detsad.index')

    @elseif($settings->theme == 'kadet')
        @include('front.news.kadet.index')

    @endif

</div>

@endsection