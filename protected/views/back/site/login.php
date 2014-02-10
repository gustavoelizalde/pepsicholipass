<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="description"  content=""/>
<meta name="keywords" content=""/>
<meta name="robots" content="ALL,FOLLOW"/>
<meta name="Author" content="AIT"/>
<meta http-equiv="imagetoolbar" content="no"/>
<title><?php echo CHtml::encode($this->pageTitle); ?></title>

<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/reset.css" type="text/css"/>
<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/screen.css" type="text/css"/>
<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/fancybox.css" type="text/css"/>
<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/jquery.wysiwyg.css" type="text/css"/>
<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/jquery.ui.css" type="text/css"/>
<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/visualize.css" type="text/css"/>
<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/visualize-light.css" type="text/css"/>
<!--[if IE 7]>
	<link rel="stylesheet" type="text/css" href="css/ie7.css" />
<![endif]-->	
</head>

<body class="login">

<div class="login-box">
<div class="login-border">
<div class="login-style">
	<div class="login-header">
		<div class="logo clear">
			<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/logo_earth_bw.png" alt="" class="picture" />
		</div>
	</div>
    
    <?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'login-form',
		'enableClientValidation'=>true,
		'clientOptions'=>array(
			'validateOnSubmit'=>true,
		),
	)); ?>
		
		<div class="login-inside">
			<div class="login-data">
				<div class="row clear">
					<?php echo $form->labelEx($model,'Username'); ?>
					<?php echo $form->textField($model,'username'); ?>
    			</div>
 				<div class="row clear">
                	<?php echo $form->labelEx($model,'Password'); ?>
					<?php echo $form->passwordField($model,'password'); ?>
				</div>
				<?php echo CHtml::submitButton('Login',array('class'=>'button')); ?>
			</div>
			<?php echo $form->error($model,'login'); ?>
		</div>
		<div class="login-footer clear">
			<span class="remember">
				<?php echo $form->checkBox($model,'rememberMe'); ?><?php echo $form->label($model,'rememberMe'); ?>
			</span>
			<a href="<?php echo Yii::app()->request->baseUrl; ?>" class="button green fr-space">Volver al Site</a>
		</div>
	
    <?php $this->endWidget(); ?>

</div>
</div>
</div>

<div class="login-links">
	<?php echo Yii::app()->params['textFooter']; ?> 
</div>

<?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.visualize.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.wysiwyg.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/tiny_mce/jquery.tinymce.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.fancybox.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.idtabs.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.datatables.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.jeditable.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.ui.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.jcarousel.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.validate.js"></script>

<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/excanvas.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/cufon.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/Zurich_Condensed_Lt_Bd.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/script.js"></script>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-12958851-8']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

</body>
</html>