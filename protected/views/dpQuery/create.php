<?php
/* @var $this DpQueryController */
/* @var $model DpQuery */

$this->breadcrumbs=array(
	'Dp Queries'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List DpQuery', 'url'=>array('index')),
	array('label'=>'Manage DpQuery', 'url'=>array('admin')),
);
?>

<h1>Create DpQuery</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>