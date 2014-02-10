<?php
/* @var $this SliderController */
/* @var $model Slider */

$this->breadcrumbs=array(
	'Sliders'=>array('index'),
	'Nuevo',
);

/*$this->menu=array(
	array('label'=>'List Slider', 'url'=>array('index')),
	array('label'=>'Manage Slider', 'url'=>array('admin')),
);*/
?>

<h1>Slider</h1>

<p></p>

<div class="content-box">
	<div class="box-body">
		<div class="box-header clear">
        	<h2>Crear Slider</h2>
        </div>
        <div class="box-wrap clear">
			<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>        </div>
	</div>
</div>