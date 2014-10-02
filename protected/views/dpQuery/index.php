<?php
/* @var $this DpQueryController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Dp Queries',
);

$this->menu=array(
	array('label'=>'Create DpQuery', 'url'=>array('create')),
	array('label'=>'Manage DpQuery', 'url'=>array('admin')),
);
?>

<h1>Dp Queries</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
