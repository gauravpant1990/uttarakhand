<?php
/* @var $this PmUserController */
/* @var $model PmUser */

$this->breadcrumbs=array(
	'Pm Users'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Users', 'url'=>array('index')),
	array('label'=>'Manage Users', 'url'=>array('admin')),
);
?>

<h1>Create PmUser</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
