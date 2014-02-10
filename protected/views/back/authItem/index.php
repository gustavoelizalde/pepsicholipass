<?php
/* @var $this AuthItemController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'',
);

$this->menu=array(
	array('label'=>'Create AuthItem', 'url'=>array('create')),
	array('label'=>'Manage AuthItem', 'url'=>array('admin')),
);
?>

<h1>Auth Item</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
