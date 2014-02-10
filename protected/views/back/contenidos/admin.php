<?php
/* @var $this ContenidosController */
/* @var $model Contenidos */

$this->breadcrumbs = array(
    ContenidosCategorias::model()->findByPk($_GET['cat'])->nombre,
);

/* $this->menu=array(
  array('label'=>'List Contenidos', 'url'=>array('index')),
  array('label'=>'Create Contenidos', 'url'=>array('create')),
  ); */

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('contenidos-grid', {
		data: $(this).serialize()
	});
	return false;
});
");

$name_cat = ContenidosCategorias::model()->findByPk($_GET['cat'])->nombre;
?>

<h1><?php echo $name_cat; ?></h1>

<p></p>

<div class="content-box">
    <div class="box-body">
        <div class="box-header clear">
            <h2>Administrar <?php echo ContenidosCategorias::model()->findByPk($_GET['cat'])->nombre; ?></h2>
        </div>
        <div class="box-wrap clear">
            <p>Si lo desea, puede introducir un operador de comparación (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
                or <b>=</b>) al principio de cada uno de los valores de búsqueda para especificar cómo la comparación se debe hacer.</p>

            <div class="clear" style="margin-bottom:20px;">
                <h3>Opciones</h3>
                <div class="clear">
                    <?php echo CHtml::button('Búsqueda Avanzada', array('class' => 'search-button button blue fl', 'style' => 'margin-right:10px;')); ?>
                    <?php if (Yii::app()->user->checkAccess('crear' . $name_cat) || Yii::app()->user->id == 'admin-root') { ?>
                        <?php echo CHtml::link('Crear Nuevo', array('contenidos/create', 'cat' => $_GET['cat']), array('class' => 'button blue fl')); ?>
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
            if ((Yii::app()->user->checkAccess('editar' . $name_cat) && Yii::app()->user->checkAccess('eliminar' . $name_cat)) || Yii::app()->user->id == 'admin-root')
                $template = '{update}{delete}';
            elseif (Yii::app()->user->checkAccess('editar' . $name_cat))
                $template = '{update}';
            elseif (Yii::app()->user->checkAccess('eliminar' . $name_cat))
                $template = '{delete}';
            else
                $template = '';

            $this->widget('zii.widgets.grid.CGridView', array(
                'id' => 'contenidos-grid',
                'dataProvider' => $model->search($_GET['cat']),
                'filter' => $model,
                'columns' => array(
                    'id',
                    array(
                        'name' => 'titulo',
                        'value' => 'Contenidos::model()->findByPk($data->id)->contenidos_x_idiomas[0]->titulo'
                    ),
                    array(
                        'name'=>'fecha',
                        'value'=>'date("Y-m-d",$data->fecha)'
                        ),
                    array(
                        'name' => 'activo',
                        'value' => '$data->activo==0?"No":"Si"',
                        'filter' => array(0 => 'No', 1 => 'Si')
                    ),
                    array(
                        'class' => 'CButtonColumn',
                        'template' => $template,
                        'buttons' => array(
                            'update' => array
                                (
                                'url' => 'Yii::app()->createUrl("contenidos/update", array("cat"=>$_GET["cat"],"id"=>$data->id))',
                            ),
                            'delete' => array
                                (
                                'url' => 'Yii::app()->createUrl("contenidos/delete", array("cat"=>$_GET["cat"],"id"=>$data->id))',
                            ),
                        ),
                    ),
                ),
            ));
            ?>
        </div>
    </div>
</div>