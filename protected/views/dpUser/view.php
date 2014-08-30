<?php
/* @var $this DpUserController */
/* @var $model DpUser */

$this->breadcrumbs=array(
	'Dp Users'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List DpUser', 'url'=>array('index')),
	array('label'=>'Create DpUser', 'url'=>array('create')),
	array('label'=>'Update DpUser', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete DpUser', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage DpUser', 'url'=>array('admin')),
);
?>

<h1>View DpUser #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'email',
		'frequency',
	),
)); ?>
