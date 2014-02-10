<?php
/* @var $this ContenidosParametrosController */
/* @var $model ContenidosParametros */

$this->breadcrumbs=array(
	'Contenidos',
	'Parámetros'=>array('index'),
	'Nuevo',
);

/*$this->menu=array(
	array('label'=>'List ContenidosParametros', 'url'=>array('index')),
	array('label'=>'Manage ContenidosParametros', 'url'=>array('admin')),
);*/
?>

<h1>Parámetros</h1>

<p></p>

<div class="content-box">
	<div class="box-body">
		<div class="box-header clear">
        	<h2>Crear Parámetro</h2>
        </div>
        <div class="box-wrap clear">
			<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>        </div>
	</div>
</div>