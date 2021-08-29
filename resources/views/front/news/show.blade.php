@extends('layouts.front')
@section('content')

<div class="wrapper" style="">

    @if($settings->theme == 'default')
        @if($settings->orientation == 'horizontal')
            @include('front.news.default.show-horizontal')
        @elseif($settings->orientation == 'vertical')
            @include('front.news.default.show-vertical')
        @endif

    @elseif($settings->theme == 'med')
        @if($settings->orientation == 'horizontal')
            @include('front.news.med.show-horizontal')
        @elseif($settings->orientation == 'vertical')
            @include('front.news.med.show-vertical')
        @endif

    @elseif($settings->theme == 'muzei')
        @if($settings->orientation == 'horizontal')
            @include('front.news.muzei.show-horizontal')
        @elseif($settings->orientation == 'vertical')
            @include('front.news.muzei.show-vertical')
        @endif

    @elseif($settings->theme == 'shkola')
        @if($settings->orientation == 'horizontal')
            @include('front.news.shkola.show-horizontal')
        @elseif($settings->orientation == 'vertical')
            @include('front.news.shkola.show-vertical')
        @elseif($settings->orientation == 'square')
            @include('front.news.shkola.show-square')
        @endif

    @elseif($settings->theme == 'nast')
        @include('front.news.nast.show')

    @elseif($settings->theme == 'detsad')
        @include('front.news.detsad.show')

    @elseif($settings->theme == 'kadet')
        @include('front.news.kadet.show')

    @endif

</div>

@endsection