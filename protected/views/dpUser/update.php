<?php
/* @var $this DpUserController */
/* @var $model DpUser */

$this->breadcrumbs=array(
	'Dp Users'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List DpUser', 'url'=>array('index')),
	array('label'=>'Create DpUser', 'url'=>array('create')),
	array('label'=>'View DpUser', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage DpUser', 'url'=>array('admin')),
);
?>

<h1>Update DpUser <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>