<?php
/* @var $this PledgeProjectController */
/* @var $model PledgeProject */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'loan_status'); ?>
		<?php echo $form->textField($model,'loan_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'repayment_status'); ?>
		<?php echo $form->textField($model,'repayment_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'apply_amount'); ?>
		<?php echo $form->textField($model,'apply_amount',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'apr'); ?>
		<?php echo $form->textField($model,'apr'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'repayment_time'); ?>
		<?php echo $form->textField($model,'repayment_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'transaction_amount'); ?>
		<?php echo $form->textField($model,'transaction_amount',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'collection_days'); ?>
		<?php echo $form->textField($model,'collection_days'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'applytime'); ?>
		<?php echo $form->textField($model,'applytime'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'confirm_time'); ?>
		<?php echo $form->textField($model,'confirm_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'verifytime'); ?>
		<?php echo $form->textField($model,'verifytime'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'verify_remark'); ?>
		<?php echo $form->textField($model,'verify_remark',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->