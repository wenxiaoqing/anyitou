<?php
/* @var $this UserChannelController */
/* @var $model UserChannel */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id');?>
		<?php echo $form->textField($model,'id');?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'day'); ?>
		<?php echo $form->textField($model,'day',array('size'=>50,'maxlength'=>50)); ?>
	</div>
	<div class="row">
		<?php echo $form->label($model,'type'); ?>
		<?php echo $form->textField($model,'type',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'number'); ?>
		<?php echo $form->textField($model,'number',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'updatetime'); ?>
		<?php echo $form->textField($model,'updatetime'); ?>
	</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton('Search');?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->