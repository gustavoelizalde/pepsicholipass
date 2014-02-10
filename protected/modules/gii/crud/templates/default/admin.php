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
echo "\$this->breadcrumbs=array(
	'$label',
);\n";
?>

/*$this->menu=array(
	array('label'=>'List <?php echo $this->modelClass; ?>', 'url'=>array('index')),
	array('label'=>'Create <?php echo $this->modelClass; ?>', 'url'=>array('create')),
);*/

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('<?php echo $this->class2id($this->modelClass); ?>-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo $this->class2name($this->modelClass); ?></h1>

<p></p>

<div class="content-box">
	<div class="box-body">
		<div class="box-header clear">
        	<h2>Administrar <?php echo $this->pluralize($this->class2name($this->modelClass)); ?></h2>
        </div>
        <div class="box-wrap clear">
        	<p>Si lo desea, puede introducir un operador de comparación (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) al principio de cada uno de los valores de búsqueda para especificar cómo la comparación se debe hacer.</p>
			
            <div class="clear" style="margin-bottom:20px;">
            	<h3>Opciones</h3>
				<div class="clear">
					<?php echo "<?php echo CHtml::button('Búsqueda Avanzada',array('class'=>'search-button button blue fl','style'=>'margin-right:10px;')); ?>"; ?>
                    <?php echo "<?php echo CHtml::link('Crear Nuevo',array('".strtolower($this->modelClass)."/create'),array('class'=>'button blue fl')); ?>"; ?>
				</div>
                
				<div class="search-form" style="display:none; padding-top:15px; border-bottom:#CCC dotted 1px; border-top:#CCC dotted 1px; padding-bottom:10px; margin-top:10px;">
				<?php echo "<?php \$this->renderPartial('_search',array(
                    'model'=>\$model,
                )); ?>\n"; ?>
                </div><!-- search-form -->
			</div>
            
            <h3>Listado</h3>
            
			<?php echo "<?php"; ?> $this->widget('zii.widgets.grid.CGridView', array(
                'id'=>'<?php echo $this->class2id($this->modelClass); ?>-grid',
                'dataProvider'=>$model->search(),
                'filter'=>$model,
                'columns'=>array(
            <?php
            $count=0;
            foreach($this->tableSchema->columns as $column)
            {
                if(++$count==7)
                    echo "\t\t/*\n";
                echo "\t\t'".$column->name."',\n";
            }
            if($count>=7)
                echo "\t\t*/\n";
            ?>
                    array(
                        'class'=>'CButtonColumn',
                        'template'=>'{update}{delete}'
                    ),
                ),
            )); ?>
    	</div>
	</div>
</div>