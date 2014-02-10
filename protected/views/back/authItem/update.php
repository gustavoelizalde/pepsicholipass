<?php
/* @var $this AuthItemController */
/* @var $model AuthItem */

$this->breadcrumbs=array(
	'Auth Items'=>array('index'),
	'Editar',
);

/*$this->menu=array(
	array('label'=>'List AuthItem', 'url'=>array('index')),
	array('label'=>'Create AuthItem', 'url'=>array('create')),
	array('label'=>'View AuthItem', 'url'=>array('view', 'id'=>$model->name)),
	array('label'=>'Manage AuthItem', 'url'=>array('admin')),
);*/
?>

<h1>Auth Item</h1>

<p></p>

<div class="content-box">
	<div class="box-body">
		<div class="box-header clear">
        	<h2>Editar AuthItem:</h2>
        </div>
        <div class="box-wrap clear">
			<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>        </div>
	</div>
</div>