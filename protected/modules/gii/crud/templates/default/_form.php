<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php echo "<?php\n"; ?>
/* @var $this <?php echo $this->getControllerClass(); ?> */
/* @var $model <?php echo $this->getModelClass(); ?> */
/* @var $form CActiveForm */
?>

<div class="form">

<?php echo "<?php \$form=\$this->beginWidget('CActiveForm', array(
	'id'=>'".$this->class2id($this->modelClass)."-form',
	'enableAjaxValidation'=>false,
)); ?>\n"; ?>

	<?php echo "<?php echo \$form->errorSummary(\$model); ?>\n"; ?>
	
    <h3>Datos</h3>
    
<?php
foreach($this->tableSchema->columns as $column)
{
	if($column->autoIncrement)
		continue;
?>
	<div class="form-field clear">
        <?php echo "<?php echo \$form->label(\$model,'{$column->name}', array('class'=>'form-label fl-space2')); ?>\n"; ?>
		<?php echo "<?php echo ".$this->generateActiveField($this->modelClass,$column)."; ?>\n"; ?>
	</div>
<?php
}
?>

	<div class="clear bt-space15"></div>
    
	<div class="rule"></div>
	
	<div class="form-field clear buttons">
    	<p class="clean-padding required fl">
			<span class="required">*</span> Campos requeridos.
		</p>
        <?php echo "<?php echo CHtml::submitButton(\$model->isNewRecord ? 'Crear' : 'Guardar Cambios', array('class'=>'button green fr')); ?>\n"; ?>
	</div>
		
	</div>

<?php echo "<?php \$this->endWidget(); ?>\n"; ?>

</div><!-- form -->