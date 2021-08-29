@extends('layouts.front')
@section('content')

<div class="wrapper" style="">

    <!-- Тема Медцентр -->
    @if($settings->theme == 'med')
        @if($settings->orientation == 'horizontal')
            @include('front.reviews.med.success-horizontal')
        @elseif($settings->orientation == 'vertical')
            @include('front.reviews.med.success-vertical')
        @endif

    <!-- Тема Школа -->
    @elseif($settings->theme == 'shkola')
        @if($settings->orientation == 'horizontal')
            @include('front.reviews.shkola.success-horizontal')
        @elseif($settings->orientation == 'vertical')
            @include('front.reviews.shkola.success-vertical')
        @elseif($settings->orientation == 'square')
            @include('front.reviews.shkola.success-square')
        @endif

    @endif

</div>

<script>
    setTimeout("location.href = '/';",3000);
</script>

@endsection

