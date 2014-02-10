<?php
$this->pageTitle = Yii::app()->name . 'Noticias';
$this->breadcrumbs = array(
    'Noticias',
);
?>

<h1>Noticias</h1><h2 style="float: right;"><?php echo CHtml::link('Nueva noticia', 'insertar'); ?></h2>

<p>Listado de noticias:</p>

<table>
    <tr>
        <th>Id</th>
        <th>T&iacute;tulo</th>
        <th>Contenido</th>
        <th>Opciones</th>
    </tr>
    <?php foreach ($noticias as $n) { 
        
        ?>
        <tr>
            <td><?php echo $n->noticias_id; ?></td>
            <td><?php echo $n->titulo; ?></td>
            <td><?php echo $n->contenido; ?></td>
            <td>
                <?php echo CHtml::link('Editar', 'editar?id=' . $n->noticias_id) . " | " . CHtml::link('Eliminar', 'eliminar?id=' . $n->noticias_id); ?>
            </td>
        </tr>
    <?php } ?>
</table>

<?php $this->widget('ext.LanguagePicker.ELangPick', array(
    'excludeFromList' => array(), // list of languages to exclude from list
    'pickerType' => 'dropdown',              // buttons, links, dropdown
)); ?>