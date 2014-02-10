<?php
/* @var $this ContenidosCategoriasController */
/* @var $model ContenidosCategorias */

$this->breadcrumbs=array(
	'Contenidos',
	'Categorias'=>array('index'),
	$model->nombre,
	'Editar',
);

/*$this->menu=array(
	array('label'=>'List ContenidosCategorias', 'url'=>array('index')),
	array('label'=>'Create ContenidosCategorias', 'url'=>array('create')),
	array('label'=>'View ContenidosCategorias', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ContenidosCategorias', 'url'=>array('admin')),
);*/
?>

<h1>Contenidos Categorias</h1>

<p></p>

<div class="content-box">
	<div class="box-body">
		<div class="box-header clear">
        	<h2>Editar ContenidosCategorias:</h2>
        </div>
        <div class="box-wrap clear">
			<?php echo $this->renderPartial('_form', array('model'=>$model,'parametros'=>$parametros)); ?>
		</div>
	</div>
</div>