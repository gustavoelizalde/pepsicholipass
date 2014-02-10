<?php
/* @var $this StaffController */
/* @var $model Staff */

$this->breadcrumbs=array(
	'Staff'=>array('index'),
	$model->id,
	'Update',
);

/*$this->menu=array(
	array('label'=>'List Staff', 'url'=>array('index')),
	array('label'=>'Create Staff', 'url'=>array('create')),
	array('label'=>'View Staff', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Staff', 'url'=>array('admin')),
);*/
?>

<h1>Staff</h1>

<p></p>

<div class="content-box">
	<div class="box-body">
		<div class="box-header clear">
        	<h2>Editar Staff: <?php echo $model->nombre.' '.$model->apellido; ?></h2>
        </div>
        <div class="box-wrap clear">
			<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>        </div>
	</div>
</div>