<?php
/* @var $this IdiomasController */
/* @var $model Idiomas */

$this->breadcrumbs=array(
	'Idiomases'=>array('index'),
	$model->id,
);

/*$this->menu=array(
	array('label'=>'List Idiomas', 'url'=>array('index')),
	array('label'=>'Create Idiomas', 'url'=>array('create')),
	array('label'=>'Update Idiomas', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Idiomas', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Idiomas', 'url'=>array('admin')),
);*/
?>

<h1>Módulo de Idiomas</h1>

<p></p>

<div class="content-box">
	<div class="box-body">
		<div class="box-header clear">
        	<h2>Detalle Idiomas:</h2>
        </div>
        <div class="box-wrap clear">
			<?php $this->widget('zii.widgets.CDetailView', array(
                'data'=>$model,
                'attributes'=>array(
            		'id',
		'nombre',
		'codigo',
		'activo',
                ),
            )); ?>
        </div>
	</div>
</div>