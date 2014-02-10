<?php
/* @var $this StaffController */
/* @var $model Staff */

$this->breadcrumbs=array(
	'Staff'=>array('index'),
	'Nuevo',
);

/*$this->menu=array(
	array('label'=>'List Staff', 'url'=>array('index')),
	array('label'=>'Manage Staff', 'url'=>array('admin')),
);*/
?>

<h1>Staff</h1>

<p></p>

<div class="content-box">
	<div class="box-body">
		<div class="box-header clear">
        	<h2>Crear Staff</h2>
        </div>
        <div class="box-wrap clear">
			<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>        </div>
	</div>
</div>