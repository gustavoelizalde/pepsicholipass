<?php
/* @var $this UsuariosController */
/* @var $model Usuarios */

$this->breadcrumbs = array(
    'Usuarios' => array('index'),
    $model->usuario => array('view', 'id' => $model->id),
    'Editar',
);
?>

<h1>Usuarios</h1>

<p></p>

<div class="content-box">
    <div class="box-body">
        <div class="box-header clear">
            <h2>Editar:</h2>
        </div>
        <div class="box-wrap clear">
            <?php echo $this->renderPartial('_form', array('model' => $model)); ?>        </div>
    </div>
</div>