<?php
/* @var $this ContenidosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'',
);

$this->menu=array(
	array('label'=>'Create Contenidos', 'url'=>array('create')),
	array('label'=>'Manage Contenidos', 'url'=>array('admin')),
);
?>

<h1>Contenidos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
