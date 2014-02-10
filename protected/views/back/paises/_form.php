<?php
/* @var $this PaisesController */
/* @var $model Paises */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'paises-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>
	
    <h3>Datos</h3>
    
	<div class="form-field clear">
        <?php echo $form->label($model,'pais', array('class'=>'form-label fl-space2')); ?>
		<?php echo $form->textField($model,'pais',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'pais'); ?>
	</div>
	<div class="form-field clear">
        <?php echo $form->label($model,'activo', array('class'=>'form-label fl-space2')); ?>
		<?php echo $form->dropDownList($model, 'activo', array(1 => 'Si', 0 => 'No')); ?>
		<?php echo $form->error($model,'activo'); ?>
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