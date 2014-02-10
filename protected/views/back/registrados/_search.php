<?php
/* @var $this RegistradosController */
/* @var $model Registrados */
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
		<?php echo $form->label($model,'nombre', array('class'=>'form-label fl-space2')); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="form-field clear">
		<?php echo $form->label($model,'apellido', array('class'=>'form-label fl-space2')); ?>
		<?php echo $form->textField($model,'apellido',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="form-field clear">
		<?php echo $form->label($model,'email', array('class'=>'form-label fl-space2')); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="form-field clear">
		<?php echo $form->label($model,'telefono', array('class'=>'form-label fl-space2')); ?>
		<?php echo $form->textField($model,'telefono',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="form-field clear">
		<?php echo $form->label($model,'birthday', array('class'=>'form-label fl-space2')); ?>
		<?php echo $form->textField($model,'birthday',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="form-field clear">
		<?php echo $form->label($model,'comentario', array('class'=>'form-label fl-space2')); ?>
		<?php echo $form->textField($model,'comentario',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="form-field clear buttons">
		<?php echo CHtml::submitButton('Realizar Búsqueda', array('class'=>'button green fl')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->