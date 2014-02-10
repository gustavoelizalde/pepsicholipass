<?php
/* @var $this ContenidosParametrosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'',
);

$this->menu=array(
	array('label'=>'Create ContenidosParametros', 'url'=>array('create')),
	array('label'=>'Manage ContenidosParametros', 'url'=>array('admin')),
);
?>

<h1>Contenidos Parametros</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
