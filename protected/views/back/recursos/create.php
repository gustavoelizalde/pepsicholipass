<?php
/* @var $this RecursosController */
/* @var $model Recursos */

$this->breadcrumbs=array(
	'Recursos'=>array('index'),
	'Nuevo',
);

/*$this->menu=array(
	array('label'=>'List Recursos', 'url'=>array('index')),
	array('label'=>'Manage Recursos', 'url'=>array('admin')),
);*/
?>

<h1>Recursos</h1>

<p></p>

<div class="content-box">
	<div class="box-body">
		<div class="box-header clear">
        	<h2>Crear Recurso</h2>
        </div>
        <div class="box-wrap clear">
			<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>        </div>
	</div>
</div>