<?php
/* @var $this UsuariosController */
/* @var $model Usuarios */
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
        <?php echo $form->label($model, 'paises_id', array('class' => 'form-label fl-space2')); ?>
        <?php echo $form->textField($model, 'paises_id', array('size' => 10, 'maxlength' => 10)); ?>
    </div>

    <div class="form-field clear">
        <?php echo $form->label($model, 'usuario', array('class' => 'form-label fl-space2')); ?>
        <?php echo $form->textField($model, 'usuario', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="form-field clear">
        <?php echo $form->label($model, 'pass', array('class' => 'form-label fl-space2')); ?>
        <?php echo $form->passwordField($model, 'pass', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="form-field clear">
        <?php echo $form->label($model, 'nombre', array('class' => 'form-label fl-space2')); ?>
        <?php echo $form->textField($model, 'nombre', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="form-field clear">
        <?php echo $form->label($model, 'apellido', array('class' => 'form-label fl-space2')); ?>
        <?php echo $form->textField($model, 'apellido', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="form-field clear">
        <?php echo $form->label($model, 'email', array('class' => 'form-label fl-space2')); ?>
        <?php echo $form->textField($model, 'email', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="form-field clear">
        <?php echo $form->label($model, 'telefono', array('class' => 'form-label fl-space2')); ?>
        <?php echo $form->textField($model, 'telefono', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="form-field clear">
        <?php echo $form->label($model, 'direccion', array('class' => 'form-label fl-space2')); ?>
        <?php echo $form->textField($model, 'direccion', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="form-field clear">
        <?php echo $form->label($model, 'ciudad', array('class' => 'form-label fl-space2')); ?>
        <?php echo $form->textField($model, 'ciudad', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="form-field clear">
        <?php echo $form->label($model, 'provincia', array('class' => 'form-label fl-space2')); ?>
        <?php echo $form->textField($model, 'provincia', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="form-field clear">
        <?php echo $form->label($model, 'activo', array('class' => 'form-label fl-space2')); ?>
        <?php echo $form->textField($model, 'activo'); ?>
    </div>

    <div class="form-field clear buttons">
        <?php echo CHtml::submitButton('Realizar Búsqueda', array('class' => 'button green fl')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->