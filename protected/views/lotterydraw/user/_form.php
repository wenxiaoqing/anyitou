<?php
/* @var $this LotterydrawUserController */
/* @var $model LotterydrawUser */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'lotterydraw-user-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'event_id'); ?>
		<?php echo $form->textField($model,'event_id',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'event_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'chance'); ?>
		<?php echo $form->textField($model,'chance'); ?>
		<?php echo $form->error($model,'chance'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tried_num'); ?>
		<?php echo $form->textField($model,'tried_num'); ?>
		<?php echo $form->error($model,'tried_num'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'win_number'); ?>
		<?php echo $form->textField($model,'win_number'); ?>
		<?php echo $form->error($model,'win_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'updatetime'); ?>
		<?php echo $form->textField($model,'updatetime'); ?>
		<?php echo $form->error($model,'updatetime'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->