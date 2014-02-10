<?php
/* @var $this ContenidosController */
/* @var $model Contenidos */
/* @var $form CActiveForm */

$categorias = ContenidosCategorias::model()->findAll('contenidos_categorias_id = ' . intval($_GET['cat']));
$categoria = ContenidosCategorias::model()->findByPk(intval($_GET['cat']));

function getCategorias($categorias, $index = 0, $edit) {
    ?>
    <?php if ($index == 0) { ?>
        <div class="form-field clear">
            <table style="margin-bottom:0px;">
                <tr>
                    <td width="135"><label class="form-label"></label></td>
                    <td>
                    <?php } ?>
                    <?php
                    foreach ($categorias as $categoria) {
                        ?>
                        <div id="div_check_<?php echo $categoria->id; ?>" class="grupo_check">
                            <div class="form-checkbox-item clear" style="padding-left:<?php echo 20 * $index; ?>px;">
                                <input <?php if (@in_array($categoria->id, $edit)) { ?>checked="checked"<?php } ?> onClick="changeCheck(this);" dep="<?php echo $categoria->contenidos_categorias_id; ?>" value="<?php echo $categoria->id; ?>" id="cat<?php echo $categoria->id; ?>" class="checkbox fl-space" type="checkbox" name="cat[]" rel="checkboxvert">
                                <label class="fl" for="cat<?php echo $categoria->id; ?>"><?php echo $categoria->nombre; ?></label>
                            </div>
                            <?php
                            if (is_array($categoria->categorias))
                                getCategorias($categoria->categorias, $index + 1, $edit);
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                    <?php if ($index == 0) { ?>
                    </td>
                </tr>
            </table>
        </div>
    <?php } ?>
    <?php
}

for ($i = 0; $i < count($model->categorias); $i++)
    $categorias_edit[] = $model->categorias[$i]->id;

// Array de modelos para errorSummary()
$modelsSummary = array();
$modelsSummary[] = $model;
for ($i = 0; $i < count($idiomas); $i++) {
    if (is_object($idiomas_model[$i]))
        $modelsSummary[] = $idiomas_model[$i];
    for ($j = 0; $j < count($parametros_model); $j++)
        if (is_object($parametros_model[$j][$idiomas[$i]->id]))
            $modelsSummary[] = $parametros_model[$j][$idiomas[$i]->id];
}
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'contenidos-form',
        'enableAjaxValidation' => false,
    ));
    ?>

    <?php echo $form->errorSummary($modelsSummary); ?>

    <?php for ($i = 0; $i < count($idiomas); $i++) { ?>
        <div id="idiomas_<?php echo $idiomas[$i]->id; ?>">
            <h3>Datos por idioma (<?php echo $idiomas[$i]->nombre; ?>)</h3>

            <div class="form-field clear">
                <?php echo $form->label($idiomas_model[$i], "[$i]titulo", array('class' => 'form-label fl-space2')); ?>
                <?php echo $form->textField($idiomas_model[$i], "[$i]titulo", array('maxlength' => 250)); ?>
            </div>

            <div class="form-field clear" <?php if ($categoria->show_copete == 0) { ?>style="display:none;"<?php } ?>>
                <?php echo $form->label($idiomas_model[$i], "[$i]copete", array('class' => 'form-label fl-space2')); ?>
                <?php echo $form->textField($idiomas_model[$i], "[$i]copete", array('maxlength' => 250)); ?>
            </div>

            <div class="form-field clear" <?php if ($categoria->show_descripcion == 0) { ?>style="display:none;"<?php } ?>>
                <table style="margin-bottom:0px;">
                    <tr>
                        <td width="110">
                            <?php echo $form->label($idiomas_model[$i], "[$i]descripcion", array('class' => 'form-label fl-space2')); ?>
                        </td>
                        <td><?php echo $form->textArea($idiomas_model[$i], "[$i]descripcion", array('class' => 'tinymce')); ?></td>
                    </tr>
                </table>
            </div>

            <!-- Parametros -->
            <?php for ($j = 0; $j < count($parametros_model); $j++) { ?>
                <div class="form-field clear">
                    <table style="margin-bottom:0px;">
                        <tr>
                            <td width="110">
                                <?php echo $form->label($parametros_model[$j][$idiomas[$i]->id], "[$j][" . $idiomas[$i]->id . "]valor", array('class' => 'form-label fl-space2')); ?>
                            </td>
                            <td><?php
                                switch ($parametros_model[$j][$idiomas[$i]->id]->parametro->tipo) {
                                    case 1:
                                        echo $form->textField($parametros_model[$j][$idiomas[$i]->id], "[$j][" . $idiomas[$i]->id . "]valor", array('maxlength' => 250));
                                        break;
                                    case 2:
                                        echo $form->textArea($parametros_model[$j][$idiomas[$i]->id], "[$j][" . $idiomas[$i]->id . "]valor");
                                        break;
                                    case 3:
                                        echo $form->textField($parametros_model[$j][$idiomas[$i]->id], "[$j][" . $idiomas[$i]->id . "]valor", array('class' => 'datepicker-inline', 'maxlength' => 16));
                                        break;
                                    case 4:
                                        echo $form->textArea($parametros_model[$j][$idiomas[$i]->id], "[$j][" . $idiomas[$i]->id . "]valor", array('class' => 'tinymce'));
                                        break;
                                }
                                ?></td>
                        </tr>
                    </table>
                </div>
            <?php } ?>

            <?php echo $form->hiddenField($idiomas_model[$i], "[$i]idiomas_id", array('value' => $idiomas[$i]->id)); ?>
        </div>
    <?php } ?>

    <div class="clear bt-space15"></div>

    <h3>Datos del contenido</h3>

    <div class="form-field clear">
        <?php echo $form->hiddenField($model, 'contenidos_categorias_id', array('value' => $_GET['cat'])); ?>
    </div>
    <div class="form-field clear" <?php if ($categoria->show_destacado == 0) { ?>style="display:none;"<?php } ?>>
        <?php echo $form->label($model, 'destacado', array('class' => 'form-label fl-space2')); ?>
        <?php echo $form->dropDownList($model, 'destacado', array(0 => 'No', 1 => 'Si')); ?>
    </div>
    <div class="form-field clear">
        <?php echo $form->label($model, 'fecha', array('class' => 'form-label fl-space2')); ?>
        <?php echo $form->textField($model, 'fecha', array('class' => 'datepicker-inline', 'maxlength' => 16)); ?>
    </div>
    <div class="form-field clear">
        <?php echo $form->label($model, 'activo', array('class' => 'form-label fl-space2')); ?>
        <?php echo $form->dropDownList($model, 'activo', array(0 => 'No', 1 => 'Si')); ?>
    </div>

    <div class="clear bt-space15"></div>

    <?php if (count($categorias) > 0) { ?>
        <h3>Categorias</h3>

        <?php getCategorias($categorias, 0, $categorias_edit); ?>

        <div class="clear bt-space15"></div>
    <?php } ?>

    <div id="boxArchivos" <?php if ($categoria->show_archivos == 0) { ?>style="display:none;"<?php } ?>>
        <h3>Subir archivos</h3>
        <?php
        $recortes = "180x180|120x112|166x54";
        $recortes_array = explode("|", $recortes);
        $this->widget(
                'ext.upload.RGUpload', array(
            "id" => "prueba_id",
            "extencions" => "jpg|png|gif",
            "controller" => "admin/upload",
            "action" => "upload",
            "recortes" => $recortes
                )
        );
        ?>

        <div class="listItems_edit">
            <ul>
                <?php for ($i = 0; $i < count($model->archivos); $i++) { ?>
                    <li>
                        <a href="javascript:deleteArchivo('<?php echo Yii::app()->request->baseUrl; ?>/admin/upload/deleteArchivo','<?php echo $model->archivos[$i]->archivo; ?>','<?php echo Yii::app()->request->baseUrl; ?>/upload/<?php echo $model->archivos[$i]->archivo; ?>');" class="deleteItem" onclick="return confirm('Eliminar?')"></a>
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/upload/<?php echo $model->archivos[$i]->archivo; ?>" />
                        <b>Realizar Recortes</b><br>
                        <?php for ($j = 0; $j < count($recortes_array); $j++) { ?>
                            <a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/upload/cropper?file=<?php echo base64_encode($model->archivos[$i]->archivo); ?>&size=<?php echo $recortes_array[$j]; ?>" class="crop fancybox-ajax-crop"><?php echo $recortes_array[$j]; ?></a>
                        <?php } ?>
                        <br><br><b>Ver Recortes</b><br>
                        <?php for ($j = 0; $j < count($recortes_array); $j++) { ?>
                            <a href="<?php echo Yii::app()->baseUrl . '/upload/' . $recortes_array[$j] . '/' . $model->archivos[$i]->archivo; ?>" class="crop fancybox"><?php echo $recortes_array[$j]; ?></a>
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

<script>
                                    $(document).ready(function(e) {
                                        asignLightbox();
                                    });

                                    function changeCheck(element) {
                                        if ($(element).is(":checked")) {
                                            $("#div_check_" + $(element).val() + " input[type='checkbox']").attr("checked", "checked");
                                            if ($("#cat" + $(element).attr("dep")).length > 0)
                                                selectPadre($("#cat" + $(element).attr("dep")));
                                        } else {
                                            $("#div_check_" + $(element).val() + " input[type='checkbox']").removeAttr("checked");
                                        }
                                    }

                                    function selectPadre(element) {
                                        $(element).attr("checked", "checked");
                                        if ($("#cat" + $(element).attr("dep")).length > 0)
                                            selectPadre($("#cat" + $(element).attr("dep")));
                                    }
</script>

</div><!-- form -->