<?php
/* @var $this ContenidosController */
/* @var $model Contenidos */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'action' => Yii::app()->createUrl($this->route),
        'method' => 'get',
    ));
    ?>

    <div class="form-field clear">
        <?php echo $form->label($model, 'id', array('class' => 'form-label fl-space2')); ?>
        <?php echo $form->textField($model, 'id', array('size' => 10, 'maxlength' => 10)); ?>
    </div>

    <div class="form-field clear">
        <?php echo $form->label($model, 'titulo', array('class' => 'form-label fl-space2')); ?>
        <?php echo $form->textField($model, 'titulo'); ?>
    </div>
    
    <div class="form-field clear">
        <?php echo $form->label($model, 'fecha', array('class' => 'form-label fl-space2')); ?>
        <?php echo $form->textField($model, 'fecha', array('class' => 'datepicker-inline hasDatepicker')); ?>
    </div>

    <div class="form-field clear">
        <?php echo $form->label($model, 'activo', array('class' => 'form-label fl-space2')); ?>
        <?php echo $form->dropDownList($model, 'activo', array( 1 => 'Si', 0 => 'No')); ?>
    </div>

    <div class="form-field clear buttons">
        <?php echo $form->hiddenField($model, 'contenidos_categorias_id', array('value' => $_GET['cat'])); ?>
        <?php echo CHtml::submitButton('Realizar Búsqueda', array('class' => 'button green fl')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->