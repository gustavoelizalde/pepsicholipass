<?php
/* @var $this UsuariosController */
/* @var $model Usuarios */

$this->breadcrumbs = array(
    'Usuarios' => array('index'),
    $model->usuario,
);

/* $this->menu=array(
  array('label'=>'List Usuarios', 'url'=>array('index')),
  array('label'=>'Create Usuarios', 'url'=>array('create')),
  array('label'=>'Update Usuarios', 'url'=>array('update', 'id'=>$model->usuarios_id)),
  array('label'=>'Delete Usuarios', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->usuarios_id),'confirm'=>'Are you sure you want to delete this item?')),
  array('label'=>'Manage Usuarios', 'url'=>array('admin')),
  ); */
?>

<h1>Usuarios</h1>

<p></p>

<div class="content-box">
    <div class="box-body">
        <div class="box-header clear">
            <h2>Detalle:</h2>
        </div>
        <div class="box-wrap clear">

            <h3>Opciones</h3>
            <div class="clear" style="margin-bottom:15px;">
                <?php echo CHtml::link('Regresar al Listado', array('admin/usuarios/index'), array('class' => 'button blue fl', 'style' => 'margin-right:10px;')); ?>				<?php echo CHtml::link('Crear Nuevo', array('admin/usuarios/create'), array('class' => 'button blue fl', 'style' => 'margin-right:10px;')); ?>				<?php echo CHtml::link('Editar Registro', array('admin/usuarios/update/id/' . $model->id), array('class' => 'button blue fl')); ?>			</div>

            <h3>Detalle</h3>
            <?php
            $this->widget('zii.widgets.CDetailView', array(
                'data' => $model,
                'attributes' => array(
                    'usuario',
                    'nombre',
                    'apellido',
                    'email',
                    'telefono',
                    'direccion',
                    'ciudad',
                    'provincia',
                    array(
                        'name' => 'categoria',
                        'value' => $model->paises->pais,
                    ),
                    array(
                        'name' => 'activo',
                        'value' => $model->activo == 0 ? "No" : "Si",
                    )
                ),
            ));
            ?>
        </div>
    </div>
</div>