<?php
$this->pageTitle = Yii::app()->name . ' | Noticias - Editar';
$this->breadcrumbs = array(
    'Noticias',
);

$formulario = $this->beginWidget('CActiveForm', array(
    'id' => 'edit-form',
    'enableClientValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
    ),
        ));
?>

<p class="note">Los campos con <span class="required">*</span> son obligatorios.</p>

<?php echo $formulario->errorSummary($form); ?>

<div class="row">
    <?php echo $formulario->labelEx($form, 'titulo'); ?>
    <?php echo $formulario->textField($form, 'titulo', array('value' => $noticia->titulo)); ?>
    <?php echo $formulario->error($form, 'titulo'); ?>
</div>

<div class="row">
    <?php echo $formulario->labelEx($form, 'contenido'); ?>
    <?php echo $formulario->textArea($form, 'contenido', array('content' => 'fjdksafkdal')); ?>
    <?php echo $formulario->error($form, 'contenido'); ?>
</div>

<?php echo CHtml::submitButton('Submit'); ?>

<?php $this->endWidget(); ?>