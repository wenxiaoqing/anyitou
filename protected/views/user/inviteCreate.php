<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'邀请记录'=>array('InviteAdmin'),
	'创建邀请记录',
);

$this->menu=array(
	array('label'=>'邀请记录', 'url'=>array('InviteAdmin')),
);
?>

<div class="form form-horizontal">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">带<span class="required">*</span>号的为必填项.</p>
	<div class="form-group">
		<?php echo $form->labelEx($model,'user_id', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<input type="text" id="user_name" name="user_name" value="" class="form-control col-sm-4 isrequired" maxlength="50" autocomplete="off" ><span id="msg"></span>
		<?php echo $form->hiddenField($model,'user_id');?>
		</div>
		 <div class="col-sm-5 control-info"><?php echo $form->error($model,'user_id'); ?><?php echo Yii::app()->user->getFlash('error')?><?php echo Yii::app()->user->getFlash('error')?></div>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'recommend_id', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<!--<?php echo $form->textField($model, 'recommend_id', array('class' => 'form-control col-sm-4 isrequired', 'size'=>20,'maxlength'=>20,'autocomplete'=>'off')); ?>-->	
	   <!--<input type="hidden" id="recommend_id" name="UserFriendRecommend['recommend_id']">>-->
	   <input type="text" id="recommend_name" name="recommend_name" value="" class="form-control col-sm-4 isrequired" maxlength="50" autocomplete="off">
	   <?php echo $form->hiddenField($model,'recommend_id');?>
		</div>
		<div class="col-sm-5 control-info"><?php echo $form->error($model,'recommend_id'); ?></div>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'prize', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<?php echo $form->textField($model, 'prize', array('class' => 'form-control col-sm-4 isrequired', 'size'=>20,'maxlength'=>20)); ?>
		</div>
		<div class="col-sm-5 control-info"><?php echo $form->error($model,'prize'); ?></div>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'recommend_type', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<?php echo $form->textField($model, 'recommend_type', array('class' => 'form-control col-sm-4 isrequired', 'size'=>20,'maxlength'=>20)); ?>
		</div>
		<div class="col-sm-5 control-info"><?php echo $form->error($model,'recommend_type'); ?></div>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'status', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<?php echo $form->dropDownList($model,'status',$model->statusAttrs,array('class'=>'form-control col-sm-4'))?>
		</div>
		<div class="col-sm-5 control-info"><?php echo $form->error($model,'status'); ?></div>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'income', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<?php echo $form->textField($model, 'income', array('class' => 'form-control col-sm-4 isrequired', 'size'=>20,'maxlength'=>20)); ?>
		</div>
		<div class="col-sm-5 control-info"><?php echo $form->error($model,'income'); ?></div>
	</div>
	<div class="form-group">
		<div class="col-sm-2"></div>
		<div class="col-sm-10">
			<?php echo CHtml::submitButton('添加邀请记录', array('class' => 'btn btn-large btn-primary', 'id' => 'submitBtn')); ?>
		</div>
	</div>
<?php $this->endWidget(); ?>
</div>
<!-- form -->
<script type="text/javascript">
/*用户js*/
	$(document).ready(function() {
		$("#user_name").autocomplete({
	        source: "/user/autocomplete",
	        minLength: 2,
	        select: function( event, ui) {
	        	$('#user_name').val(ui.item.label);
	        	$('#UserFriendRecommend_user_id').val(ui.item.value);
	       	 	return false;
	        }
	   });
	    });
  
/*邀请人js*/
$(document).ready(function() {
	$("#recommend_name").autocomplete({
	    source: "/user/autocomplete",
	    minLength: 2,
	    select: function(event, ui ) {
	        $('#recommend_name').val(ui.item.label);
	        $('#UserFriendRecommend_recommend_id').val(ui.item.value);
	       	return false;
	        }
	    });});
</script>