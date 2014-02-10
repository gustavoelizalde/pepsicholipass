<?php
/* @var $this PaisesController */
/* @var $model Paises */

$this->breadcrumbs = array(
    'Configuraciones',
    'Paises' => array('index'),
    $model->pais => array('view', 'id' => $model->id),
    'Editar',
);

/* $this->menu=array(
  array('label'=>'List Paises', 'url'=>array('index')),
  array('label'=>'Create Paises', 'url'=>array('create')),
  array('label'=>'View Paises', 'url'=>array('view', 'id'=>$model->id)),
  array('label'=>'Manage Paises', 'url'=>array('admin')),
  ); */
?>

<h1>Paises</h1>

<p></p>

<div class="content-box">
    <div class="box-body">
        <div class="box-header clear">
            <h2>Editar Paises:</h2>
        </div>
        <div class="box-wrap clear">
            <?php echo $this->renderPartial('_form', array('model' => $model)); ?>        </div>
    </div>
</div>