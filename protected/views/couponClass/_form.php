<?php
/* @var $this CouponClassController */
/* @var $model CouponClass */
/* @var $form CActiveForm */

?>

<div class="form form-horizontal">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'coupon-class-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">带 <span class="required">*</span> 字段为必填字段.</p>
	<div class="form-group">
		<?php echo $form->labelEx($model,'name',array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<?php echo $form->textField($model,'name',array('class' => 'form-control col-sm-4 isrequired','size'=>60,'maxlength'=>200));?>
		</div>
		<div class="col-sm-5 control-info">
		<?php echo $form->error($model,'name');?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'category',array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
			<select class="form-control col-sm-4 isrequired" name="CouponClass[category]">
			<?php  foreach($categoryAttrs as $key => $value){?>
				<option value="<?php echo $key;?>" <?php if($model->category == '$key') { echo 'selected'; } ?> > <?php echo $value['name'];?></option>
			<?php }?>
			</select>
		</div>
		<div class="col-sm-5 control-info">
		<?php echo $form->error($model,'category'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'price',array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<?php echo $form->textField($model,'price',array('class' => 'form-control col-sm-4 isrequired','size'=>8,'maxlength'=>8)); ?>
		</div>
		<div class="col-sm-5 control-info">
		<?php echo $form->error($model,'price'); ?>
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
            'name'=>'CouponClass[begin_time]',  
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
		<?php echo $form->labelEx($model,'delay',array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<?php echo $form->textField($model,'delay',array('class' => 'form-control col-sm-4 isrequired',)); ?>
		</div>
		<div class="col-sm-5 control-info">
		<?php echo $form->error($model,'delay'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'num',array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<?php echo $form->textField($model,'num',array('class' => 'form-control col-sm-4 isrequired')); ?>
		</div>
		<div class="col-sm-5 control-info">
		<?php echo $form->error($model,'num'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'descript',array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<?php echo $form->textArea($model,'descript',array('class' => 'form-control col-sm-4 isrequired','rows'=>6, 'cols'=>50)); ?>
		</div>
		<div class="col-sm-5 control-info">
		<?php echo $form->error($model,'descript'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'status',array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<?php echo $form->dropDownList($model,'status',$model->statusAttrs,array('class' => 'form-control col-sm-4 isrequired')); ?>
		</div>
		<div class="col-sm-5 control-info">
		<?php echo $form->error($model,'status'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'part_use',array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<?php echo $form->dropDownList($model,'part_use',$model->partUseAttrs,array('class' => 'form-control col-sm-4 isrequired')); ?>
		</div>
		<div class="col-sm-5 control-info">
		<?php echo $form->error($model,'part_use');?>
		</div>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'addup_use',array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<?php echo $form->dropDownList($model,'addup_use',$model->addupAttrs,array('class' => 'form-control col-sm-4')); ?>
		</div>
		<div class="col-sm-5 control-info">
		<?php echo $form->error($model,'addup_use');?>
		</div>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'use_rules',array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<?php echo $form->textField($model,'use_rules',array('class' => 'form-control col-sm-4')); ?>
		</div>
		<div class="col-sm-5 control-info">
		<?php echo $form->error($model,'use_rules');?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-2"></div>
		<div class="col-sm-10">
			<?php echo CHtml::submitButton('保存信息', array('class' => 'btn btn-large btn-primary', 'id' => 'submitBtn')); ?>
		</div>
	</div>
	

<?php $this->endWidget(); ?>
<script src="/plugins/datepicker/jquery_timepicker_addon/resources/jquery-ui-timepicker-addon.js" type="text/javascript"></script>
<script type="text/javascript">
$('#CouponClass_begin_time').datetimepicker({
	showSecond: true, //显示秒
	timeFormat: 'hh:mm:ss',//格式化时间
	stepHour: 2,//设置步长
	stepMinute: 10,
	stepSecond: 10,
	});
	
$(document).ready(function() {
	$("#category_type").autocomplete({
	    source: "/couponClass/autocomplete",
	    minLength: 1,
	    select: function(event, ui ) {
	        $('#category_type').val(ui.item.label);
	        $('#CouponClass_category').val(ui.item.value);
	       	return false;
	        }
	    });});


</script>