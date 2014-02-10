<?php
/* @var $this RecursosController */
/* @var $model Recursos */

$this->breadcrumbs=array(
	'Recursoses'=>array('index'),
	$model->id,
);

/*$this->menu=array(
	array('label'=>'List Recursos', 'url'=>array('index')),
	array('label'=>'Create Recursos', 'url'=>array('create')),
	array('label'=>'Update Recursos', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Recursos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Recursos', 'url'=>array('admin')),
);*/
?>

<h1>Recursos</h1>

<p></p>

<div class="content-box">
	<div class="box-body">
		<div class="box-header clear">
        	<h2>Detalle Recursos:</h2>
        </div>
        <div class="box-wrap clear">
			
			<h3>Opciones</h3>
			<div class="clear" style="margin-bottom:15px;">
				<?php echo CHtml::link('Regresar al Listado',array('admin/recursos/index'),array('class'=>'button blue fl', 'style'=>'margin-right:10px;')); ?>				<?php echo CHtml::link('Crear Nuevo',array('admin/recursos/create'),array('class'=>'button blue fl', 'style'=>'margin-right:10px;')); ?>				<?php echo CHtml::link('Editar Registro',array('admin/recursos/update/id/'.$model->id),array('class'=>'button blue fl')); ?>			</div>
			
			<h3>Detalle</h3>
			<?php $this->widget('zii.widgets.CDetailView', array(
                'data'=>$model,
                'attributes'=>array(
            		'id',
		'recursos_id',
		'nombre',
		'url',
		'orden',
		'visible',
		'slider',
		'activo',
                ),
            )); ?>
        </div>
	</div>
</div>