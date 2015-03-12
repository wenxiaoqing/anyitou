<?php
/* @var $this ChannelController */
/* @var $model CmsChannel */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cms-channel-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('class' => 'form-horizontal', 'role' => 'form'),
)); ?>
	<div class="form-body">
		<div class="form-group">
			<?php echo $form->labelEx($model,'name', array('class'=>'col-md-1 control-label')); ?>
			<div class="col-md-6" >
				<?php echo $form->textField($model, 'name', array('maxlength'=>255, 'class'=>'form-control col-sm-5')); ?>
				<?php echo $form->error($model, 'name', array('class'=>'text-field control-info col-sm-10')); ?>
			</div>
			<div class="hint control-info col-md-5"><?php echo Rights::t('core', 'Do not change the name unless you know what you are doing.'); ?></div>
		</div>
		<div class="form-group">
			<?php echo $form->labelEx($model,'description', array('class'=>'col-md-1 control-label')); ?>
			<div class="col-md-6" >
				<?php echo $form->textField($model, 'description', array('maxlength'=>255, 'class'=>'form-control col-sm-5')); ?>
				<?php echo $form->error($model, 'description', array('class'=>'text-field control-info col-sm-10')); ?>
			</div>
			<div class="hint control-info col-md-5"><?php echo Rights::t('core', 'A descriptive name for this item.'); ?></div>
		</div>
		<?php if( Rights::module()->enableBizRule===true ): ?>
		<div class="form-group">
			<?php echo $form->labelEx($model,'bizRule', array('class'=>'col-md-1 control-label')); ?>
			<div class="col-md-6" >
				<?php echo $form->textField($model, 'bizRule', array('maxlength'=>255, 'class'=>'form-control col-sm-5')); ?>
				<?php echo $form->error($model, 'bizRule', array('class'=>'text-field control-info col-sm-10')); ?>
			</div>
			<div class="hint control-info col-md-5"><?php echo Rights::t('core', 'Code that will be executed when performing access checking.'); ?></div>
		</div>
		<?php endif; ?>
		<?php if( Rights::module()->enableBizRule===true && Rights::module()->enableBizRuleData ): ?>
		<div class="form-group">
			<?php echo $form->labelEx($model,'data', array('class'=>'col-md-1 control-label')); ?>
			<div class="col-md-6" >
				<?php echo $form->textField($model, 'data', array('maxlength'=>255, 'class'=>'form-control col-sm-5')); ?>
				<?php echo $form->error($model, 'data', array('class'=>'text-field control-info col-sm-10')); ?>
			</div>
			<div class="hint control-info col-md-5"><?php echo Rights::t('core', 'Additional data available when executing the business rule.'); ?></div>
		</div>
		<?php endif; ?>
	</div>
	<div class="form-actions fluid">
		<div class="col-md-offset-1 col-md-10">
			<?php echo CHtml::submitButton(Rights::t('core', 'Save'), array('class' => 'btn btn-primary')); ?> | <?php echo CHtml::link(Rights::t('core', 'Cancel'), Yii::app()->user->rightsReturnUrl, array('class' => 'btn btn-default')); ?>               
		</div>
	</div>
<?php $this->endWidget(); ?>