<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
$this->breadcrumbs=null;

$slider = Slider::model()->findAll();
?>

<!-- ICONBAR -->
<?php if(count($slider) > 0){ ?>
<div class="content-box clear">
    <div class="box-body iconbar">
        <div class="box-wrap">
            <div class="main-icons" id="iconbar">
                <ul class="clear">
                    <?php
                    foreach($slider as $s){
						$params = explode(',',$s->parametros);
						$_url = array();
						foreach($params as $param)
						{
							$p = explode('=',$param);
							if($p[0]!="" && $p[1]!="")
							$_url[$p[0]]=$p[1];
						}
						$_url = Yii::app()->createUrl($s->link,$_url);
					?>
                    <li><a href="<?php echo $_url; ?>"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/slider/<?php echo $s->icono; ?>" class="icon" alt="" /><span class="text"><?php echo $s->nombre; ?></span></a></li>
                    <?php
                    }
					?>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php } ?>

<h1>Bienvenido al administrador</h1>

<p>Usted puede cambiar el contenido de esta página, modificando los siguientes dos archivos:</p>
<ul style="padding-bottom:20px;">
	<li>View file: <code><?php echo __FILE__; ?></code></li>
	<li>Layout file: <code><?php echo $this->getLayoutFile('main'); ?></code></li>
</ul>
<p>Para más detalles de cómo modificar esta aplicación, por favor lea la <a href="http://www.yiiframework.com/doc/">documentación</a>. También puede consultar en el <a href="http://www.yiiframework.com/forum/">foro</a>, y quitar sus dudas.</p>