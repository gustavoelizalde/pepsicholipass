<?php
/* @var $this RegistradosController */
/* @var $model Registrados */

$this->breadcrumbs=array(
	'Registradoses'=>array('index'),
	$model->id,
);

/*$this->menu=array(
	array('label'=>'List Registrados', 'url'=>array('index')),
	array('label'=>'Create Registrados', 'url'=>array('create')),
	array('label'=>'Update Registrados', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Registrados', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Registrados', 'url'=>array('admin')),
);*/
?>

<h1>Registrados</h1>

<p></p>

<div class="content-box">
	<div class="box-body">
		<div class="box-header clear">
        	<h2>Detalle Registrados:</h2>
        </div>
        <div class="box-wrap clear">
			
			<h3>Opciones</h3>
			<div class="clear" style="margin-bottom:15px;">
				<?php echo CHtml::link('Regresar al Listado',array('admin/registrados/index'),array('class'=>'button blue fl', 'style'=>'margin-right:10px;')); ?>				<?php echo CHtml::link('Crear Nuevo',array('admin/registrados/create'),array('class'=>'button blue fl', 'style'=>'margin-right:10px;')); ?>				<?php echo CHtml::link('Editar Registro',array('admin/registrados/update/id/'.$model->id),array('class'=>'button blue fl')); ?>			</div>
			
			<h3>Detalle</h3>
			<?php $this->widget('zii.widgets.CDetailView', array(
                'data'=>$model,
                'attributes'=>array(
            		'id',
		'nombre',
		'apellido',
		'email',
		'telefono',
		'birthday',
		'comentario',
                ),
            )); ?>
        </div>
	</div>
</div>