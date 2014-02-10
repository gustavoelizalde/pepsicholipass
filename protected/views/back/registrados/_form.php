<?php
/* @var $this RegistradosController */
/* @var $model Registrados */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'registrados-form',
        'enableAjaxValidation' => false,
    ));
    ?>

    <?php echo $form->errorSummary($model); ?>

    <h3>Datos</h3>

    <div class="form-field clear">
        <?php echo $form->label($model, 'nombre', array('class' => 'form-label fl-space2')); ?>
        <?php echo $form->textField($model, 'nombre', array('size' => 60, 'maxlength' => 150)); ?>
    </div>
    <div class="form-field clear">
        <?php echo $form->label($model, 'apellido', array('class' => 'form-label fl-space2')); ?>
        <?php echo $form->textField($model, 'apellido', array('size' => 60, 'maxlength' => 150)); ?>
    </div>
    <div class="form-field clear">
        <?php echo $form->label($model, 'email', array('class' => 'form-label fl-space2')); ?>
        <?php echo $form->textField($model, 'email', array('size' => 60, 'maxlength' => 150)); ?>
    </div>
    <div class="form-field clear">
        <?php echo $form->label($model, 'telefono', array('class' => 'form-label fl-space2')); ?>
        <?php echo $form->textField($model, 'telefono', array('size' => 60, 'maxlength' => 150)); ?>
    </div>
    <div class="form-field clear">
        <?php echo $form->label($model, 'birthday', array('class' => 'form-label fl-space2')); ?>
        <?php echo $form->textField($model, 'birthday', array('size' => 10, 'maxlength' => 10)); ?>
    </div>
    <div class="form-field clear">
        <?php echo $form->label($model, 'comentario', array('class' => 'form-label fl-space2')); ?>
        <?php echo $form->textField($model, 'comentario', array('size' => 60, 'maxlength' => 250)); ?>
    </div>
    <div class="form-field clear">
        <?php echo $form->label($model, 'facebookId', array('class' => 'form-label fl-space2')); ?>
        <?php echo $form->textField($model, 'facebookId', array('size' => 60, 'maxlength' => 250)); ?>
    </div>

    <div class="clear bt-space15"></div>

    <div class="rule"></div>

    <div class="form-field clear buttons">
        <p class="clean-padding required fl">
            <span class="required">*</span> Campos requeridos.
        </p>
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar Cambios', array('class' => 'button green fr')); ?>
    </div>

</div>

<?php $this->endWidget(); ?>

</div><!-- form -->