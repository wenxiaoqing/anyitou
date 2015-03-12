<?php
/* @var $this SystemConfigController */
/* @var $model SystemConfig */
/* @var $form CActiveForm */
?>

<div class="form form-horizontal">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'system-config-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">带<span class="required">*</span>号的为必填项.</p>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'scope', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<?php echo $form->textField($model, 'scope', array('class' => 'form-control col-sm-4 isrequired', 'size'=>20,'maxlength'=>20)); ?>
		</div>
		<div class="col-sm-5 control-info"><?php echo $form->error($model,'scope'); ?></div>
	</div>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'variable', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<?php echo $form->textField($model, 'variable', array('class' => 'form-control col-sm-4 isrequired', 'size'=>50,'maxlength'=>50)); ?>
		</div>
		<div class="col-sm-5 control-info"><?php echo $form->error($model,'variable'); ?></div>
	</div>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'value', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<?php echo $form->textField($model, 'value', array('class' => 'form-control col-sm-4 isrequired', 'size'=>60,'maxlength'=>200)); ?>
		</div>
		<div class="col-sm-5 control-info"><?php echo $form->error($model,'value'); ?></div>
	</div>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'description', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<?php echo $form->textArea($model, 'description', array('class' => 'form-control col-sm-4 isrequired', 'size'=>60,'maxlength'=>255)); ?>
		</div>
		<div class="col-sm-5 control-info"><?php echo $form->error($model,'description'); ?></div>
	</div>

	<div class="form-group">
		<div class="col-sm-2"></div>
		<div class="col-sm-10">
			<?php echo CHtml::submitButton('添加系统配置', array('class' => 'btn btn-large btn-primary', 'id' => 'submitBtn')); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->