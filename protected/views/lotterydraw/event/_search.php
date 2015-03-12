<?php
/* @var $this LotterydrawEventController */
/* @var $model LotterydrawEvent */
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
		<?php echo $form->label($model,'nid'); ?>
		<?php echo $form->textField($model,'nid',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'type'); ?>
		<?php echo $form->textField($model,'type',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'starttime'); ?>
		<?php echo $form->textField($model,'starttime'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'expirtdate'); ?>
		<?php echo $form->textField($model,'expirtdate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'all_islucky'); ?>
		<?php echo $form->textField($model,'all_islucky'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'credit_value'); ?>
		<?php echo $form->textField($model,'credit_value',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cycle'); ?>
		<?php echo $form->textField($model,'cycle'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'interval'); ?>
		<?php echo $form->textField($model,'interval',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'max_chance'); ?>
		<?php echo $form->textField($model,'max_chance'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'template'); ?>
		<?php echo $form->textField($model,'template',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'addtime'); ?>
		<?php echo $form->textField($model,'addtime'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'addip'); ?>
		<?php echo $form->textField($model,'addip',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->