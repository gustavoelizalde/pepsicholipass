<?php
/* @var $this UsuariosController */
/* @var $model Usuarios */
/* @var $form CActiveForm */

$paises = CHtml::listData(Paises::model()->findAll('activo = 1'), 'id', 'pais');
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'usuarios-form',
        'enableAjaxValidation' => false,
    ));
    ?>

    <?php echo $form->errorSummary($model); ?>

    <h3>Datos</h3>


    <div class="form-field clear">
        <?php echo $form->label($model, 'usuario', array('class' => 'form-label fl-space2')); ?>
        <?php echo $form->textField($model, 'usuario', array('size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->error($model, 'usuario'); ?>
    </div>
    <div class="form-field clear">
        <?php echo $form->label($model, 'pass', array('class' => 'form-label fl-space2')); ?>
        <?php echo $form->passwordField($model, 'pass', array('size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->error($model, 'pass'); ?>
    </div>
    <div class="form-field clear">
        <?php echo $form->label($model, 'nombre', array('class' => 'form-label fl-space2')); ?>
        <?php echo $form->textField($model, 'nombre', array('size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->error($model, 'nombre'); ?>
    </div>
    <div class="form-field clear">
        <?php echo $form->label($model, 'apellido', array('class' => 'form-label fl-space2')); ?>
        <?php echo $form->textField($model, 'apellido', array('size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->error($model, 'apellido'); ?>
    </div>
    <div class="form-field clear">
        <?php echo $form->label($model, 'email', array('class' => 'form-label fl-space2')); ?>
        <?php echo $form->textField($model, 'email', array('size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->error($model, 'email'); ?>
    </div>
    <div class="form-field clear">
        <?php echo $form->label($model, 'telefono', array('class' => 'form-label fl-space2')); ?>
        <?php echo $form->textField($model, 'telefono', array('size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->error($model, 'telefono'); ?>
    </div>
    <div class="form-field clear">
        <?php echo $form->label($model, 'direccion', array('class' => 'form-label fl-space2')); ?>
        <?php echo $form->textField($model, 'direccion', array('size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->error($model, 'direccion'); ?>
    </div>
    <div class="form-field clear">
        <?php echo $form->label($model, 'ciudad', array('class' => 'form-label fl-space2')); ?>
        <?php echo $form->textField($model, 'ciudad', array('size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->error($model, 'ciudad'); ?>
    </div>
    <div class="form-field clear">
        <?php echo $form->label($model, 'provincia', array('class' => 'form-label fl-space2')); ?>
        <?php echo $form->textField($model, 'provincia', array('size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->error($model, 'provincia'); ?>
    </div>
    <div class="form-field clear">
        <?php echo $form->label($model, 'paises_id', array('class' => 'form-label fl-space2')); ?>
        <?php echo $form->dropDownList($model, 'paises_id', $paises); ?>
        <?php echo $form->error($model, 'paises_id'); ?>
    </div>
    <div class="form-field clear">
        <?php echo $form->label($model, 'activo', array('class' => 'form-label fl-space2')); ?>
        <?php echo $form->dropDownList($model, 'activo', array(1 => 'Si', 0 => 'No')); ?>
        <?php echo $form->error($model, 'activo'); ?>
    </div>

    <div class="clear bt-space15"></div>

    <div id="boxArchivos">
        <h3>Subir avatar</h3>
        <?php
        $recortes = "180x180|120x112|166x54";
        $recortes_array = explode("|", $recortes);
        $this->widget(
                'ext.upload.RGUpload', array(
            "id" => "prueba_id",
            "extencions" => "jpg|png|gif",
            "controller" => "admin/upload",
            "action" => "upload",
            "recortes" => $recortes,
            "cantidadTotal" => "1"
                )
        );
        ?>

        <div class="listItems_edit">
            <ul>
                <?php if ($model->avatar != "") { ?>
                    <li>
                        <a href="javascript:deleteArchivo('<?php echo Yii::app()->request->baseUrl; ?>/admin/upload/deleteArchivo','<?php echo $model->avatar; ?>','<?php echo Yii::app()->request->baseUrl; ?>/upload/<?php echo $model->avatar; ?>');" class="deleteItem" onclick="return confirm('Eliminar?')"></a>
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/upload/<?php echo $model->avatar; ?>" />
                        <b>Realizar Recortes</b><br>
                        <?php for ($j = 0; $j < count($recortes_array); $j++) { ?>
                            <a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/upload/cropper?file=<?php echo base64_encode($model->avatar); ?>&size=<?php echo $recortes_array[$j]; ?>" class="crop fancybox-ajax-crop"><?php echo $recortes_array[$j]; ?></a>
                        <?php } ?>
                        <br><br><b>Ver Recortes</b><br>
                        <?php for ($j = 0; $j < count($recortes_array); $j++) { ?>
                            <a href="<?php echo Yii::app()->baseUrl . '/upload/' . $recortes_array[$j] . '/' . $model->avatar; ?>" class="crop fancybox"><?php echo $recortes_array[$j]; ?></a>
                        <?php } ?>
                        <div class="clear"></div>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>

    <div class="clear bt-space15"></div>

    <div class="rule"></div>

    <div class="form-field clear buttons">
        <p class="clean-padding required fl">
            <span class="required">*</span> Campos requeridos.
        </p>
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar Cambios', array('class' => 'button green fr')); ?>
    </div>

</div>

<?php $this->endWidget(); ?>

</div><!-- form -->