<?php
/* @var $this PmUserController */
/* @var $model PmUser */

$this->breadcrumbs=array(
	'Pm Users'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List PmUser', 'url'=>array('index')),
	array('label'=>'Create PmUser', 'url'=>array('create')),
	array('label'=>'View PmUser', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage PmUser', 'url'=>array('admin')),
);
?>

<h1>Update PmUser <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>