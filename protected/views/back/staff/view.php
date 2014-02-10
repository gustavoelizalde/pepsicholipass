<?php
/* @var $this StaffController */
/* @var $model Staff */

$this->breadcrumbs=array(
	'Staffs'=>array('index'),
	$model->id,
);

/*$this->menu=array(
	array('label'=>'List Staff', 'url'=>array('index')),
	array('label'=>'Create Staff', 'url'=>array('create')),
	array('label'=>'Update Staff', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Staff', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Staff', 'url'=>array('admin')),
);*/
?>

<h1>Staff</h1>

<p></p>

<div class="content-box">
	<div class="box-body">
		<div class="box-header clear">
        	<h2>Detalle Staff:</h2>
        </div>
        <div class="box-wrap clear">
			
			<h3>Opciones</h3>
			<div class="clear" style="margin-bottom:15px;">
				<?php echo CHtml::link('Regresar al Listado',array('admin/staff/index'),array('class'=>'button blue fl', 'style'=>'margin-right:10px;')); ?>				<?php echo CHtml::link('Crear Nuevo',array('admin/staff/create'),array('class'=>'button blue fl', 'style'=>'margin-right:10px;')); ?>				<?php echo CHtml::link('Editar Registro',array('admin/staff/update/id/'.$model->id),array('class'=>'button blue fl')); ?>			</div>
			
			<h3>Detalle</h3>
			<?php $this->widget('zii.widgets.CDetailView', array(
                'data'=>$model,
                'attributes'=>array(
            		'id',
		'nombre',
		'apellido',
		'username',
		'pass',
		'activo',
                ),
            )); ?>
        </div>
	</div>
</div>