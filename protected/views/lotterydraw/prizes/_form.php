<?php
/* @var $this LotterydrawPrizesController */
/* @var $model LotterydrawPrizes */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'lotterydraw-prizes-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'event_id'); ?>
		<?php echo $form->textField($model,'event_id',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'event_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->textField($model,'type',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'level'); ?>
		<?php echo $form->textField($model,'level'); ?>
		<?php echo $form->error($model,'level'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'order'); ?>
		<?php echo $form->textField($model,'order'); ?>
		<?php echo $form->error($model,'order'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pic_url'); ?>
		<?php echo $form->textField($model,'pic_url',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'pic_url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'chance'); ?>
		<?php echo $form->textField($model,'chance'); ?>
		<?php echo $form->error($model,'chance'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'money'); ?>
		<?php echo $form->textField($model,'money',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'money'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>1000)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'remain'); ?>
		<?php echo $form->textField($model,'remain'); ?>
		<?php echo $form->error($model,'remain'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'winning_number'); ?>
		<?php echo $form->textField($model,'winning_number'); ?>
		<?php echo $form->error($model,'winning_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'out_number'); ?>
		<?php echo $form->textField($model,'out_number'); ?>
		<?php echo $form->error($model,'out_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rules'); ?>
		<?php echo $form->textField($model,'rules',array('size'=>60,'maxlength'=>2048)); ?>
		<?php echo $form->error($model,'rules'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'addtime'); ?>
		<?php echo $form->textField($model,'addtime'); ?>
		<?php echo $form->error($model,'addtime'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'addip'); ?>
		<?php echo $form->textField($model,'addip',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'addip'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->