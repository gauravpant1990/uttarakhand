<?php
/* @var $this DpQueryController */
/* @var $data DpQuery */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('query')); ?>:</b>
	<?php echo CHtml::encode($data->query); ?>
	<br />


</div>