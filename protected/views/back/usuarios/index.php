<?php
/* @var $this UsuariosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    '',
);

$this->menu = array(
    array('label' => 'Create Usuarios', 'url' => array('create')),
    array('label' => 'Manage Usuarios', 'url' => array('admin')),
);
?>

<h1>Usuarios</h1>

<?php
$this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
));
?>