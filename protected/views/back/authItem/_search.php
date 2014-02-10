<?php
/* @var $this AuthItemController */
/* @var $model AuthItem */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="form-field clear">
		<?php echo $form->label($model,'name', array('class'=>'form-label fl-space2')); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>64)); ?>
	</div>

	<div class="form-field clear">
		<?php echo $form->label($model,'type', array('class'=>'form-label fl-space2')); ?>
		<?php echo $form->textField($model,'type'); ?>
	</div>

	<div class="form-field clear">
		<?php echo $form->label($model,'description', array('class'=>'form-label fl-space2')); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="form-field clear">
		<?php echo $form->label($model,'bizrule', array('class'=>'form-label fl-space2')); ?>
		<?php echo $form->textArea($model,'bizrule',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="form-field clear">
		<?php echo $form->label($model,'data', array('class'=>'form-label fl-space2')); ?>
		<?php echo $form->textArea($model,'data',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="form-field clear buttons">
		<?php echo CHtml::submitButton('Realizar Búsqueda', array('class'=>'button green fl')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->