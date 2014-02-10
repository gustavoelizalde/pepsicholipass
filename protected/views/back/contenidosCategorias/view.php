<?php
/* @var $this ContenidosCategoriasController */
/* @var $model ContenidosCategorias */

$this->breadcrumbs=array(
	'Contenidos Categoriases'=>array('index'),
	$model->id,
);

/*$this->menu=array(
	array('label'=>'List ContenidosCategorias', 'url'=>array('index')),
	array('label'=>'Create ContenidosCategorias', 'url'=>array('create')),
	array('label'=>'Update ContenidosCategorias', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ContenidosCategorias', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ContenidosCategorias', 'url'=>array('admin')),
);*/
?>

<h1>Contenidos Categorias</h1>

<p></p>

<div class="content-box">
	<div class="box-body">
		<div class="box-header clear">
        	<h2>Detalle ContenidosCategorias:</h2>
        </div>
        <div class="box-wrap clear">
			
			<h3>Opciones</h3>
			<div class="clear" style="margin-bottom:15px;">
				<?php echo CHtml::link('Regresar al Listado',array('admin/contenidoscategorias/index'),array('class'=>'button blue fl', 'style'=>'margin-right:10px;')); ?>				<?php echo CHtml::link('Crear Nuevo',array('admin/contenidoscategorias/create'),array('class'=>'button blue fl', 'style'=>'margin-right:10px;')); ?>				<?php echo CHtml::link('Editar Registro',array('admin/contenidoscategorias/update/id/'.$model->id),array('class'=>'button blue fl')); ?>			</div>
			
			<h3>Detalle</h3>
			<?php $this->widget('zii.widgets.CDetailView', array(
                'data'=>$model,
                'attributes'=>array(
            		'id',
		'contenidos_categorias_id',
		'nombre',
		'activo',
                ),
            )); ?>
        </div>
	</div>
</div>