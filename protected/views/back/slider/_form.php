<?php
/* @var $this SliderController */
/* @var $model Slider */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'slider-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>
	
    <h3>Datos</h3>
    
	<div class="form-field clear">
        <?php echo $form->label($model,'nombre', array('class'=>'form-label fl-space2')); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>250)); ?>
	</div>
	<div class="form-field clear">
        <?php echo $form->label($model,'link', array('class'=>'form-label fl-space2')); ?>
		<?php echo $form->textField($model,'link',array('size'=>60,'maxlength'=>100)); ?>
	</div>
	<div class="form-field clear">
        <?php echo $form->label($model,'parametros', array('class'=>'form-label fl-space2')); ?>
		<?php echo $form->textField($model,'parametros',array('size'=>60,'maxlength'=>250)); ?>
	</div>
	<div class="form-field clear">
        <?php echo $form->label($model,'icono', array('class'=>'form-label fl-space2')); ?>
		<?php echo $form->textField($model,'icono',array('size'=>60,'maxlength'=>250)); ?>
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