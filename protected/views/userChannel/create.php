<?php
/* @var $this UserChannelController */
/* @var $model UserChannel */

$this->breadcrumbs=array(
	'关键词列表'=>array('admin'),
	'添加关键词',
);

$this->menu=array(
	array('label'=>'关键词列表', 'url'=>array('admin')),
);
?>

<div class="form form-horizontal">
	<?php $form=$this->beginWidget('CActiveForm', array(
    	'id'=>'user-channel-form',
    	'enableAjaxValidation'=>true,
	    'errorMessageCssClass' => 'help-block',
    )); ?>
    <p class="note">带<span class="required">*</span>号的为必填项.</p>
		<div class="form-body">
			<div class="form-group">
				<?php //echo $form->labelEx($model,'type_id', array('class'=>'col-md-2 control-label')); ?><label class='col-md-2 control-label'>渠道:</label>
				<div class="col-md-10">
					<?php echo $form->textField($model, 'type_id', array('class' => 'form-control input-large isrequired')); ?>
					<?php echo $form->error($model,'type_id', array('class'=>'help-block' )); ?>
				</div>
			</div>
			<div class="form-group">
				<?php echo $form->labelEx($model,'plan', array('class'=>'col-md-2 control-label')); ?>
				<div class="col-md-10">
					<?php echo $form->textField($model, 'plan', array('class' => 'form-control input-large isrequired', 'size'=>30,'maxlength'=>30)); ?>
					<?php echo $form->error($model,'plan', array('class'=>'help-block' )); ?>
				</div>
			</div>
			<div class="form-group">
				<?php echo $form->labelEx($model,'group', array('class'=>'col-md-2 control-label')); ?>
				<div class="col-md-10">
					<?php echo $form->textField($model, 'group', array('class' => 'form-control input-large isrequired', 'size'=>30,'maxlength'=>30)); ?>
					<?php echo $form->error($model,'group', array('class'=>'help-block' )); ?>
				</div>
			</div>
			<div class="form-group">
				<?php echo $form->labelEx($model,'title', array('class'=>'col-md-2 control-label')); ?>
				<div class="col-md-10">
					<?php echo $form->textField($model, 'title', array('class' => 'form-control input-large isrequired', 'size'=>30,'maxlength'=>30)); ?>
					<?php echo $form->error($model,'title', array('class'=>'help-block' )); ?>
				</div>
			</div>
			<div class="form-group">
				<?php echo $form->labelEx($model,'channel_key', array('class'=>'col-md-2 control-label')); ?>
				<div class="col-md-10">
					<?php echo $form->textField($model, 'channel_key', array('class' => 'form-control input-large', 'size'=>30,'maxlength'=>30)); ?>
					<?php echo $form->error($model,'channel_key', array('class'=>'help-block' )); ?>
				</div>
			</div>
			
			<div class="form-group">
				<?php echo $form->labelEx($model,'status', array('class'=>'col-md-2 control-label')); ?>
				<div class="col-md-10">
					<?php echo $form->dropDownList($model, 'status', $model->statusAttrs, array('class' => 'form-control input-large isrequired', 'placeholder' => $model->getAttributeLabel('channel'))); ?>
					<?php echo $form->error($model,'status', array('class'=>'help-block' )); ?>
				</div>
			</div>
			
			<div class="form-group">
    			<div class="col-md-offset-2 col-md-10">
    				<?php echo CHtml::submitButton($model->isNewRecord ? '添加关键词' : '保存关键词', array('class' => 'btn blue')); ?>
    			</div>
    		</div>
		</div>
	<?php $this->endWidget(); ?>
</div>
<script type="text/javascript">
$(document).ready(function() {
	$("#UserChannel_type_id").autocomplete({
	    source: "/userChannel/autocomplete",
	    minLength: 1,
	    select: function(event, ui ) {
	        $('#UserChannel_type_id').val(ui.item.label);
	        $('#type_id').val(ui.item.value);
	       	return false;
	        }
	    });});
$(document).ready(function() {
	$("#UserChannel_channel_key").autocomplete({
	    source: "/userChannel/channelKey",
	    minLength: 1,
	    select: function(event, ui ) {
	        $('#UserChannel_channel_key').val(ui.item.label);
	        $('#channel_key').val(ui.item.value);
	       	return false;
	        }
	    });});
</script>