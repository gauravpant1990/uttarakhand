<?php
/* @var $this DpUserController */
/* @var $model DpUser */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'dp-main-form',
	'action'=>'/index.php/Site/create',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($userModel); ?>
	<?php echo $form->errorSummary($queryModel); ?>

	<div class="row">
		<?php echo $form->labelEx($queryModel,'query'); ?>
		<?php echo $form->textArea($queryModel,'query',array('size'=>100,'maxlength'=>100,'placeholder'=>'Type your query here','style'=>'width:60%;height:50px')); ?>
		<?php echo $form->error($queryModel,'query'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($userModel,'email'); ?>
		<?php echo $form->textField($userModel,'email',array('size'=>45,'maxlength'=>45,'placeholder'=>'Your Email Address')); ?>
		<?php echo $form->error($userModel,'email'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($queryModel->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
