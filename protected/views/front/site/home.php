<?php
$meses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
$ini = array(
    2013 => array(2, 5, 5, 8, 3, 6, 8, 4, 7, 2, 5, 7),
    2014 => array(3, 6, 6, 9, 4, 7, 9, 5, 8, 3, 6, 8)
);
$fin = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
?>
<body>
    <a href="#" data-reveal-id="myModal" style="color: #999 !important; position: absolute; font-size: 14px; text-decoration: none; margin-top: 680px; margin-left: 330px; font:normal 10px Tahoma, Geneva, sans-serif; color:#FFF; background:#000; padding:2px 4px; border-radius:3px;">Términos y Condiciones</a>
    <div id="container" class="calendar">

        <div class="wr">
            <div class="navmes"><a class="prev" href="#"><span>prev</span></a><a class="next" href="#"><span>next</span></a></div>
            <ul class="mons">
                <?php
                foreach ($eventos as $year => $y) {
                    foreach ($y as $c => $m) {
                ?>
                    <li><?php echo $meses[$c - 1] . ' ' . $year; ?></li>
                <?php
                    }
                }
                ?>
            </ul>
            <div id="calendar">
                <?php
                foreach ($eventos as $year => $y) {
                    foreach ($y as $c => $m) {
                ?>
                    <div>
                        <table border="0" cellspacing="0">
                            <thead>
                                <tr>
                                    <th colspan="1">DO</th>
                                    <th>LU</th>
                                    <th>MA</th>
                                    <th>MI</th>
                                    <th>JU</th>
                                    <th>VI</th>
                                    <th>SA</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php for ($i = 0; $i < 42; $i++): ?>
                                        <td>
                                            <span>
                                                <?php if ($i >= $ini[$year][$c - 1] && ($i - $ini[$year][$c - 1] + 1) <= $fin[$c - 1]): ?>
                                                    <?php echo $i - $ini[$year][$c - 1] + 1; ?>
                                                <?php endif; ?>
                                            </span>
                                            <?php if (is_object($eventos[$year][$c][$i - $ini[$year][$c - 1] + 1][0])): ?>
                                                <cite><?php echo $eventos[$year][$c][$i - $ini[$year][$c - 1] + 1][0]->getText('titulo', 1); ?></cite>
                                                <input type="hidden" value="<?php echo $eventos[$year][$c][$i - $ini[$year][$c - 1] + 1][0]->id; ?>">
                                            <?php endif; ?>
                                        </td>
                                        <?php if (($i + 1) % 7 == 0): ?></tr><tr><?php endif; ?>
                                    <?php endfor; ?>
                            </tbody>
                        </table>
                    </div>
                <?php
                    }
                }
                ?>
            </div>
            <a class="continuar" href="javascript:void(0);"><span>continuar</span></a>
        </div>

    </div>
    <script>
        var _activo = null;
        $(document).ready(function(e) {
            $('a.continuar').css('display','none');
			//
            FB.Canvas.setSize({width: 810, height: 710});
            //
            $('ul.mons, #calendar').cycle({
                timeout: 0,
                fx: 'scrollHorz',
                easing: 'easeOutBack',
                delay: 1000,
                next: '.navmes a.next',
                prev: '.navmes a.prev'
            });
            $("td cite").each(function() {
                $(this).parent().addClass('active');
            });
            $("td.active").click(function() {
                $("td.active").removeClass('selected');
                $(this).addClass('selected');
                _activo = $(this).find('input').val();
				//
				if($('a.continuar').css('display') == 'none'){
					$('a.continuar').css('display','block');
				}
            });
        });
        //
        $("a.continuar").click(function(e) {
            FB.getLoginStatus(function(response) {
                FB.api('/me', function(response) {
                    $.ajax({
                        type: 'POST',
                        url: "<?php echo Yii::app()->createUrl('site/check'); ?>",
                        data: 'fb=' + response.id,
                        success: function(data) {
                            console.log(data);
                            //
                            if (data == 'exist') {
                                /*$.fancybox('<?php echo Yii::app()->createUrl('site/winExist'); ?>', {
                                 'overlayOpacity': '0.85',
                                 'overlayColor': '#000',
                                 'margin': 0,
                                 'width': 460,
                                 'height': 200,
                                 'type': 'iframe'
                                 }
                                 );*/
                                alert('¡Ya participaste! Espera 24 horas y participa otra vez.');
                            } else if (data == 'ok') {
                                if (_activo == null) {
                                    alert("Seleccione algun evento.");
                                    return false;
                                } else {
                                    isLogin("<?php echo Yii::app()->createUrl('site/form'); ?>?id=" + _activo);
                                }
                            }
                            //
                            FB.Canvas.scrollTo(0, 0);
                        }
                    });
                });
            })
        });
    </script>


</body>
</html>
