<?php
/* @var $this StaffController */
/* @var $model Staff */
/* @var $form CActiveForm */

$roles = AuthItem::model()->findAll('type=2');
$auth = Yii::app()->authManager;
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'staff-form',
        'enableAjaxValidation' => false,
    ));
    ?>

    <?php echo $form->errorSummary($model); ?>

    <h3>Datos</h3>

    <div class="form-field clear">
        <?php echo $form->label($model, 'nombre', array('class' => 'form-label fl-space2')); ?>
        <?php echo $form->textField($model, 'nombre', array('size' => 60, 'maxlength' => 100)); ?>
    </div>
    <div class="form-field clear">
        <?php echo $form->label($model, 'apellido', array('class' => 'form-label fl-space2')); ?>
        <?php echo $form->textField($model, 'apellido', array('size' => 60, 'maxlength' => 100)); ?>
    </div>
    <div class="form-field clear">
        <?php echo $form->label($model, 'username', array('class' => 'form-label fl-space2')); ?>
        <?php echo $form->textField($model, 'username', array('size' => 60, 'maxlength' => 100)); ?>
    </div>
    <div class="form-field clear">
        <?php echo $form->label($model, 'pass', array('class' => 'form-label fl-space2')); ?>
        <?php echo $form->passwordField($model, 'pass', array('size' => 60, 'maxlength' => 250)); ?>
    </div>
    <div class="form-field clear">
        <table style="margin-bottom:0px;">
            <tr>
                <td width="135"><label class="form-label fl-space2">Roles</label></td>
                <td>
                    <?php for ($i = 0; $i < count($roles); $i++) { ?>
                        <div class="form-checkbox-item clear">
                            <input <?php if ($auth->isAssigned($roles[$i]->name, $model->id)) { ?>checked<?php } ?> value="<?php echo $roles[$i]->name; ?>" id="rol<?php echo $roles[$i]->name; ?>" class="checkbox fl-space" type="checkbox" name="roles[]" rel="checkboxvert">
                            <label class="fl" for="rol<?php echo $roles[$i]->name; ?>"><?php echo $roles[$i]->name; ?></label>
                        </div>
                    <?php } ?>
                </td>
            </tr>
        </table>
    </div>
    <div class="form-field clear">
        <?php echo $form->label($model, 'activo', array('class' => 'form-label fl-space2')); ?>
        <?php echo $form->dropDownList($model, 'activo', array(0 => 'No', 1 => 'Si')); ?>
    </div>

    <div class="clear bt-space15"></div>

    <div id="boxArchivos">
        <h3>Subir avatar</h3>
        <?php
        $recortes = "64x64";
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