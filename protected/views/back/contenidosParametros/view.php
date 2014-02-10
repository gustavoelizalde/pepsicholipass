<?php
/* @var $this ContenidosParametrosController */
/* @var $model ContenidosParametros */

$this->breadcrumbs=array(
	'Contenidos Parametroses'=>array('index'),
	$model->id,
);

/*$this->menu=array(
	array('label'=>'List ContenidosParametros', 'url'=>array('index')),
	array('label'=>'Create ContenidosParametros', 'url'=>array('create')),
	array('label'=>'Update ContenidosParametros', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ContenidosParametros', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ContenidosParametros', 'url'=>array('admin')),
);*/
?>

<h1>Contenidos Parametros</h1>

<p></p>

<div class="content-box">
	<div class="box-body">
		<div class="box-header clear">
        	<h2>Detalle ContenidosParametros:</h2>
        </div>
        <div class="box-wrap clear">
			
			<h3>Opciones</h3>
			<div class="clear" style="margin-bottom:15px;">
				<?php echo CHtml::link('Regresar al Listado',array('admin/contenidosparametros/index'),array('class'=>'button blue fl', 'style'=>'margin-right:10px;')); ?>				<?php echo CHtml::link('Crear Nuevo',array('admin/contenidosparametros/create'),array('class'=>'button blue fl', 'style'=>'margin-right:10px;')); ?>				<?php echo CHtml::link('Editar Registro',array('admin/contenidosparametros/update/id/'.$model->id),array('class'=>'button blue fl')); ?>			</div>
			
			<h3>Detalle</h3>
			<?php $this->widget('zii.widgets.CDetailView', array(
                'data'=>$model,
                'attributes'=>array(
            		'id',
		'nombre',
		'tipo',
		'activo',
                ),
            )); ?>
        </div>
	</div>
</div>