@extends('layouts.front')
@section('content')

<div class="wrapper" style="">

        @if($settings->theme == 'default')
            @if($settings->orientation == 'horizontal')
                @include('front.videoalbums.default.index-horizontal')
            @elseif($settings->orientation == 'vertical')
                @include('front.videoalbums.default.index-vertical')
            @endif

        @elseif($settings->theme == 'med')
            @if($settings->orientation == 'horizontal')
                @include('front.videoalbums.med.index-horizontal')
            @elseif($settings->orientation == 'vertical')
                @include('front.videoalbums.med.index-vertical')
            @endif

        @elseif($settings->theme == 'shkola')
            @if($settings->orientation == 'horizontal')
                @include('front.videoalbums.shkola.index-horizontal')
            @elseif($settings->orientation == 'vertical')
                @include('front.videoalbums.shkola.index-vertical')
            @elseif($settings->orientation == 'square')
                @include('front.videoalbums.shkola.index-square')
            @endif

        @elseif($settings->theme == 'nast')
            @include('front.videoalbums.index-nast')
        @elseif($settings->theme == 'kadet')
            @include('front.videoalbums.index-kadet')
        @elseif($page->page_type == 'detsad')
            @include('front.videoalbums.index-detsad')

        @endif

</div>

@endsection