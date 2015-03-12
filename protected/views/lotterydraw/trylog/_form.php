<?php
/* @var $this LotterydrawTryLogController */
/* @var $model LotterydrawTryLog */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'lotterydraw-try-log-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'event_id'); ?>
		<?php echo $form->textField($model,'event_id',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'event_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'iswinner'); ?>
		<?php echo $form->textField($model,'iswinner'); ?>
		<?php echo $form->error($model,'iswinner'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'prize_id'); ?>
		<?php echo $form->textField($model,'prize_id',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'prize_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'remark'); ?>
		<?php echo $form->textField($model,'remark',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'remark'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'givetime'); ?>
		<?php echo $form->textField($model,'givetime'); ?>
		<?php echo $form->error($model,'givetime'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'addtime'); ?>
		<?php echo $form->textField($model,'addtime'); ?>
		<?php echo $form->error($model,'addtime'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'addip'); ?>
		<?php echo $form->textField($model,'addip',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'addip'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->