<?php
/* @var $this ContenidosController */
/* @var $model Contenidos */

$this->breadcrumbs=array(
	ContenidosCategorias::model()->findByPk($_GET['cat'])->nombre => Yii::app()->createUrl('contenidos/index',array("cat"=>$_GET["cat"])),
	$_GET['id'],
	'Editar',
);

/*$this->menu=array(
	array('label'=>'List Contenidos', 'url'=>array('index')),
	array('label'=>'Create Contenidos', 'url'=>array('create')),
	array('label'=>'View Contenidos', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Contenidos', 'url'=>array('admin')),
);*/
?>

<h1>Contenidos</h1>

<p></p>

<div class="content-box">
	<div class="box-body">
		<div class="box-header clear">
        	<h2>Editar Contenidos:</h2>
			
			<ul class="tabs clear">
			<?php for($i=0; $i<count($idiomas); $i++){ ?>
				<li><a href="#idiomas_<?php echo $idiomas[$i]->id; ?>"><?php echo $idiomas[$i]->nombre; ?></a></li>
			<?php } ?>
			</ul>
        </div>
        <div class="box-wrap clear">
			<?php echo $this->renderPartial('_form', array('model'=>$model,'idiomas'=>$idiomas,'idiomas_model'=>$idiomas_model,'parametros_model'=>$parametros_model)); ?>
		</div>
	</div>
</div>