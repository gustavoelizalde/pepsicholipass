<body>
    <a href="#" style="color: #999 !important; position: absolute; font-size: 14px; text-decoration: none; margin-top: 680px; margin-left: 330px; font:normal 10px Tahoma, Geneva, sans-serif; color:#FFF; background:#000; padding:2px 4px; border-radius:3px;">Términos y Condiciones</a>
    <div id="container" class="form">

        <div class="wr">
            <form id="userdate" action="<?php echo Yii::app()->createUrl('site/save'); ?>">
                <input type="hidden" name="Registrados[facebookId]" id="idfb">
                <input type="hidden" name="Registrados[contenidos_id]" value="<?php echo intval($_GET['id']); ?>" id="idContenido">
                <div><input name="Registrados[nombre]" type="text" id="nombre"></div>
                <div><input name="Registrados[apellido]" type="text" id="apellido"></div>
                <div><input name="Registrados[email]" type="text" id="email"></div>
                <div><input name="Registrados[telefono]" type="text" id="tel"></div>
                <div>
                    <textarea name="Registrados[comentario]" id="paravos"></textarea>
                </div>
                <div><input name="Registrados[birthday]" type="text" id="birday"></div>
                <div class="check"><input name="terms" type="checkbox" id="terms"> <label for="terms">He leído y acepto los términos y condiciones</label></div>
                <div class="lastfield"> <input name="enviar" type="image" src="<?php echo Yii::app()->theme->baseUrl; ?>/img/btn_quiero.png" ></div>
            </form>
        </div>

    </div>

    <script>
        $(document).ready(function(e) {
            //
            FB.Canvas.scrollTo(0, 0);
            FB.Canvas.setSize({width: 810, height: 710});
            // 
            LogIn();
            loadates();
            
            $('#tel').mask('(999)999-9999');
        });
        //
        $('#userdate').submit(function() {

            if (validarEmail('input[name="Registrados[email]"]') == true && $('input[name=terms]').is(':checked') == true && $('textarea[name="Registrados[comentario]"]').val().length != 0 && $('textarea[name="Registrados[comentario]"]').val() != '¿Qué significa para ti Vivir Hoy?') {
                //aca grabar en la bd
                console.log('listo para grabar')
                //
                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: $(this).serialize()+"&share=ok",
                    success: function(data) {
                        console.log('datos guardados');
                        FB.ui(
                                {
                                    method: 'feed',
                                    name: '¡Quiero mi Choli Pass para el concierto de <?php echo CMSClass::getContenido(intval($_GET['id']))->getText('titulo', 1); ?>!',
                                    link: 'https://www.facebook.com/contacticatest/app_623431217672700',
                                    picture: 'https://fbapps.wearecontactica.net/pepsi/cholipass/themes/frontend/img/avatar.jpg',
                                    caption: 'Choli Pass',
                                    description: 'Estoy participando para ganarme el Choli Pass al concierto de <?php echo CMSClass::getContenido(intval($_GET['id']))->getText('titulo', 1); ?> para mí y un acompañante. ¡Participa tú también!'
                                },
                        function(response) {
//                            if (response && response.post_id) {
//                                alert('Post was published.');
//                            } else {
//                                alert('Post was not published.');
//                            }
                        }
                        );
                        //
                        $.fancybox('<?php echo Yii::app()->createUrl('site/winTicket', array('id' => intval($_GET['id']))); ?>', {
                            'overlayOpacity': '0.85',
                            'overlayColor': '#000',
                            'margin': 0,
                            'width': 460,
                            'height': 200,
                            'type': 'iframe',
                            'onClosed': function() {
                                window.location.replace("<?php echo Yii::app()->createUrl('site/home'); ?>");
                            }
                        }
                        );
                        //
                        FB.Canvas.scrollTo(0, 0);
                    }
                });
                //
            } else {
                if ($('input[name=terms]').is(':checked') == false) {
                    alert('Para continuar debes aceptar los Términos y Condiciones.');
                }
                if ($('textarea[name="Registrados[comentario]"]').val() == '¿Qué significa para ti Vivir Hoy?') {
                    alert('Necesitas completar el campo: ¿Qué significa para ti Vivir Hoy?');
                }
                if ($('textarea[name="Registrados[comentario]"]').val().length == 0) {
                    alert('Necesitas completar el campo: ¿Qué significa para ti Vivir Hoy?');
                    $('textarea[name="Registrados[comentario]"]').html('');
                    $('textarea[name="Registrados[comentario]"]').html('¿Qué significa para ti Vivir Hoy?');
                }
            }
            return false;
        });
        //
        function share() {
            FB.ui({
                method: 'apprequests',
                message: 'Llena tu CHOLI Pass!'
            }, apprequestsCallback);
            function apprequestsCallback(e) {
                if (e != null) {
                    $.ajax({
                        type: 'POST',
                        url: $("#userdate").attr('action'),
                        data: $("#userdate").serialize() + '&share=ok',
                        success: function(data) {
                            console.log('datos guardados');
                            //
                            $.fancybox('<?php echo Yii::app()->createUrl('site/winMorePoints'); ?>', {
                                'overlayOpacity': '0.85',
                                'overlayColor': '#000',
                                'margin': 0,
                                'width': 554,
                                'height': 380,
                                'type': 'iframe',
                                'onClosed': function() {
                                    window.location.replace("<?php echo Yii::app()->createUrl('site/home'); ?>");
                                }
                            }
                            );
                            //
                            FB.Canvas.scrollTo(0, 0);
                        }
                    });
                }
            }
        }

    </script>      
</body>
</html>
