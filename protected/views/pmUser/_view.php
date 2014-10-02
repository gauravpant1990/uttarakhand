<?php
/* @var $this PmUserController */
/* @var $data PmUser */
?>

<div class="view">

	<!--<b><?php //echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>-->
	<?php echo CHtml::link(CHtml::encode('View User'/*$data->id*/), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('first_name')); ?>:</b>
	<?php echo CHtml::encode($data->first_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('last_name')); ?>:</b>
	<?php echo CHtml::encode($data->last_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('unique_id')); ?>:</b>
	<?php echo CHtml::encode($data->unique_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lft')); ?>:</b>
	<?php echo CHtml::encode($data->lft); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rht')); ?>:</b>
	<?php echo CHtml::encode($data->rht); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('level')); ?>:</b>
	<?php echo CHtml::encode($data->level); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('password')); ?>:</b>
	<?php echo CHtml::encode($data->password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('successor')); ?>:</b>
	<?php echo CHtml::encode($data->successor); ?>
	<br />

	*/ ?>

</div>
