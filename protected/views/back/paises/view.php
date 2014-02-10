<?php
/* @var $this PaisesController */
/* @var $model Paises */

$this->breadcrumbs = array(
    'Configuraciones',
    'Paises' => array('index'),
    $model->pais,
);
?>

<h1>Países</h1>

<p></p>

<div class="content-box">
    <div class="box-body">
        <div class="box-header clear">
            <h2>Detalle:</h2>
        </div>
        <div class="box-wrap clear">

            <h3>Opciones</h3>
            <div class="clear" style="margin-bottom:15px;">
                <?php echo CHtml::link('Regresar al Listado', array('admin/paises/index'), array('class' => 'button blue fl', 'style' => 'margin-right:10px;')); ?>				<?php echo CHtml::link('Crear Nuevo', array('admin/paises/create'), array('class' => 'button blue fl', 'style' => 'margin-right:10px;')); ?>				<?php echo CHtml::link('Editar Registro', array('admin/paises/update/id/' . $model->id), array('class' => 'button blue fl')); ?>			</div>

            <h3>Detalle</h3>
            <?php
            $this->widget('zii.widgets.CDetailView', array(
                'data' => $model,
                'attributes' => array(
                    'pais',
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