<?php
/* @var $this IdiomasController */
/* @var $model Idiomas */

$this->breadcrumbs=array(
	'Idiomas'=>array('index'),
	$model->nombre,
	'Editar',
);

/*$this->menu=array(
	array('label'=>'List Idiomas', 'url'=>array('index')),
	array('label'=>'Create Idiomas', 'url'=>array('create')),
	array('label'=>'View Idiomas', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Idiomas', 'url'=>array('admin')),
);*/
?>

<h1>Idiomas</h1>

<p></p>

<div class="content-box">
	<div class="box-body">
		<div class="box-header clear">
        	<h2>Editar Idioma:</h2>
        </div>
        <div class="box-wrap clear">
			<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>        </div>
	</div>
</div>