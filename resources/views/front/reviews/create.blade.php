@extends('layouts.front')
@section('content')

<div class="wrapper" style="">

    <!-- Тема Медцентр -->
    @if($settings->theme == 'med')
        @if($settings->orientation == 'horizontal')
            @include('front.reviews.med.create-horizontal')
        @elseif($settings->orientation == 'vertical')
            @include('front.reviews.med.create-vertical')
        @endif

    <!-- Тема Школа -->
    @elseif($settings->theme == 'shkola')
        @if($settings->orientation == 'horizontal')
            @include('front.reviews.shkola.create-horizontal')
        @elseif($settings->orientation == 'vertical')
            @include('front.reviews.shkola.create-vertical')
        @elseif($settings->orientation == 'square')
            @include('front.reviews.shkola.create-square')
        @endif

    @endif

</div>
@endsection
@section('scripts')
<script> // КЛАВИАТУРА
    $(document).ready(function(){
    $('#v1,#v2,#v3,#v4,#v5,#v6,#v7,#v8,#v9,#v10,#v11,#v12,#v13,#v14,#v15,#v16,#v17,#v18,#v19,#v20,#v21,#v22,#v23,#v24,#v25,#v26,#v27,#v28,#v29,#v30,#v31,#v32,#v33,#v34,#v35,#v36,#v37,#v38,#v39,#v40,#v41,#rv01,#rv02,#rv03,#rv04,#rv05,#rv06,#rv07,#rv08,#rv09,#rv10,#rv11,#rv12,#rv13,#rv14,#rv15,#rv16,#rv17,#rv18,#rv19,#rv20,#rv21,#rv22,#rv23,#rv24,#rv25,#rv26,#rv27,#rv28,#rv29,#rv30,#rv31,#rv32,#rv33,#rv34,#rv35,#rv36,#rv37,#rv38,#rv39,#rv40,#rv41').click(function(){
         var v = $(this).val();
        var total = $('#myInput').val($('#myInput').val() + v);
     });
   $('#clear').click(function(){
       $('#myInput').val('');
     });
   $('#backspace').click(function(){
       $('#myInput').val($('#myInput').val().substring(0, $('#myInput').val().length - 1));
     });
 });
</script>

<script> // ПЕРЕКЛЮЧЕНИЕ КЛАВИАТУРЫ
$('.k-eng').hide();
$('.globebutton').on('click',
function()
{
    $('.k-rus, .k-eng').toggle()
}
);
</script>
@endsection