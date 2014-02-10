<?php
/* @var $this AuthItemController */
/* @var $model AuthItem */
/* @var $form CActiveForm */

$criteria = new CDbCriteria(); $criteria->order = 'nombre';
$recursos = Recursos::model()->findAll($criteria);
$auth = Yii::app()->authManager;
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'auth-item-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>
	
    <h3>Datos</h3>
    
    <div class="rule"></div>
    
	<div class="form-field clear">
        <?php echo $form->label($model,'name', array('class'=>'form-label fl-space2')); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>64)); ?>
	</div>
    <?php echo $form->hiddenField($model,'type'); ?>
	<div class="form-field clear">
        <?php echo $form->label($model,'description', array('class'=>'form-label fl-space2')); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
	</div>
	<div class="form-field clear">
        <?php echo $form->label($model,'bizrule', array('class'=>'form-label fl-space2')); ?>
		<?php echo $form->textArea($model,'bizrule',array('rows'=>6, 'cols'=>50)); ?>
	</div>
	<!--<div class="form-field clear">
        <?php //echo $form->label($model,'data', array('class'=>'form-label fl-space2')); ?>
		<?php //echo $form->textArea($model,'data',array('rows'=>6, 'cols'=>50)); ?>
	</div>-->

	<div class="clear bt-space15"></div>
    
    <h3>Accesos</h3>
    
    <div class="rule"></div>
    
    <?php foreach($recursos as $recurso){ ?>
    <div class="form-field clear" style="float:left; margin-right:20px; width:170px; margin-bottom:20px;">
    	<h4><?php echo $recurso->nombre; ?></h4>
        <div class="form-checkbox-item clear" style="padding-left:20px;">
        	<input <?php if($auth->hasItemChild($model->name,'listar'.$recurso->nombre)){ ?>checked="checked"<?php } ?> id="listar_<?php echo $recurso->id; ?>" class="checkbox fl-space" type="checkbox" value="listar<?php echo $recurso->nombre; ?>" name="acciones[]" rel="checkboxvert">
            <label for="listar_<?php echo $recurso->id; ?>">Listar</label>
        </div>
        <div class="form-checkbox-item clear" style="padding-left:20px;">
        	<input <?php if($auth->hasItemChild($model->name,'crear'.$recurso->nombre)){ ?>checked="checked"<?php } ?> id="crear_<?php echo $recurso->id; ?>" class="checkbox fl-space" type="checkbox" value="crear<?php echo $recurso->nombre; ?>" name="acciones[]" rel="checkboxvert">
            <label for="crear_<?php echo $recurso->id; ?>">Crear</label>
        </div>
        <div class="form-checkbox-item clear" style="padding-left:20px;">
        	<input <?php if($auth->hasItemChild($model->name,'editar'.$recurso->nombre)){ ?>checked="checked"<?php } ?> id="editar_<?php echo $recurso->id; ?>" class="checkbox fl-space" type="checkbox" value="editar<?php echo $recurso->nombre; ?>" name="acciones[]" rel="checkboxvert">
            <label for="editar_<?php echo $recurso->id; ?>">Editar</label>
        </div>
        <div class="form-checkbox-item clear" style="padding-left:20px;">
        	<input <?php if($auth->hasItemChild($model->name,'eliminar'.$recurso->nombre)){ ?>checked="checked"<?php } ?> id="eliminar_<?php echo $recurso->id; ?>" class="checkbox fl-space" type="checkbox" value="eliminar<?php echo $recurso->nombre; ?>" name="acciones[]" rel="checkboxvert">
            <label for="eliminar_<?php echo $recurso->id; ?>">Eliminar</label>
        </div>
    </div>
    <?php } ?>
    
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