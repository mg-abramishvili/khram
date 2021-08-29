<div class="veteran-list-keyboard" style="margin-top: 5vh;">
    <div class="keyboard">
        <div style="text-align: center;">
            <div class="k-eng">
            <button value="1" id="v28">1</button>
            <button value="2" id="v29">2</button>
            <button value="3" id="v30">3</button>
            <button value="4" id="v31">4</button>
            <button value="5" id="v32">5</button>
            <button value="6" id="v33">6</button>
            <button value="7" id="v34">7</button>
            <button value="8" id="v35">8</button>
            <button value="9" id="v36">9</button>
            <button value="0" id="v37">0</button>
            <br>
            <button value="Q" id="v18">Q</button>
            <button value="W" id="v24">W</button>
            <button value="E" id="v5">E</button>
            <button value="R" id="v19">R</button>
            <button value="T" id="v21">T</button>
            <button value="Y" id="v26">Y</button>
            <button value="U" id="v22">U</button>
            <button value="I" id="v9">I</button>
            <button value="O" id="v16">O</button>
            <button value="P" id="v17">P</button>
            <br>
            <button value="A" id="v1">A</button>
            <button value="S" id="v20">S</button>
            <button value="D" id="v4">D</button>
            <button value="F" id="v6">F</button>
            <button value="G" id="v7">G</button>
            <button value="H" id="v8">H</button>
            <button value="J" id="v10">J</button>
            <button value="K" id="v11">K</button>
            <button value="L" id="v13">L</button>
            <br>
            <button value="Z" id="v27">Z</button>
            <button value="X" id="v25">X</button>
            <button value="C" id="v3">C</button>
            <button value="V" id="v23">V</button>
            <button value="B" id="v2">B</button>
            <button value="N" id="v15">N</button>
            <button value="M" id="v14">M</button>
            <button value="-" id="v39">-</button>
            <br>
        </div>
            <button value="" id="backspace">&#x2190</button>
        </div>
    </div>
</div>

@section('scripts')
<script> // КЛАВИАТУРА
    $(document).ready(function(){
    $('#v1,#v2,#v3,#v4,#v5,#v6,#v7,#v8,#v9,#v10,#v11,#v12,#v13,#v14,#v15,#v16,#v17,#v18,#v19,#v20,#v21,#v22,#v23,#v24,#v25,#v26,#v27,#v28,#v29,#v30,#v31,#v32,#v33,#v34,#v35,#v36,#v37,#v38,#v39,#v40,#v41,#rv01,#rv02,#rv03,#rv04,#rv05,#rv06,#rv07,#rv08,#rv09,#rv10,#rv11,#rv12,#rv13,#rv14,#rv15,#rv16,#rv17,#rv18,#rv19,#rv20,#rv21,#rv22,#rv23,#rv24,#rv25,#rv26,#rv27,#rv28,#rv29,#rv30,#rv31,#rv32,#rv33,#rv34,#rv35,#rv36,#rv37,#rv38,#rv39,#rv40,#rv41').click(function(){
         var v = $(this).val();
        var total = $('#key-input').val($('#key-input').val() + v);
     });
   $('#clear').click(function(){
       $('#key-input').val('');
     });
   $('#backspace').click(function(){
       $('#key-input').val($('#key-input').val().substring(0, $('#key-input').val().length - 1));
     });
 });
</script>