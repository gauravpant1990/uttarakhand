<?php
/* @var $this DpUserController */
/* @var $model DpUser */

$this->breadcrumbs=array(
	'Dp Users'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List DpUser', 'url'=>array('index')),
	array('label'=>'Manage DpUser', 'url'=>array('admin')),
);
?>

<h1>Create DpUser</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>