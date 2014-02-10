<?php
/* @var $this SliderController */
/* @var $model Slider */

$this->breadcrumbs=array(
	'Sliders'=>array('index'),
	$model->id,
);

/*$this->menu=array(
	array('label'=>'List Slider', 'url'=>array('index')),
	array('label'=>'Create Slider', 'url'=>array('create')),
	array('label'=>'Update Slider', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Slider', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Slider', 'url'=>array('admin')),
);*/
?>

<h1>Slider</h1>

<p></p>

<div class="content-box">
	<div class="box-body">
		<div class="box-header clear">
        	<h2>Detalle Slider:</h2>
        </div>
        <div class="box-wrap clear">
			
			<h3>Opciones</h3>
			<div class="clear" style="margin-bottom:15px;">
				<?php echo CHtml::link('Regresar al Listado',array('admin/slider/index'),array('class'=>'button blue fl', 'style'=>'margin-right:10px;')); ?>				<?php echo CHtml::link('Crear Nuevo',array('admin/slider/create'),array('class'=>'button blue fl', 'style'=>'margin-right:10px;')); ?>				<?php echo CHtml::link('Editar Registro',array('admin/slider/update/id/'.$model->id),array('class'=>'button blue fl')); ?>			</div>
			
			<h3>Detalle</h3>
			<?php $this->widget('zii.widgets.CDetailView', array(
                'data'=>$model,
                'attributes'=>array(
            		'id',
		'nombre',
		'link',
		'parametros',
		'icono',
		'activo',
                ),
            )); ?>
        </div>
	</div>
</div>