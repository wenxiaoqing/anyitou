<?php
/* @var $this UserChannelController */
/* @var $model UserChannel */
/* @var $form CActiveForm */
?>
<div class="form form-horizontal">
	<?php $form=$this->beginWidget('CActiveForm', array(
    	'id'=>'user-channel-reg-form',
    	'enableAjaxValidation'=>true,
	    'errorMessageCssClass' => 'help-block',
    )); ?>
		<div class="form-body">
			<div class="form-group">
				<?php echo $form->labelEx($model,'day', array('class'=>'col-md-2 control-label')); ?>
				<div class="col-md-10">
					<?php echo $form->textField($model, 'day', array('class' => 'form-control input-large isrequired', 'size'=>30,'maxlength'=>30)); ?>
					<?php echo $form->error($model,'day', array('class'=>'help-block' )); ?>
				</div>
			</div>
			<div class="form-group">
				<?php echo $form->labelEx($model,'type', array('class'=>'col-md-2 control-label')); ?>
				<div class="col-md-10">
					<?php echo $form->textField($model, 'type', array('class' => 'form-control input-large isrequired', 'size'=>30,'maxlength'=>30)); ?>
					<?php echo $form->error($model,'type', array('class'=>'help-block' )); ?>
				</div>
			</div>
			<div class="form-group">
				<?php echo $form->labelEx($model,'number', array('class'=>'col-md-2 control-label')); ?>
				<div class="col-md-10">
					<?php echo $form->textField($model, 'number', array('class' => 'form-control input-large isrequired', 'size'=>30,'maxlength'=>30)); ?>
					<?php echo $form->error($model,'number', array('class'=>'help-block' )); ?>
				</div>
			</div>
			<div class="form-group">
				<?php echo $form->labelEx($model,'updatetime', array('class'=>'col-md-2 control-label')); ?>
				<div class="col-md-10">
					<?php echo $form->dropDownList($model, 'updatetime'); ?>
					<?php echo $form->error($model,'updatetime', array('class'=>'help-block' )); ?>
				</div>
			</div>
			
			<div class="form-group">
    			<div class="col-md-offset-2 col-md-10">
    				<?php echo CHtml::submitButton($model->isNewRecord ? '添加渠道' : '保存渠道', array('class' => 'btn blue')); ?>
    			</div>
    		</div>
		</div>
	<?php $this->endWidget(); ?>
</div>