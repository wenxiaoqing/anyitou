<?php
/* @var $this UserChannelController */
/* @var $model UserChannel */
/* @var $form CActiveForm */
?>
<div class="form form-horizontal">
	<?php $form=$this->beginWidget('CActiveForm', array(
    	'id'=>'user-channel-type-form',
    	'enableAjaxValidation'=>true,
	    'errorMessageCssClass' => 'help-block',
    )); ?>
		<div class="form-body">
			<div class="form-group">
				<?php echo $form->labelEx($model,'name', array('class'=>'col-md-2 control-label')); ?>
				<div class="col-md-10">
					<?php echo $form->textField($model, 'name', array('class' => 'form-control input-large isrequired', 'size'=>30,'maxlength'=>30)); ?>
					<?php echo $form->error($model,'name', array('class'=>'help-block' )); ?>
				</div>
			</div>
			<div class="form-group">
				<?php echo $form->labelEx($model,'keywords', array('class'=>'col-md-2 control-label')); ?>
				<div class="col-md-10">
					<?php echo $form->textField($model, 'keywords', array('class' => 'form-control input-large isrequired', 'size'=>30,'maxlength'=>30)); ?>
					<?php echo $form->error($model,'keywords', array('class'=>'help-block' )); ?>
				</div>
			</div>
			<div class="form-group">
				<?php echo $form->labelEx($model,'status', array('class'=>'col-md-2 control-label')); ?>
				<div class="col-md-10">
					<?php echo $form->dropDownList($model, 'status', $model->statusAttrs, array('class' => 'form-control input-large isrequired', 'placeholder' => $model->getAttributeLabel('channelType'))); ?>
					<?php echo $form->error($model,'status', array('class'=>'help-block' )); ?>
				</div>
			</div>
			
			<div class="form-group">
    			<div class="col-md-offset-2 col-md-10">
    				<?php echo CHtml::submitButton($model->isNewRecord ? '添加' : '保存渠道', array('class' => 'btn blue')); ?>
    			</div>
    		</div>
		</div>
	<?php $this->endWidget(); ?>
</div>