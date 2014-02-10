<?php
/* @var $this UsuariosController */
/* @var $data Usuarios */
?>

<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('usuarios_id')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->usuarios_id), array('view', 'id' => $data->usuarios_id)); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('paises_id')); ?>:</b>
    <?php echo CHtml::encode($data->paises_id); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('usuario')); ?>:</b>
    <?php echo CHtml::encode($data->usuario); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('pass')); ?>:</b>
    <?php echo CHtml::encode($data->pass); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
    <?php echo CHtml::encode($data->nombre); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('apellido')); ?>:</b>
    <?php echo CHtml::encode($data->apellido); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
    <?php echo CHtml::encode($data->email); ?>
    <br />

    <?php /*
      <b><?php echo CHtml::encode($data->getAttributeLabel('telefono')); ?>:</b>
      <?php echo CHtml::encode($data->telefono); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('direccion')); ?>:</b>
      <?php echo CHtml::encode($data->direccion); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('ciudad')); ?>:</b>
      <?php echo CHtml::encode($data->ciudad); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('provincia')); ?>:</b>
      <?php echo CHtml::encode($data->provincia); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('activo')); ?>:</b>
      <?php echo CHtml::encode($data->activo); ?>
      <br />

     */ ?>

</div>