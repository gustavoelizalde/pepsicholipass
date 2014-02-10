<?php
/* @var $this SiteController */
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
	
<div class="login-inside">
    <div class="login-data">
        <div class="row clear">
            <?php echo $form->labelEx($model,'Username'); ?>
            <?php echo $form->textField($model,'username'); ?>
        </div>
        <div class="row clear">
            <?php echo $form->labelEx($model,'Password'); ?>
            <?php echo $form->passwordField($model,'password'); ?>
        </div>
        <?php echo CHtml::submitButton('Login',array('class'=>'button')); ?>
    </div>
    <?php echo $form->error($model,'login'); ?>
</div>
<div class="login-footer clear">
    <span class="remember">
        <?php echo $form->checkBox($model,'rememberMe'); ?><?php echo $form->label($model,'rememberMe'); ?>
    </span>
</div>

<?php $this->endWidget(); ?>