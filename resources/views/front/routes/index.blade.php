@extends('layouts.front')
@section('content')

<div class="wrapper" style="">

    @if($settings->theme == 'default')
        @if($settings->orientation == 'horizontal')
            @include('front.routes.default.index-horizontal')
        @elseif($settings->orientation == 'vertical')
            @include('front.routes.default.index-vertical')
        @endif

    @elseif($settings->theme == 'med')
        @if($settings->orientation == 'horizontal')
            @include('front.routes.med.index-horizontal')
        @elseif($settings->orientation == 'vertical')
            @include('front.routes.med.index-vertical')
        @endif

    @elseif($settings->theme == 'muzei')
        @if($settings->orientation == 'horizontal')
            @include('front.routes.muzei.index-horizontal')
        @elseif($settings->orientation == 'vertical')
            @include('front.routes.muzei.index-vertical')
        @endif

    @elseif($settings->theme == 'shkola')
        @if($settings->orientation == 'horizontal')
            @include('front.routes.shkola.index-horizontal')
        @elseif($settings->orientation == 'vertical')
            @include('front.routes.shkola.index-vertical')
        @elseif($settings->orientation == 'square')
            @include('front.routes.shkola.index-square')
        @endif

    @elseif($settings->theme == 'nast')
        @include('front.routes.nast.index')

    @elseif($settings->theme == 'detsad')
        @include('front.routes.detsad.index')

    @elseif($settings->theme == 'kadet')
        @include('front.routes.kadet.index')

    @endif

 </div>

@endsection
@section('scripts')
<script> // КЛАВИАТУРА
    $(document).ready(function(){
    $('#v1,#v2,#v3,#v4,#v5,#v6,#v7,#v8,#v9,#v10,#v11,#v12,#v13,#v14,#v15,#v16,#v17,#v18,#v19,#v20,#v21,#v22,#v23,#v24,#v25,#v26,#v27,#v28,#v29,#v30,#v31,#v32,#v33,#v34,#v35,#v36,#v37,#v38,#v39,#v40,#v41,#rv01,#rv02,#rv03,#rv04,#rv05,#rv06,#rv07,#rv08,#rv09,#rv10,#rv11,#rv12,#rv13,#rv14,#rv15,#rv16,#rv17,#rv18,#rv19,#rv20,#rv21,#rv22,#rv23,#rv24,#rv25,#rv26,#rv27,#rv28,#rv29,#rv30,#rv31,#rv32,#rv33,#rv34,#rv35,#rv36,#rv37,#rv38,#rv39,#rv40,#rv41').click(function(){
         var v = $(this).val();
        var total = $('#myInput').val($('#myInput').val() + v);

        e = $.Event('keyup');
e.keyCode= 13; // enter
$('#myInput').trigger(e);

     });
   $('#clear').click(function(){
       $('#myInput').val('');
       e = $.Event('keyup');
e.keyCode= 13; // enter
$('#myInput').trigger(e);
     });
   $('#backspace').click(function(){
       $('#myInput').val($('#myInput').val().substring(0, $('#myInput').val().length - 1));
       e = $.Event('keyup');
e.keyCode= 13; // enter
$('#myInput').trigger(e);
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

<script> // ВВОД В ИНПУТ АВТО

function myFunction() {
// Declare variables
var input, filter, ul, li, a, i, txtValue;
input = document.getElementById('myInput');
filter = input.value.toUpperCase();
ul = document.getElementById("myUL");
li = ul.getElementsByTagName('li');

// Loop through all list items, and hide those who don't match the search query
for (i = 0; i < li.length; i++) {
a = li[i].getElementsByTagName("a")[0];
txtValue = a.textContent || a.innerText;
if (txtValue.toUpperCase().indexOf(filter) > -1) {
  li[i].style.display = "";
} else {
  li[i].style.display = "none";
}
}
}
            
          </script>

    <script>
        setTimeout(function () {
            $(".prevnexrroutslide").removeClass('invisible');
            $('.prevnexrroutslide').hide();
            $(".med-route-sidebar").removeClass('invisible');
            $(".med-route-sidebar").addClass('visible');
            $(".wrapperm").removeClass('invisible');
            $(".wrapperm").addClass('visible');
            $(".map").css('opacity', '0');
            $(".map svg").css('opacity', '0');
            $(".map").first().css('opacity', '1');
            $(".title_zh").first().removeClass('invisible');
            $(".title_zh").first().addClass('visible');
        }, 100);
    </script>

@endsection