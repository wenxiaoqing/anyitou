<?php
/* @var $this CouponClassController */
/* @var $model CouponClass */
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
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pic_link'); ?>
		<?php echo $form->textField($model,'pic_link',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'category'); ?>
		<?php echo $form->textField($model,'category',array('size'=>8,'maxlength'=>8)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'price'); ?>
		<?php echo $form->textField($model,'price',array('size'=>8,'maxlength'=>8)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'begin_time'); ?>
		<?php echo $form->textField($model,'begin_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'delay'); ?>
		<?php echo $form->textField($model,'delay'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'num'); ?>
		<?php echo $form->textField($model,'num'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'descript'); ?>
		<?php echo $form->textArea($model,'descript',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'part_use'); ?>
		<?php echo $form->textField($model,'part_use'); ?>
	</div>
	<div class="row">
		<?php echo $form->label($model,'small_pic_link'); ?>
		<?php echo $form->textField($model,'small_pic_link'); ?>
	</div>
	<div class="row">
		<?php echo $form->label($model,'use_rules'); ?>
		<?php echo $form->textField($model,'use_rules'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->