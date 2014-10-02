<?php
/* @var $this DpUserController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Dp Users',
);

$this->menu=array(
	array('label'=>'Create DpUser', 'url'=>array('create')),
	array('label'=>'Manage DpUser', 'url'=>array('admin')),
);
?>

<h1>Dp Users</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
