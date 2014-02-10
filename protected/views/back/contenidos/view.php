<?php
/* @var $this ContenidosController */
/* @var $model Contenidos */

$this->breadcrumbs = array(
    'Contenidoses' => array('index'),
    $model->id,
);

/* $this->menu=array(
  array('label'=>'List Contenidos', 'url'=>array('index')),
  array('label'=>'Create Contenidos', 'url'=>array('create')),
  array('label'=>'Update Contenidos', 'url'=>array('update', 'id'=>$model->id)),
  array('label'=>'Delete Contenidos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
  array('label'=>'Manage Contenidos', 'url'=>array('admin')),
  ); */
?>

<h1>Contenidos</h1>

<p></p>

<div class="content-box">
    <div class="box-body">
        <div class="box-header clear">
            <h2>Detalle Contenidos:</h2>
        </div>
        <div class="box-wrap clear">

            <h3>Opciones</h3>
            <div class="clear" style="margin-bottom:15px;">
                <?php echo CHtml::link('Regresar al Listado', array('admin/contenidos/index', 'cat' => $_GET['cat']), array('class' => 'button blue fl', 'style' => 'margin-right:10px;')); ?>
                <?php echo CHtml::link('Crear Nuevo', array('admin/contenidos/create', 'cat' => $_GET['cat']), array('class' => 'button blue fl', 'style' => 'margin-right:10px;')); ?>
                <?php echo CHtml::link('Editar Registro', array('admin/contenidos/update', 'cat' => $_GET['cat'], 'id' => $model->id), array('class' => 'button blue fl')); ?>
            </div>

            <h3>Detalle</h3>
            <?php
            $this->widget('zii.widgets.CDetailView', array(
                'data' => $model,
                'attributes' => array(
                    'id',
                    'contenidos_categorias_id',
                    'fecha_alta',
                    'fecha_edit',
                    'destacado',
                    'activo',
                ),
            ));
            ?>
        </div>
    </div>
</div>