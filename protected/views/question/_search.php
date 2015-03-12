<?php
/* @var $this QuestionController */
/* @var $model Questionnaire */
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
		<?php echo $form->label($model,'q_title'); ?>
		<?php echo $form->textField($model,'q_title',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'q_answer'); ?>
		<?php echo $form->textField($model,'q_answer',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'q_category'); ?>
		<?php echo $form->textField($model,'q_category'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'q_type'); ?>
		<?php echo $form->textField($model,'q_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'q_sort'); ?>
		<?php echo $form->textField($model,'q_sort'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'q_status'); ?>
		<?php echo $form->textField($model,'q_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'q_answer_long'); ?>
		<?php echo $form->textField($model,'q_answer_long'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'add_time'); ?>
		<?php echo $form->textField($model,'add_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'update_time'); ?>
		<?php echo $form->textField($model,'update_time'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->