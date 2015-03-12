<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form form-horizontal">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">带<span class="required">*</span>号的为必填项.</p>

	<div class="form-group">
		<?php echo $form->labelEx($model,'user_name', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<?php echo $form->textField($model, 'user_name', array('class' => 'form-control col-sm-4 isrequired', 'size'=>20,'maxlength'=>20)); ?>
		</div>
		<div class="col-sm-5 control-info">
		<?php echo $form->error($model,'user_name'); ?>
		</div>
	</div>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'real_name', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<?php echo $form->textField($model, 'real_name', array('class' => 'form-control col-sm-4 isrequired', 'size'=>20,'maxlength'=>20)); ?>
		</div>
		<div class="col-sm-5 control-info"><?php echo $form->error($model,'real_name'); ?></div>
	</div>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'mobile', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<?php echo $form->textField($model, 'mobile', array('class' => 'form-control col-sm-4 isrequired', 'size'=>20,'maxlength'=>20)); ?>
		</div>
		<div class="col-sm-5 control-info"><?php echo $form->error($model,'mobile'); ?></div>
	</div>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'email', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<?php echo $form->textField($model, 'email', array('class' => 'form-control col-sm-4 isrequired', 'size'=>20,'maxlength'=>20)); ?>
		</div>
		<div class="col-sm-5 control-info"><?php echo $form->error($model,'email'); ?></div>
	</div>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'password', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<?php echo $form->passwordField($model, 'password', array('class' => 'form-control col-sm-4 isrequired', 'size'=>50,'maxlength'=>50)); ?>
		</div>
		<div class="col-sm-5 control-info"><?php echo $form->error($model,'password'); ?></div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-2"></div>
		<div class="col-sm-10">
			<?php echo CHtml::submitButton($model->isNewRecord ? '添加新用户' : '保存更改', array('class' => 'btn btn-large btn-primary', 'id' => 'submitBtn')); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->