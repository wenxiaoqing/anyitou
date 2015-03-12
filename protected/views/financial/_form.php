<?php
/* @var $this FinancialManagementController */
/* @var $model UserCashLog */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-cash-log-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'category'); ?>
		<?php echo $form->textField($model,'category',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'category'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'trans_id'); ?>
		<?php echo $form->textField($model,'trans_id',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'trans_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cash_status'); ?>
		<?php echo $form->textField($model,'cash_status'); ?>
		<?php echo $form->error($model,'cash_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cash_num'); ?>
		<?php echo $form->textField($model,'cash_num',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'cash_num'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'use_money'); ?>
		<?php echo $form->textField($model,'use_money',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'use_money'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'deal_time'); ?>
		<?php echo $form->textField($model,'deal_time'); ?>
		<?php echo $form->error($model,'deal_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->