<?php
/* @var $this RegistradosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'',
);

$this->menu=array(
	array('label'=>'Create Registrados', 'url'=>array('create')),
	array('label'=>'Manage Registrados', 'url'=>array('admin')),
);
?>

<h1>Registrados</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
