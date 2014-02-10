<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php echo "<?php\n"; ?>
/* @var $this <?php echo $this->getControllerClass(); ?> */
/* @var $model <?php echo $this->getModelClass(); ?> */

<?php
$nameColumn=$this->guessNameColumn($this->tableSchema->columns);
$label=$this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	'$label'=>array('index'),
	\$model->{$nameColumn},
);\n";
?>

/*$this->menu=array(
	array('label'=>'List <?php echo $this->modelClass; ?>', 'url'=>array('index')),
	array('label'=>'Create <?php echo $this->modelClass; ?>', 'url'=>array('create')),
	array('label'=>'Update <?php echo $this->modelClass; ?>', 'url'=>array('update', 'id'=>$model-><?php echo $this->tableSchema->primaryKey; ?>)),
	array('label'=>'Delete <?php echo $this->modelClass; ?>', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model-><?php echo $this->tableSchema->primaryKey; ?>),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage <?php echo $this->modelClass; ?>', 'url'=>array('admin')),
);*/
?>

<h1><?php echo $this->class2name($this->modelClass); ?></h1>

<p></p>

<div class="content-box">
	<div class="box-body">
		<div class="box-header clear">
        	<h2>Detalle <?php echo $this->modelClass; ?>:</h2>
        </div>
        <div class="box-wrap clear">
			
			<h3>Opciones</h3>
			<div class="clear" style="margin-bottom:15px;">
				<?php echo "<?php echo CHtml::link('Regresar al Listado',array('admin/".strtolower($this->modelClass)."/index'),array('class'=>'button blue fl', 'style'=>'margin-right:10px;')); ?>"; ?>
				<?php echo "<?php echo CHtml::link('Crear Nuevo',array('admin/".strtolower($this->modelClass)."/create'),array('class'=>'button blue fl', 'style'=>'margin-right:10px;')); ?>"; ?>
				<?php echo "<?php "; ?>echo CHtml::link('Editar Registro',array('admin/<?php echo strtolower($this->modelClass); ?>/update/id/'.$model->id),array('class'=>'button blue fl'));<?php echo " ?>"; ?>
			</div>
			
			<h3>Detalle</h3>
			<?php echo "<?php"; ?> $this->widget('zii.widgets.CDetailView', array(
                'data'=>$model,
                'attributes'=>array(
            <?php
            foreach($this->tableSchema->columns as $column)
                echo "\t\t'".$column->name."',\n";
            ?>
                ),
            )); ?>
        </div>
	</div>
</div>