<?php
	$mystring = $_SERVER['HTTP_REFERER'];
	$findme   = 'apps.facebook.com';
	$pos = strpos($mystring, $findme);

	if ($pos == true) {
		//cambiar esta url si se esta en modo prueba
		echo '<script>window.top.location.href = "https://www.facebook.com/pepsipr/app_623431217672700";</script>';
	}
?>
<body>
    <a href="#" data-reveal-id="myModal" style="color: #999 !important; position: absolute; font-size: 14px; text-decoration: none; margin-top: 680px; margin-left: 330px; font:normal 10px Tahoma, Geneva, sans-serif; color:#FFF; background:#000; padding:2px 4px; border-radius:3px;">Términos y Condiciones</a>
    <div id="fb-root"></div>
    <?php
    if ($liked) {
        echo '<script>window.location.replace("home");</script>';
    } else {
        echo '<img src="' . Yii::app()->theme->baseUrl . '/img/bg_force_liked.jpg" width="810" height="704">';
    }
    ?>
    <?php
    $this->beginContent('inc_scripts');
    $this->endContent();
    ?>

    <script>
        $(document).ready(function(e) {
            FB.Canvas.setSize({width: 810, height: 705});
        });
    </script>
</body>
</html>
