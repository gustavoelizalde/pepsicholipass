<?php
/* @var $this PaisesController */
/* @var $model Paises */
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
<?php echo $form->label($model, 'pais', array('class' => 'form-label fl-space2')); ?>
<?php echo $form->textField($model, 'pais', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="form-field clear">
<?php echo $form->label($model, 'activo', array('class' => 'form-label fl-space2')); ?>
<?php echo $form->dropDownList($model, 'activo', array(1 => 'Si', 0 => 'No'), array('empty' => 'Seleccionar')); ?>
    </div>

    <div class="form-field clear buttons">
    <?php echo CHtml::submitButton('Realizar Búsqueda', array('class' => 'button green fl')); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->