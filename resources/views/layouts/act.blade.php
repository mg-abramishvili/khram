<script>
    $('#form').hide();
    $('#activating').hide();
    $('#key-input').val('');

    $('#activate-button').click(function () {
        $("#activate-button").hide();
        setTimeout(function() {
            $("#activate-button").show();
        }, 3000);
        var vid = "";
        var count = "";
        var keycheck = $('#key-input').val();
        $.getJSON('http://touchlab.su/api/key/view/' + keycheck, function(data) {
            
            if (data.key == keycheck) {
                if (data.status == 'waiting') {
                    
                    datakey = data.key;
                    program = data.programs[0].title;

                    dreambox_serial_key = data.key;
                    dreambox_theme = data.parameters[0].dreambox_theme;
                    dreambox_orientation = data.parameters[0].dreambox_orientation;
                    dreambox_title = data.parameters[0].dreambox_title;
                    dreambox_module_news = data.parameters[0].dreambox_module_news;
                    dreambox_module_photoalbums = data.parameters[0].dreambox_module_photoalbums;
                    dreambox_module_videoalbums = data.parameters[0].dreambox_module_videoalbums;
                    dreambox_module_routes = data.parameters[0].dreambox_module_routes;
                    dreambox_module_reviews = data.parameters[0].dreambox_module_reviews;

                    count = 'y';

                }
                else {
                    count = 'a';
                }
            }

            if (count == 'y') {
                //alert('Ключ принят');
                $('#phase_one').hide();
                $('#activating').show();
                //$('#form').show();

                $.ajax({
                    type:"POST",
                    url:"http://touchlab.su/api/key/activate/"+ datakey +"",
                    data:"status=active",
                    dataType:"json",
                    success: function(data) {
                        //alert('Активация успешна!');
                        //window.location = "http://localhost";
                        $('#serial_key').val(dreambox_serial_key);
                        $('#theme').val(dreambox_theme);
                        $('#orientation').val(dreambox_orientation);
                        $('#title').val(dreambox_title);
                        $('#module_news').val(dreambox_module_news);
                        $('#module_photoalbums').val(dreambox_module_photoalbums);
                        $('#module_videoalbums').val(dreambox_module_videoalbums);
                        $('#module_routes').val(dreambox_module_routes);
                        $('#module_reviews').val(dreambox_module_reviews);
                        $.get('nta-y.php', function(data) {
                        });
                    },
                    error: function(data) {
                        console.log(data);
                    },
                });

                setTimeout(
                function() {
                    $('#form').submit();
                }, 3500);

            } else if (count == 'a') {
                alert('Этот ключ уже был активирован');
            }

        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            alert('Неверный ключ!');
        });
    });
</script>