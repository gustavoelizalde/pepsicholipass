<?php
/* @var $this RecursosController */
/* @var $model Recursos */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="form-field clear">
		<?php echo $form->label($model,'id', array('class'=>'form-label fl-space2')); ?>
		<?php echo $form->textField($model,'id',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="form-field clear">
		<?php echo $form->label($model,'recursos_id', array('class'=>'form-label fl-space2')); ?>
		<?php echo $form->textField($model,'recursos_id',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="form-field clear">
		<?php echo $form->label($model,'nombre', array('class'=>'form-label fl-space2')); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="form-field clear">
		<?php echo $form->label($model,'url', array('class'=>'form-label fl-space2')); ?>
		<?php echo $form->textField($model,'url',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="form-field clear">
		<?php echo $form->label($model,'orden', array('class'=>'form-label fl-space2')); ?>
		<?php echo $form->textField($model,'orden',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="form-field clear">
		<?php echo $form->label($model,'visible', array('class'=>'form-label fl-space2')); ?>
		<?php echo $form->textField($model,'visible'); ?>
	</div>

	<div class="form-field clear">
		<?php echo $form->label($model,'activo', array('class'=>'form-label fl-space2')); ?>
		<?php echo $form->textField($model,'activo'); ?>
	</div>

	<div class="form-field clear buttons">
		<?php echo CHtml::submitButton('Realizar Búsqueda', array('class'=>'button green fl')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->