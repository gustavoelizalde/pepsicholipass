<?php
/* @var $this RegistradosController */
/* @var $model Registrados */

$this->breadcrumbs = array(
    'Registrados' => array('index'),
    $model->apellido.', '.$model->nombre,
    'Editar',
);

/* $this->menu=array(
  array('label'=>'List Registrados', 'url'=>array('index')),
  array('label'=>'Create Registrados', 'url'=>array('create')),
  array('label'=>'View Registrados', 'url'=>array('view', 'id'=>$model->id)),
  array('label'=>'Manage Registrados', 'url'=>array('admin')),
  ); */
?>

<h1>Registrados</h1>

<p></p>

<div class="content-box">
    <div class="box-body">
        <div class="box-header clear">
            <h2>Editar Registrados:</h2>
        </div>
        <div class="box-wrap clear">
            <?php echo $this->renderPartial('_form', array('model' => $model)); ?>
        </div>
    </div>
</div>