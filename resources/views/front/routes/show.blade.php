@extends('layouts.front')
@section('content')

<div class="wrapper" style="">
    @if($settings->theme == 'default')
        @if($settings->orientation == 'horizontal')
            @include('front.routes.default.show-horizontal')
        @elseif($settings->orientation == 'vertical')
            @include('front.routes.default.show-vertical')
        @endif

    @elseif($settings->theme == 'med')
        @if($settings->orientation == 'horizontal')
            @include('front.routes.med.show-horizontal')
        @elseif($settings->orientation == 'vertical')
            @include('front.routes.med.show-vertical')
        @endif

    @elseif($settings->theme == 'shkola')
        @if($settings->orientation == 'horizontal')
            @include('front.routes.shkola.show-horizontal')
        @elseif($settings->orientation == 'vertical')
            @include('front.routes.shkola.show-vertical')
        @endif

    @elseif($settings->theme == 'muzei')
        @if($settings->orientation == 'horizontal')
            @include('front.routes.muzei.show-horizontal')
        @elseif($settings->orientation == 'vertical')
            @include('front.routes.muzei.show-vertical')
        @endif

    @elseif($settings->theme == 'nast')
        @include('front.routes.nast.show')

    @elseif($settings->theme == 'detsad')
        @include('front.routes.detsad.show')

    @elseif($settings->theme == 'kadet')
        @include('front.routes.kadet.show')

    @endif
</div>

@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            $("#map").css('opacity', '0');
            setTimeout(function () {
                panzoom.reset({ startScale: 2, })
            }, 350);
            setTimeout(function () {
                panzoom.reset({ startScale: 1, startX: 0, startY: 0, })
            }, 700);
            setTimeout(function () {
                $("#map").css('opacity', '1');
            }, 1000)
        });
    </script>

        <script>
            $('.catlist-list').flickity({
            cellAlign: 'left',
            contain: true,
            prevNextButtons: false,
            pageDots: false,
            });
        </script>

        <script>
            var $carousel = $('.map-image{{ $route->id }}').flickity();

$('#prev-route-slide').on( 'click', function() {
    $("#map").css('opacity', '0');
    panzoom.reset({ startScale: 1 })
    setTimeout(function () {
        panzoom.reset({ startScale: 1.1 })
    }, 250);
    setTimeout(function () {
        panzoom.reset({ startScale: 1 });
        $("#map").css('opacity', '1');
    }, 500);
    $carousel.flickity('previous');
});
$('#next-route-slide').on( 'click', function() {
    $("#map").css('opacity', '0');
    panzoom.reset({ startScale: 1 })
    setTimeout(function () {
        panzoom.reset({ startScale: 1.1 })
    }, 250);
    setTimeout(function () {
        panzoom.reset({ startScale: 1 });
        $("#map").css('opacity', '1');
    }, 500);
    $carousel.flickity('next');
});
        </script>

        <script>
            $carousel.on( 'select.flickity', function( event, index ) {
                if (index == 0) {
                    $('#prev-route-slide').hide();
                    $('#next-route-slide').show();
                }
                if (index == 1) {
                    $('#prev-route-slide').show();
                    $('#next-route-slide').hide();
                }
            });
        </script>
    @endsection