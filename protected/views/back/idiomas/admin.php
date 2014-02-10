<?php
/* @var $this IdiomasController */
/* @var $model Idiomas */

$this->breadcrumbs = array(
    'Idiomas'
);

/* $this->menu=array(
  array('label'=>'List Idiomas', 'url'=>array('index')),
  array('label'=>'Create Idiomas', 'url'=>array('create')),
  ); */

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('idiomas-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Idiomas</h1>

<p></p>

<div class="content-box">
    <div class="box-body">
        <div class="box-header clear">
            <h2>Administrar Idiomas</h2>
        </div>
        <div class="box-wrap clear">
            <p>Si lo desea, puede introducir un operador de comparación (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
                or <b>=</b>) al principio de cada uno de los valores de búsqueda para especificar cómo la comparación se debe hacer.</p>

            <div class="clear" style="margin-bottom:20px;">
                <h3>Opciones</h3>
                <div class="clear">
                    <?php echo CHtml::button('Búsqueda Avanzada', array('class' => 'search-button button blue fl', 'style' => 'margin-right:10px;')); ?>
                    <?php if (Yii::app()->user->checkAccess('crearIdiomas') || Yii::app()->user->id == 'admin-root') { ?>
                        <?php echo CHtml::link('Crear Usuario', array('idiomas/create'), array('class' => 'button blue fl')); ?>
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
            if ((Yii::app()->user->checkAccess('editarIdiomas') && Yii::app()->user->checkAccess('eliminarIdiomas')) || Yii::app()->user->id == 'admin-root')
                $template = '{update}{delete}';
            elseif (Yii::app()->user->checkAccess('editarIdiomas'))
                $template = '{update}';
            elseif (Yii::app()->user->checkAccess('eliminarIdiomas'))
                $template = '{delete}';
            else
                $template = '';

            $this->widget('zii.widgets.grid.CGridView', array(
                'id' => 'idiomas-grid',
                'dataProvider' => $model->search(),
                'filter' => $model,
                'columns' => array(
                    'id',
                    'nombre',
                    'codigo',
                    'activo',
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