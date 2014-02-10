<?php
/* @var $this ContenidosCategoriasController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'',
);

$this->menu=array(
	array('label'=>'Create ContenidosCategorias', 'url'=>array('create')),
	array('label'=>'Manage ContenidosCategorias', 'url'=>array('admin')),
);
?>

<h1>Contenidos Categorias</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
