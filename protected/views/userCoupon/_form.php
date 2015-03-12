<?php
/* @var $this UserCouponController */
/* @var $model UserCoupon */
/* @var $form CActiveForm */
?>

<div class="form form-horizontal">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-coupon-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">带 <span class="required">*</span> 字段必填.</p>
	<div class="form-group">
		<?php echo $form->labelEx($model,'user_id',array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<input type="text" id="user_name" name="UserCoupon[user_name]" class="form-control col-sm-4 isrequired ",autocomplete='off'>
		</div>
		<div class="col-sm-5 control-info">
		<?php echo $form->error($model,'user_id');?><?php echo Yii::app()->user->getFlash('error')?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'coupon_id',array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<input type="text" id="name" name="UserCoupon[name]" class="form-control col-sm-4 isrequired",autocomplete='off'>
		</div>
		<div class="col-sm-5 control-info">
		<?php echo $form->error($model,'coupon_id');?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'item_id',array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<input type="text" id="item_name" name="UserCoupon[item_title]" class="form-control col-sm-4 isrequired",autocomplete='off'>
		</div>
		<div class="col-sm-5 control-info">
		<?php echo $form->error($model,'item_id');?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'use_status',array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<?php echo $form->dropDownList($model,'use_status',$model->baseStatusAttrs,array('class' => 'form-control col-sm-4 isrequired',)); ?>
		</div>
		<div class="col-sm-5 control-info">
		<?php echo $form->error($model,'use_status'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'used_money',array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<?php echo $form->textField($model,'used_money',array('class' => 'form-control col-sm-4','size'=>5,'maxlength'=>5)); ?>
		</div>
		<div class="col-sm-5 control-info">
		<?php echo $form->error($model,'used_money'); ?>
		</div>
	</div>

	
	<div class="form-group">
		<?php echo $form->labelEx($model,'source_type',array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<!--<?php echo $form->textField($model,'source_type',array('class' => 'form-control col-sm-4 isrequired',)); ?>-->
		<select class="form-control col-sm-4 " name="UserCoupon[source_type]">
					<?php foreach($sourceAttrs as $key=>$value){
						foreach($value as $ke=>$va){
							echo '<option value='.$key.'>'.$va.'</option>';
						}
					}?>
			</select>
		</div>
		<div class="col-sm-5 control-info">
		<?php echo $form->error($model,'source_type'); ?>
		</div>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'source_id',array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<?php echo $form->textField($model,'source_id',array('class' => 'form-control col-sm-4 isrequired',)); ?>
		</div>
		<div class="col-sm-5 control-info">
		<?php echo $form->error($model,'source_id'); ?>
		</div>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'use_time',array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<!--<?php echo $form->textField($model,'use_time',array('class' => 'form-control col-sm-4 isrequired',)); ?>-->
		<?php 
    $this->widget('zii.widgets.jui.CJuiDatePicker',array(
    		'attribute' => 'startTime',
                        'language'=>'zh_cn', 
            'name'=>'UserCoupon[use_time]',  
            'options'=>array( 
                        'showAnim'=>'fold', 
                        'showOn'=>'both', 
                        'buttonImage'=>'/images/social/calender.png', 
                                   'maxDate'=>"new Date('Y-m-d',strtotime('-1 day'))", 
            						'minDate'=>"new Date('Y-m-d',strtotime('-29 day'))",
                       'buttonImageOnly'=>true, 
                       'dateFormat'=>'yy-mm-dd', 
            ), 
            'htmlOptions'=>array( 
                        'style'=>'height:30px;width:300px;border:1px solid #ededed;', 
                        'maxlength'=>8, 
            ), 
    )); 
   
 ?>
		</div>
		<div class="col-sm-5 control-info">
		<?php echo $form->error($model,'use_time'); ?>
		</div>
	</div>
	

	<div class="form-group">
		<?php echo $form->labelEx($model,'begin_time',array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<!--<?php echo $form->textField($model,'begin_time',array('class' => 'form-control col-sm-4 isrequired',)); ?>-->
		<?php 
    $this->widget('zii.widgets.jui.CJuiDatePicker',array(
    		'attribute' => 'startTime',
                        'language'=>'zh_cn', 
            'name'=>'UserCoupon[begin_time]',  
            'options'=>array( 
                        'showAnim'=>'fold', 
                        'showOn'=>'both', 
                        'buttonImage'=>'/images/social/calender.png', 
                                   'maxDate'=>"new Date('Y-m-d',strtotime('-1 day'))", 
            						'minDate'=>"new Date('Y-m-d',strtotime('-29 day'))",
                       'buttonImageOnly'=>true, 
                       'dateFormat'=>'yy-mm-dd', 
            ), 
            'htmlOptions'=>array( 
                        'style'=>'height:30px;width:300px;border:1px solid #ededed;', 
                        'maxlength'=>8, 
            ), 
    )); 
   
 ?>
		</div>
		<div class="col-sm-5 control-info">
		<?php echo $form->error($model,'begin_time'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'end_time',array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<!--<?php echo $form->textField($model,'end_time',array('class' => 'form-control col-sm-4 isrequired',)); ?>-->
		<?php 
    $this->widget('zii.widgets.jui.CJuiDatePicker',array(
    		'attribute' => 'startTime',
                        'language'=>'zh_cn', 
            'name'=>'UserCoupon[end_time]',  
            'options'=>array( 
                        'showAnim'=>'fold', 
                        'showOn'=>'both', 
                        'buttonImage'=>'/images/social/calender.png', 
                                   'maxDate'=>"new Date('Y-m-d',strtotime('-1 day'))", 
            						'minDate'=>"new Date('Y-m-d',strtotime('-29 day'))",
                       'buttonImageOnly'=>true, 
                       'dateFormat'=>'yy-mm-dd', 
            ), 
            'htmlOptions'=>array( 
                        'style'=>'height:30px;width:300px;border:1px solid #ededed;', 
                        'maxlength'=>8, 
            ), 
    )); 
   
 ?>
		</div>
		<div class="col-sm-5 control-info">
		<?php echo $form->error($model,'end_time'); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-2"></div>
		<div class="col-sm-10">
			<?php echo CHtml::submitButton('保存用户信息', array('class' => 'btn btn-large btn-primary', 'id' => 'submitBtn')); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<script src="/plugins/datepicker/jquery_timepicker_addon/resources/jquery-ui-timepicker-addon.js" type="text/javascript"></script>
<script type="text/javascript">
$('#UserCoupon_give_time').datetimepicker({
	showSecond: true, //显示秒
	timeFormat: 'hh:mm:ss',//格式化时间
	stepHour: 2,//设置步长
	stepMinute: 10,
	stepSecond: 10,
	});

$('#UserCoupon_use_time').datetimepicker({
	showSecond: true, //显示秒
	timeFormat: 'hh:mm:ss',//格式化时间
	stepHour: 2,//设置步长
	stepMinute: 10,
	stepSecond: 10,
	});
	
$('#UserCoupon_begin_time').datetimepicker({
	showSecond: true, //显示秒
	timeFormat: 'hh:mm:ss',//格式化时间
	stepHour: 2,//设置步长
	stepMinute: 10,
	stepSecond: 10,
	});

$('#UserCoupon_end_time').datetimepicker({
	showSecond: true, //显示秒
	timeFormat: 'hh:mm:ss',//格式化时间
	stepHour: 2,//设置步长
	stepMinute: 10,
	stepSecond: 10,
	}); 
	
$(document).ready(function() {
	$("#user_name").autocomplete({
	    source: "/userCoupon/autocomplete",
	    minLength: 1,
	    select: function(event, ui ) {
	        $('#UserCoupon_user_id').val(ui.item.label);
	        $('#user_name').val(ui.item.value);
	       	return false;
	        }
	    });});
$(document).ready(function() {
	$("#name").autocomplete({
	    source: "/userCoupon/nameAutocomplete",
	    minLength: 1,
	    select: function(event, ui ) {
	        $('#UserCoupon_coupon_id').val(ui.item.label);
	        $('#name').val(ui.item.value);
	       	return false;
	        }
	    });});
$(document).ready(function() {
	$("#item_name").autocomplete({
	    source: "/userCoupon/itemAutocomplete",
	    minLength: 1,
	    select: function(event, ui ) {
	        $('#UserCoupon_item_id').val(ui.item.label);
	        $('#item_name').val(ui.item.value);
	       	return false;
	        }
	    });});

</script>