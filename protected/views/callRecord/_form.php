<?php
/* @var $this CallRecordController */
/* @var $model CallRecord */
/* @var $form CActiveForm */
?>

<div class="form form-horizontal">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'call-record-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="note">带<span class="required">*</span>号的为必填项.</p>
	<div class="form-group">
		<?php echo $form->labelEx($model,'user_id',array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<input type="text" id="user_name" name="CallRecord[user_name]" class="form-control input-large isrequired ",autocomplete='off'>
		</div>
		<div class="col-sm-5 control-info">
		<?php echo $form->error($model,'user_id');?><?php echo Yii::app()->user->getFlash('error')?>
		</div>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'type', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<?php echo $form->dropDownList($model, 'type', $model->typeStatusArrs, array('class' => 'form-control input-large isrequired'));?>
		</div>
		<div class="col-sm-5 control-info"><?php echo $form->error($model,'type'); ?></div>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'descript', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<?php echo $form->textArea($model, 'descript', array('class' => 'form-control input-large')); ?>
		</div>
		<div class="col-sm-5 control-info"><?php echo $form->error($model,'descript'); ?></div>
	</div>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'satisfaction',array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<?php echo $form->dropDownList($model,'satisfaction',$model->satisfactionArrs,array('class' => 'form-control input-large isrequired',)); ?>
		</div>
		<div class="col-sm-5 control-info">
		<?php echo $form->error($model,'satisfaction'); ?>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-2"></div>
		<div class="col-sm-10">
			<?php echo CHtml::submitButton($model->isNewRecord ? '创建呼叫记录' : '保存更改', array('class' => 'btn btn-large btn-primary', 'id' => 'submitBtn')); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>
<script type="text/javascript">
$(document).ready(function() {
	$("#user_name").autocomplete({
	    source: "/callRecord/autocomplete",
	    minLength: 1,
	    select: function(event, ui ) {
	        $('#CallRecord_user_id').val(ui.item.label);
	        $('#user_name').val(ui.item.value);
	       	return false;
	        }
	    });});
</script>
</div><!-- form -->