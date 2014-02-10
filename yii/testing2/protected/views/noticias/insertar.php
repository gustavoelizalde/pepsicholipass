<?php
$this->pageTitle = Yii::app()->name . ' | Noticias - Nueva';
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

<?php echo $formulario->errorSummary($formInsertar); ?>

<div class="row">
    <?php echo $formulario->labelEx($formInsertar, 'titulo'); ?>
    <?php echo $formulario->textField($formInsertar, 'titulo'); ?>
    <?php echo $formulario->error($formInsertar, 'titulo'); ?>
</div>

<div class="row">
    <?php echo $formulario->labelEx($formInsertar, 'contenido'); ?>
    <?php echo $formulario->textArea($formInsertar, 'contenido'); ?>
    <?php echo $formulario->error($formInsertar, 'contenido'); ?>
</div>

<?php echo CHtml::submitButton('Submit'); ?>

<?php $this->endWidget(); ?>