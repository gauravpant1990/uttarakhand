<?php
/* @var $this DpQueryController */
/* @var $model DpQuery */

$this->breadcrumbs=array(
	'Dp Queries'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List DpQuery', 'url'=>array('index')),
	array('label'=>'Create DpQuery', 'url'=>array('create')),
	array('label'=>'View DpQuery', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage DpQuery', 'url'=>array('admin')),
);
?>

<h1>Update DpQuery <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>