<?php
/* @var $this UserCouponController */
/* @var $model UserCoupon */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'coupon_id'); ?>
		<?php echo $form->textField($model,'coupon_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'give_time'); ?>
		<?php echo $form->textField($model,'give_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'use_status'); ?>
		<?php echo $form->textField($model,'use_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'used_money'); ?>
		<?php echo $form->textField($model,'used_money',array('size'=>5,'maxlength'=>5)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'item_id'); ?>
		<?php echo $form->textField($model,'item_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'use_time'); ?>
		<?php echo $form->textField($model,'use_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'begin_time'); ?>
		<?php echo $form->textField($model,'begin_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'end_time'); ?>
		<?php echo $form->textField($model,'end_time'); ?>
	</div>
	<div class="row">
		<?php echo $form->label($model,'source_type'); ?>
		<?php echo $form->textField($model,'source_type'); ?>
	</div>
	<div class="row">
		<?php echo $form->label($model,'source_id'); ?>
		<?php echo $form->textField($model,'source_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->