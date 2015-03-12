<?php
/* @var $this PledgeBuyController */
/* @var $model PledgeBuy */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pledge-buy-form',
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
		<?php echo $form->labelEx($model,'project_id'); ?>
		<?php echo $form->textField($model,'project_id',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'project_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'trade_no'); ?>
		<?php echo $form->textField($model,'trade_no',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'trade_no'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'loan_status'); ?>
		<?php echo $form->textField($model,'loan_status'); ?>
		<?php echo $form->error($model,'loan_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'repayment_status'); ?>
		<?php echo $form->textField($model,'repayment_status'); ?>
		<?php echo $form->error($model,'repayment_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'amount'); ?>
		<?php echo $form->textField($model,'amount',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'amount'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'interest'); ?>
		<?php echo $form->textField($model,'interest',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'interest'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'repayed_capital'); ?>
		<?php echo $form->textField($model,'repayed_capital',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'repayed_capital'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'payed_interest'); ?>
		<?php echo $form->textField($model,'payed_interest',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'payed_interest'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'buytime'); ?>
		<?php echo $form->textField($model,'buytime'); ?>
		<?php echo $form->error($model,'buytime'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'response_data'); ?>
		<?php echo $form->textArea($model,'response_data',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'response_data'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->