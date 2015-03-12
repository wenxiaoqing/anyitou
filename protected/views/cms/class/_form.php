<?php
/* @var $this ClassController */
/* @var $model CmsClass */
/* @var $form CActiveForm */
?>
<div class="portlet-body form">
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'cms-channel-form',
		'enableAjaxValidation'=>false,
		'htmlOptions' => array('class' => 'form-horizontal', 'role' => 'form'),
	)); ?>
		<div class="form-body">
			<div class="form-group">
				<?php echo $form->labelEx($model,'channel_id', array('class'=>'col-md-2 control-label')); ?>
				<div class="col-md-10">
					<?php echo $form->dropDownList($model, 'channel_id', CHtml::listData($channelARs, 'channel_id', 'name'), array('class' => 'form-control input-large isrequired')); ?>
					<?php echo $form->error($model,'channel_id', array('class'=>'help-block' )); ?>
				</div>
			</div>
			<div class="form-group">
				<?php echo $form->labelEx($model,'class', array('class'=>'col-md-2 control-label')); ?>
				<div class="col-md-10">
					<?php echo $form->textField($model, 'class', array('class' => 'form-control input-large isrequired', 'size'=>30,'maxlength'=>30)); ?>
					<?php echo $form->error($model,'class', array('class'=>'help-block' )); ?>
				</div>
			</div>
			<!-- 
			<div class="form-group">
				<?php echo $form->labelEx($model,'parent_id', array('class'=>'col-md-2 control-label')); ?>
				<div class="col-md-10">
					<?php echo $form->textField($model, 'parent_id', array('class' => 'form-control input-large isrequired', 'size'=>30,'maxlength'=>30)); ?>
					<?php echo $form->error($model,'parent_id', array('class'=>'help-block' )); ?>
				</div>
			</div>
			 -->
		</div>
		<div class="form-actions fluid">
			<div class="col-md-offset-2 col-md-10">
				<?php echo CHtml::submitButton($model->isNewRecord ? '创建' : '保存', array('class' => 'btn blue')); ?>
			</div>
		</div>
	<?php $this->endWidget(); ?>
</div>