<?php
/* @var $this LotterydrawPrizesController */
/* @var $model LotterydrawPrizes */
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
		<?php echo $form->label($model,'event_id'); ?>
		<?php echo $form->textField($model,'event_id',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'type'); ?>
		<?php echo $form->textField($model,'type',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'level'); ?>
		<?php echo $form->textField($model,'level'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'order'); ?>
		<?php echo $form->textField($model,'order'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pic_url'); ?>
		<?php echo $form->textField($model,'pic_url',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'chance'); ?>
		<?php echo $form->textField($model,'chance'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'money'); ?>
		<?php echo $form->textField($model,'money',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>1000)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'remain'); ?>
		<?php echo $form->textField($model,'remain'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'winning_number'); ?>
		<?php echo $form->textField($model,'winning_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'out_number'); ?>
		<?php echo $form->textField($model,'out_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rules'); ?>
		<?php echo $form->textField($model,'rules',array('size'=>60,'maxlength'=>2048)); ?>
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