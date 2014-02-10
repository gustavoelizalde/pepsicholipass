<?php
/* @var $this ContenidosCategoriasController */
/* @var $model ContenidosCategorias */

$this->breadcrumbs = array(
    'Contenidos',
    'Categorias'
);

/* $this->menu=array(
  array('label'=>'List ContenidosCategorias', 'url'=>array('index')),
  array('label'=>'Create ContenidosCategorias', 'url'=>array('create')),
  ); */

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('contenidos-categorias-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Categorias</h1>

<p></p>

<div class="content-box">
    <div class="box-body">
        <div class="box-header clear">
            <h2>Administrar Categorias</h2>
        </div>
        <div class="box-wrap clear">
            <p>Si lo desea, puede introducir un operador de comparación (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
                or <b>=</b>) al principio de cada uno de los valores de búsqueda para especificar cómo la comparación se debe hacer.</p>

            <div class="clear" style="margin-bottom:20px;">
                <h3>Opciones</h3>
                <div class="clear">
                    <?php echo CHtml::button('Búsqueda Avanzada', array('class' => 'search-button button blue fl', 'style' => 'margin-right:10px;')); ?>
                    <?php if (Yii::app()->user->checkAccess('crearCategorias') || Yii::app()->user->id == 'admin-root') { ?>
                        <?php echo CHtml::link('Crear Nuevo', array('contenidoscategorias/create'), array('class' => 'button blue fl')); ?>
                    <?php } ?>
                </div>

                <div class="search-form" style="display:none; padding-top:15px; border-bottom:#CCC dotted 1px; border-top:#CCC dotted 1px; padding-bottom:10px; margin-top:10px;">
                    <?php
                    $this->renderPartial('_search', array(
                        'model' => $model,
                    ));
                    ?>
                </div><!-- search-form -->
            </div>

            <h3>Listado</h3>

            <?php
            if ((Yii::app()->user->checkAccess('editarCategorias') && Yii::app()->user->checkAccess('eliminarCategorias')) || Yii::app()->user->id == 'admin-root')
                $template = '{update}{delete}';
            elseif (Yii::app()->user->checkAccess('editarCategorias'))
                $template = '{update}';
            elseif (Yii::app()->user->checkAccess('eliminarCategorias'))
                $template = '{delete}';
            else
                $template = '';

            $this->widget('zii.widgets.grid.CGridView', array(
                'id' => 'contenidos-categorias-grid',
                'dataProvider' => $model->search(),
                'filter' => $model,
                'columns' => array(
                    'id',
                    array(
                        'name' => 'contenidos_categorias_id',
                        'filter' => CHtml::listData(ContenidosCategorias::model()->findAll(), 'id', 'nombre'),
                        'value' => 'ContenidosCategorias::model()->findByPk($data->contenidos_categorias_id)->nombre'
                    ),
                    'nombre',
                    array(
                        'name' => 'activo',
                        'filter' => array(0 => 'No', 1 => 'Si'),
                        'value' => '$data->activo == 0 ? "No" : "Si"'
                    ),
                    array(
                        'class' => 'CButtonColumn',
                        'template' => $template
                    ),
                ),
            ));
            ?>
        </div>
    </div>
</div>