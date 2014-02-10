<?php
/* @var $this ContenidosCategoriasController */
/* @var $model ContenidosCategorias */
/* @var $form CActiveForm */

$categorias = CHtml::listData(ContenidosCategorias::model()->findAll(), 'id', 'nombre');
array_unshift($categorias, 'Ninguna');
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'contenidos-categorias-form',
        'enableAjaxValidation' => false,
    ));
    ?>

    <?php echo $form->errorSummary($model); ?>

    <h3>Datos</h3>

    <div class="form-field clear">
        <?php echo $form->label($model, 'contenidos_categorias_id', array('class' => 'form-label fl-space2')); ?>
        <?php echo $form->dropDownList($model, 'contenidos_categorias_id', $categorias, array('onChange' => 'changeSelect(this)')); ?>
    </div>
    <div class="form-field clear">
        <?php echo $form->label($model, 'nombre', array('class' => 'form-label fl-space2')); ?>
        <?php echo $form->textField($model, 'nombre', array('size' => 60, 'maxlength' => 100)); ?>
    </div>
    <div class="form-field clear">
        <?php echo $form->label($model, 'activo', array('class' => 'form-label fl-space2')); ?>
        <?php echo $form->dropDownList($model, 'activo', array(0 => "No", 1 => "Si")); ?>
    </div>

    <div class="clear bt-space15"></div>

    <h3>Atributos del contenido</h3>
    <div class="form-field clear">
        <?php echo $form->label($model, 'show_copete', array('class' => 'form-label fl-space2')); ?>
        <?php echo $form->dropDownList($model, 'show_copete', array(0 => "No", 1 => "Si")); ?>
    </div>
    <div class="form-field clear">
        <?php echo $form->label($model, 'show_descripcion', array('class' => 'form-label fl-space2')); ?>
        <?php echo $form->dropDownList($model, 'show_descripcion', array(0 => "No", 1 => "Si")); ?>
    </div>
    <div class="form-field clear">
        <?php echo $form->label($model, 'show_destacado', array('class' => 'form-label fl-space2')); ?>
        <?php echo $form->dropDownList($model, 'show_destacado', array(0 => "No", 1 => "Si")); ?>
    </div>
    <div class="form-field clear">
        <?php echo $form->label($model, 'show_archivos', array('class' => 'form-label fl-space2')); ?>
        <?php echo $form->dropDownList($model, 'show_archivos', array(0 => "No", 1 => "Si")); ?>
    </div>

    <div id="boxParams" <?php if ($model->contenidos_categorias_id != 0) { ?>style="display:none;"<?php } ?>>
        <div class="clear bt-space15"></div>
        <h3>Parámetros (sólo categorías principales)</h3>
        <div class="form-field clear">
            <table style="margin-bottom:0px;">
                <tr>
                    <td width="135"></td>
                    <td>
                        <?php for ($i = 0; $i < count($parametros); $i++) { ?>
                            <div class="form-checkbox-item clear">
                                <input <?php if (in_array($parametros[$i]->id, $model->getParamsId())) { ?>checked<?php } ?> value="<?php echo $parametros[$i]->id; ?>" id="param<?php echo $parametros[$i]->id; ?>" class="checkbox fl-space" type="checkbox" name="param[]" rel="checkboxvert">
                                <label class="fl" for="param<?php echo $parametros[$i]->id; ?>"><?php echo $parametros[$i]->nombre; ?></label>
                            </div>
                        <?php } ?>
                    </td>
                </tr>
            </table>
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

<script type="text/javascript">
    function changeSelect(element) {
        if ($(element).val() != 0) {
            $("#boxParams").hide();
            $("#boxParams input").removeAttr("checked");
        } else {
            $("#boxParams").show();
        }
    }
</script>