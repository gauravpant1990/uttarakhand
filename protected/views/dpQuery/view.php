<?php
/* @var $this DpQueryController */
/* @var $model DpQuery */

$this->breadcrumbs=array(
	'Dp Queries'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List DpQuery', 'url'=>array('index')),
	array('label'=>'Create DpQuery', 'url'=>array('create')),
	array('label'=>'Update DpQuery', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete DpQuery', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage DpQuery', 'url'=>array('admin')),
);
?>

<h1>View DpQuery #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'query',
	),
)); ?>
