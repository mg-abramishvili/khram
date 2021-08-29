@extends('layouts.front')
@section('content')

<div class="wrapper" style="">

        @if($settings->theme == 'default')
            @if($settings->orientation == 'horizontal')
                @include('front.videoalbums.default.show-horizontal')
            @elseif($settings->orientation == 'vertical')
                @include('front.videoalbums.default.show-vertical')
            @endif

        @elseif($settings->theme == 'med')
            @if($settings->orientation == 'horizontal')
                @include('front.videoalbums.med.show-horizontal')
            @elseif($settings->orientation == 'vertical')
                @include('front.videoalbums.med.show-vertical')
            @endif

        @elseif($settings->theme == 'shkola')
            @if($settings->orientation == 'horizontal')
                @include('front.videoalbums.shkola.show-horizontal')
            @elseif($settings->orientation == 'vertical')
                @include('front.videoalbums.shkola.show-vertical')
            @elseif($settings->orientation == 'square')
                @include('front.videoalbums.shkola.show-square')
            @endif

        @elseif($settings->theme == 'nast')
            @include('front.videoalbums.show-nast')
        @elseif($settings->theme == 'kadet')
            @include('front.videoalbums.show-kadet')
        @elseif($page->page_type == 'detsad')
            @include('front.videoalbums.show-detsad')

        @endif

</div>

@endsection