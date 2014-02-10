<?php
/* @var $this RegistradosController */
/* @var $model Registrados */

$this->breadcrumbs = array(
    'Registrados',
);

/* $this->menu=array(
  array('label'=>'List Registrados', 'url'=>array('index')),
  array('label'=>'Create Registrados', 'url'=>array('create')),
  ); */

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('registrados-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Registrados</h1>

<p></p>

<div class="content-box">
    <div class="box-body">
        <div class="box-header clear">
            <h2>Administrar Registradoses</h2>
        </div>
        <div class="registros_x_pagina">
            <div class="form-field clear">
                <?php echo CHtml::label('Items por pagina:', 'ddlPageSize'); ?>
                <?php echo CHtml::dropDownList('pageSize', $_SESSION['pageSize'] ? $_SESSION['pageSize'] : '10', array(10 => '10', 20 => '20', 30 => '30', 50 => '50', 100 => '100'), array('id' => 'ddlPageSize', 'onChange' => 'pageSize("' . Yii::app()->request->baseUrl . '", this.value)')); ?>
            </div>
        </div>
        <div class="box-wrap clear">
            <p>Si lo desea, puede introducir un operador de comparación (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
                or <b>=</b>) al principio de cada uno de los valores de búsqueda para especificar cómo la comparación se debe hacer.</p>

            <div class="clear" style="margin-bottom:20px;">
                <h3>Opciones</h3>
                <div class="clear">
                    <?php echo CHtml::button('Búsqueda Avanzada', array('class' => 'search-button button blue fl', 'style' => 'margin-right:10px;')); ?>
                    <?php echo CHtml::link('Exportar a CSV', 'javascript:exportar("' . Yii::app()->request->baseUrl . '");', array('class' => 'button blue fl', 'style' => 'margin-right: 10px;')); ?>
                    <?php if (Yii::app()->user->checkAccess('crearRegistrados') || Yii::app()->user->id == 'admin-root') { ?>
                        <?php echo CHtml::link('Crear Nuevo', array('registrados/create'), array('class' => 'button blue fl')); ?>
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



            <?php
            if ((Yii::app()->user->checkAccess('editarRegistrados') && Yii::app()->user->checkAccess('eliminarRegistrados')) || Yii::app()->user->id == 'admin-root')
                $template = '{update}{delete}';
            elseif (Yii::app()->user->checkAccess('editarRegistrados'))
                $template = '{update}';
            elseif (Yii::app()->user->checkAccess('eliminarRegistrados'))
                $template = '{delete}';
            else
                $template = '';

            $this->widget('zii.widgets.grid.CGridView', array(
                'id' => 'registrados-grid',
                'dataProvider' => $model->search(),
                'filter' => $model,
                'columns' => array(
                    array(
                        'name' => 'evento',
                        'value' => 'Contenidos::model()->findByPk($data->cont->id)->contenidos_x_idiomas[0]->titulo'
                    ),
                    array(
                        'name' => 'fecha',
                        'value' => 'date("Y-m-d",$data->cont->fecha)'
                    ),
                    'nombre',
                    'apellido',
                    'email',
                    /*
                      'telefono',
                      'birthday',
                      'comentario',
                     */
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