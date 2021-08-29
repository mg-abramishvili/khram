@extends('layouts.front')
@section('content')

<div class="wrapper" style="">

        @if($settings->theme == 'default')
            @include('front.pages.default.show')
        
        @elseif($settings->theme == 'nast')
            @include('front.pages.nast.show')
        
        @elseif($settings->theme == 'detsad')
            @include('front.pages.detsad.show')

        @elseif($settings->theme == 'med')
            @include('front.pages.med.show')

        @elseif($settings->theme == 'shkola')
            @include('front.pages.shkola.show')

        @elseif($settings->theme == 'muzei')
            @include('front.pages.muzei.show')

        @elseif($settings->theme == 'book')
            @include('front.pages.book.show')

        @endif

</div>
@endsection