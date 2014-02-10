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
$label=$this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	'$label'=>array('index'),
	'Nuevo',
);\n";
?>

/*$this->menu=array(
	array('label'=>'List <?php echo $this->modelClass; ?>', 'url'=>array('index')),
	array('label'=>'Manage <?php echo $this->modelClass; ?>', 'url'=>array('admin')),
);*/
?>

<h1><?php echo $this->class2name($this->modelClass); ?></h1>

<p></p>

<div class="content-box">
	<div class="box-body">
		<div class="box-header clear">
        	<h2>Crear <?php echo $this->modelClass; ?></h2>
        </div>
        <div class="box-wrap clear">
			<?php echo "<?php echo \$this->renderPartial('_form', array('model'=>\$model)); ?>"; ?>
        </div>
	</div>
</div>