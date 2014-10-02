<?php
/* @var $this PmUserController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Pm Users',
);

$this->menu=array(
	array('label'=>'Create New User', 'url'=>array('create')),
	//array('label'=>'Manage PmUser', 'url'=>array('admin')),
);
?>

<h1>My Users</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
