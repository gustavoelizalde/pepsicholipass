<?php
/* @var $this SliderController */
/* @var $model Slider */
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

	<div class="form-field clear buttons">
		<?php echo CHtml::submitButton('Realizar Búsqueda', array('class'=>'button green fl')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->