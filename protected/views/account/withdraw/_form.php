<?php
/* @var $this UserCashOutController */
/* @var $model UserCashOut */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-cash-out-form',
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
		<?php echo $form->labelEx($model,'bank_id'); ?>
		<?php echo $form->textField($model,'bank_id'); ?>
		<?php echo $form->error($model,'bank_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'card_no'); ?>
		<?php echo $form->textField($model,'card_no',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'card_no'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cash_out_amount'); ?>
		<?php echo $form->textField($model,'cash_out_amount',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'cash_out_amount'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'get_cash'); ?>
		<?php echo $form->textField($model,'get_cash',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'get_cash'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'befor_amount'); ?>
		<?php echo $form->textField($model,'befor_amount',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'befor_amount'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'after_amount'); ?>
		<?php echo $form->textField($model,'after_amount',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'after_amount'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fee'); ?>
		<?php echo $form->textField($model,'fee',array('size'=>6,'maxlength'=>6)); ?>
		<?php echo $form->error($model,'fee'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cash_out_time'); ?>
		<?php echo $form->textField($model,'cash_out_time'); ?>
		<?php echo $form->error($model,'cash_out_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'desc'); ?>
		<?php echo $form->textField($model,'desc',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'desc'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->