<?php
/* @var $this IdiomasController */
/* @var $model Idiomas */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'idiomas-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>
	
    <h3>Datos</h3>
    
	<div class="form-field clear">
        <?php echo $form->label($model,'nombre', array('class'=>'form-label fl-space2')); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>100)); ?>
	</div>
	<div class="form-field clear">
        <?php echo $form->label($model,'codigo', array('class'=>'form-label fl-space2')); ?>
		<?php echo $form->textField($model,'codigo',array('size'=>2,'maxlength'=>2)); ?>
	</div>
	<div class="form-field clear">
        <?php echo $form->label($model,'activo', array('class'=>'form-label fl-space2')); ?>
		<?php echo $form->dropDownList($model,'activo',array(0=>'No',1=>'Si')); ?>
	</div>

	<div class="clear bt-space15"></div>
    
	<div class="rule"></div>
	
	<div class="form-field clear buttons">
    	<p class="clean-padding required fl">
			<span class="required">*</span> Campos requeridos.
		</p>
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar Cambios', array('class'=>'button green fr')); ?>
	</div>
		
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->