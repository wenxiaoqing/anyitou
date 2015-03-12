<?php

Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl ."/plugins/kindeditor/kindeditor-all.js");
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl ."/plugins/kindeditor/lang/zh_CN.js");

?>

<div class="form-horizontal" >
    <div class="panel panel-primary">
    	<div class="panel-heading">
    		<span>基本信息</span>
    	</div>
    	<div class="panel-body" >
			<div class="form-group">
				<label for="item_title" class="col-sm-2 control-label"><?php echo $model->getAttributeLabel('item_title'); ?>：<span class="required">*</span></label>
				<div class="col-sm-8 control-info">
				<?php echo $model->item_title; ?>
				</div>
				<div class="col-sm-2 control-info">&nbsp;</div>
			</div>
			<div class="form-group">
				<label for="item_title" class="col-sm-2 control-label"><?php echo $model->getAttributeLabel('sub_title'); ?>：</label>
				<div class="col-sm-8 control-info">
				<?php echo $model->sub_title ? $model->sub_title : '-'; ?>
				</div>
				<div class="col-sm-2 control-info">&nbsp;</div>
			</div>
			<div class="form-group">
				<label for="item_title" class="col-sm-2 control-label"><?php echo $model->getAttributeLabel('category'); ?>：</label>
				<div class="col-sm-8 control-info">
				<?php echo $model->categoryArrs[$model->category]; ?>
				</div>
				<div class="col-sm-2 control-info">&nbsp;</div>
			</div>
			<div class="form-group">
				<label for="item_title" class="col-sm-2 control-label"><?php echo $model->getAttributeLabel('number_id'); ?>：</label>
				<div class="col-sm-8 control-info">
				<?php echo $model->number_id; ?>
				</div>
				<div class="col-sm-2 control-info">&nbsp;</div>
			</div>
			<div class="form-group">
				<label for="item_title" class="col-sm-2 control-label"><?php echo $model->getAttributeLabel('borrower_user_id'); ?>：</label>
				<div class="col-sm-8 control-info">
				<?php echo $user_name->user_name; ?>
				</div>
				<div class="col-sm-2 control-info">&nbsp;</div>
			</div>
			<div class="form-group">
				<label for="companyName" class="col-sm-2 control-label">企业名称：<span class="required">*</span></label>
				<div class="col-sm-8 control-info">
				<?php if(!empty($companyModel)): ?>
					<?php echo $companyModel->name; ?>
				<?php else: ?>
					未关联融资企业
				<?php endif; ?>
				</div>
				<div class="col-sm-2 control-info">&nbsp;</div>
			</div>
			<div class="form-group">
				<label for="companyName" class="col-sm-2 control-label">担保机构：<span class="required">*</span></label>
				<div class="col-sm-8 control-info">
				<?php if(!empty($guaranteeModel)): ?>
					<?php echo $guaranteeModel->name; ?>
				<?php else: ?>
					未关联担保机构
				<?php endif; ?>
				</div>
				<div class="col-sm-2 control-info">&nbsp;</div>
			</div>
			<div class="form-group">
				<label for="financing_amount" class="col-sm-2 control-label"><?php echo $model->getAttributeLabel('financing_amount'); ?>：</label>
				<div class="col-sm-8 control-info">
				<?php echo $model->financing_amount; ?> &nbsp;&nbsp; 元
				</div>
				<div class="col-sm-2 control-info"><label>&nbsp; </label></div>
			</div>
			<div class="form-group">
				<label for="rate_of_interest" class="col-sm-2 control-label"><?php echo $model->getAttributeLabel('rate_of_interest'); ?>：<span class="required">*</span></label>
				<div class="col-sm-8 control-info">
				<?php echo $model->rate_of_interest; ?> &nbsp;&nbsp; %
				</div>
				<div class="col-sm-2 control-info"><label>&nbsp; </label></div>
			</div>
			<div class="form-group">
				<label for="reward_apr" class="col-sm-2 control-label"><?php echo $model->getAttributeLabel('reward_apr'); ?>：<span class="required">*</span></label>
				<div class="col-sm-8 control-info">
				<?php echo $model->reward_apr; ?> &nbsp;&nbsp; %
				</div>
				<div class="col-sm-2 control-info"><label>&nbsp; </label></div>
			</div>
			<div class="form-group">
				<label for="investment" class="col-sm-2 control-label"><?php echo $model->getAttributeLabel('investment'); ?>：<span class="required">*</span></label>
				<div class="col-sm-8 control-info">
				<?php echo $model->investment; ?> &nbsp;&nbsp; 元
				</div>
				<div class="col-sm-2 control-info"><label>&nbsp; </label></div>
			</div>
			<div class="form-group">
				<label for="repayment_time" class="col-sm-2 control-label"><?php echo $model->getAttributeLabel('begin_time'); ?>：<span class="required">*</span></label>
				<div class="col-sm-8 control-info">
				<?php echo $model->begin_time; ?>
				</div>
				<div class="col-sm-2 control-info"><label>&nbsp; </label></div>
			</div>
			<div class="form-group">
				<label for="repayment_time" class="col-sm-2 control-label"><?php echo $model->getAttributeLabel('repayment_time'); ?>：<span class="required">*</span></label>
				<div class="col-sm-8 control-info">
				<?php echo $model->repayment_time; ?>
				</div>
				<div class="col-sm-2 control-info"><label>&nbsp; </label></div>
			</div>
			<div class="form-group">
				<label for="repayment_time" class="col-sm-2 control-label"><?php echo $model->getAttributeLabel('raise_begin_time'); ?>：<span class="required">*</span></label>
				<div class="col-sm-8 control-info">
				<?php echo $model->raise_begin_time; ?>
				</div>
				<div class="col-sm-2 control-info"><label>&nbsp; </label></div>
			</div>
			<div class="form-group">
				<label for="raise_delay" class="col-sm-2 control-label"><?php echo $model->getAttributeLabel('raise_delay'); ?>：<span class="required">*</span></label>
				<div class="col-sm-8 control-info">
				<?php echo $model->raise_delay; ?> &nbsp;&nbsp; 天
				</div>
				<div class="col-sm-2 control-info"><label>&nbsp; </label></div>
			</div>
		</div>
	</div>
	<div class="panel panel-primary">
		<div class="panel-heading">
    		<span><?php echo $model->getAttributeLabel('description'); ?></span>
    	</div>
    	<div class="panel-body" >
			<div class="col-sm-10 control-info">
				<?php echo $model->description; ?>
			</div>
			<div class="col-sm-2 control-info"><label>&nbsp; </label></div>
		</div>
	</div>
	<div class="panel panel-primary">
		<div class="panel-heading">
    		<span><?php echo $model->getAttributeLabel('capital_opration'); ?></span>
    	</div>
    	<div class="panel-body" >
			<div class="col-sm-10 control-info">
				<?php echo $model->capital_opration; ?>
			</div>
			<div class="col-sm-2 control-info"><label>&nbsp; </label></div>
		</div>
	</div>
	<div class="panel panel-primary">
		<div class="panel-heading">
    		<span><?php echo $model->getAttributeLabel('risk_control'); ?></span>
    	</div>
    	<div class="panel-body" >
			<div class="col-sm-10 control-info">
				<?php echo $model->risk_control; ?>
			</div>
			<div class="col-sm-2 control-info"><label>&nbsp; </label></div>
		</div>
	</div>
	<div class="panel panel-primary">
		<div class="panel-heading">
    		<span><?php echo $model->getAttributeLabel('collateral_info'); ?></span>
    	</div>
    	<div class="panel-body" >
			<div class="col-sm-10 control-info">
				<?php echo $model->collateral_info; ?>
			</div>
			<div class="col-sm-2 control-info"><label>&nbsp; </label></div>
		</div>
	</div>
	<div class="panel panel-primary">
		<div class="panel-heading">
    		<span><?php echo $model->getAttributeLabel('desc_detail'); ?></span>
    	</div>
    	<div class="panel-body" >
			<div class="col-sm-10 control-info">
				<?php echo $model->desc_detail; ?>
			</div>
			<div class="col-sm-2 control-info"><label>&nbsp; </label></div>
		</div>
	</div>
	
	<?php if($model->status == 0 || $model->status == 2) : ?>
    <div class="panel panel-primary">
    <form id="verifyFrom" name="verifyFrom" method="post" action="/project/verify?id=<?php echo $model->id; ?>" >
    	<div class="panel-heading">
    		<span>项目审核</span>
    	</div>
    	<div class="panel-body form" >
    	<div class="form-body">
    		<div class="form-group">
				<label for="item_title" class="col-sm-2 control-label">审核结果：<span class="required">*</span></label>
				<div class="col-sm-8">
					<div class="radio-list">
						<label for="status1" class="radio-inline"><input type="radio" id="status1" name="status" value="1" <?php if($model->status == 1) echo 'checked="true"'; ?>  />审核通过</label>
						<label for="status2" class="radio-inline"><input type="radio" id="status2" name="status" value="2" checked="true"/>审核不通过</label>
					</div>
	            	<span class="help-inline" ></span>
				</div>
				<div class="col-sm-2 control-info">&nbsp;</div>
			</div>
    	</div>
    	<div class="form-actions fluid">
			<input type="hidden" name="confirm" value="true" />
			<div class="col-md-offset-2 col-md-10">
				<button type="button" class="btn btn-large btn-primary" id="verifyBtn" >提交审核</button>             
			</div>
	    </div>
	    </div>
	</form>
    </div>
    <?php endif; ?>
    <?php if($model->status == 1 && $model->invest_status <= 0) : ?>
    <div class="panel panel-primary">
    	<div class="panel-heading">
    		<span>投资状态管理</span>
    	</div>
    	<div class="panel-body form" >
    	<?php $form = $this->beginWidget('CActiveForm', array(
    			'id'=>'openFrom',
    	        'action' => Yii::app()->createUrl('project/open', array('id' => $model->id)),
    			'enableClientValidation'=>false,
    			'htmlOptions'=>array(
    				'class'=>'openFrom',
    			)
    	)); ?>
    	<div class="form-body">
    		<div class="form-group">
				<label for="item_title" class="col-sm-2 control-label">投资状态：<span class="required">*</span></label>
				<div class="col-sm-5">
					<div class="radio-list">
						<label for="status1" class="radio-inline"><input type="radio" id="status1" name="ItemInfo[invest_status]" value="0" checked="checked" />暂不开放</label>
						<label for="status2" class="radio-inline"><input type="radio" id="status2" name="ItemInfo[invest_status]" value="1" />开放投资</label>
					</div>
	            	<span class="help-inline" ></span>
				</div>
				<div class="col-sm-5 control-info">&nbsp;</div>
			</div>
			<div class="form-group">
				<label for="begin_time" class="col-sm-2 control-label"><?php echo $model->getAttributeLabel('begin_time'); ?>：</label>
				<div class="col-sm-5">
				<?php echo $form->textField($model, 'begin_time', array('class' => 'form-control col-sm-4 _datePicker', 'placeholder' => $model->getAttributeLabel('begin_time')) ); ?>
				</div>
				<div class="col-sm-5 control-info"><label></label></div>
			</div>
			<div class="form-group">
				<label for="repayment_time" class="col-sm-2 control-label"><?php echo $model->getAttributeLabel('repayment_time'); ?>：<span class="required">*</span></label>
				<div class="col-sm-5">
				<?php echo $form->textField($model, 'repayment_time', array('class' => 'form-control col-sm-4 isrequired _datePicker', 'placeholder' => $model->getAttributeLabel('repayment_time')) ); ?>
				</div>
				<div class="col-sm-5 control-info"><label></label></div>
			</div>
			<div class="form-group">
				<label for="raise_begin_time" class="col-sm-2 control-label"><?php echo $model->getAttributeLabel('raise_begin_time'); ?>：</label>
				<div class="col-sm-5">
				<?php echo $form->textField($model, 'raise_begin_time', array('class' => 'form-control col-sm-4 _datePicker_time', 'placeholder' => $model->getAttributeLabel('raise_begin_time')) ); ?>
				</div>
				<div class="col-sm-5 control-info"><label></label></div>
			</div>
			<div class="form-group">
				<label for="raise_delay" class="col-sm-2 control-label"><?php echo $model->getAttributeLabel('raise_delay'); ?>：<span class="required">*</span></label>
				<div class="col-sm-5">
					<?php echo $form->textField($model, 'raise_delay', array('class' => 'form-control col-sm-4 isrequired', 'placeholder' => $model->getAttributeLabel('raise_delay')) ); ?>
				</div>
				<div class="col-sm-5 control-info"><label>天 &nbsp;&nbsp; </label></div>
			</div>
    	</div>
    	<div class="form-actions fluid">
			<input type="hidden" name="confirm" value="true" />
			<div class="col-md-offset-2 col-md-10">
				<button type="button" class="btn btn-large btn-primary" id="openBtn" >提交操作</button>             
			</div>
	    </div>
	    <?php $this->endWidget(); ?>
	    </div>
    </div>
    <?php endif; ?>
</div>
<?php 

Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl ."/plugins/jquery-ui/jquery-ui-timepicker.js", CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl ."/plugins/jquery-ui/jquery-ui-datepicker_zh_cn.js", CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl ."/plugins/jquery-ui/jquery-ui-timepicker_zh_cn.js", CClientScript::POS_END);

$_script = <<<EOF
$(document).ready(function() {
	$('._datePicker').datepicker({
		dateFormat: 'yy-mm-dd'
	});
	$('._datePicker_time').datetimepicker({
		dateFormat: 'yy-mm-dd',
		timeFormat: 'HH:mm:ss'
	});
	$('#verifyBtn').click(function(){
		var VF = $('#verifyFrom');
		var VBtn = $(this);

		VBtn.attr('disabled', true);
		$.ajax({
		  type: 'POST',
		  url: VF.attr('action'),
		  data: VF.serialize(),
		  success: function(data){
			  BootstrapDialog.alert({title: '提示信息', message: data.info, buttonLabel:'确定'});
			  if(data.status == true) {
				  setTimeout(function(){
					  window.location.reload();
				  }, 3000);
			  } else {
				  VBtn.attr('disabled', false);
			  }
			},
		  dataType: 'json'
		});
	});
	$("#openBtn").click(function(){console.log('fasdf');
		var OF = $('#openFrom');
		var OBtn = $(this);
		
		OBtn.attr('disabled', true);
		$.ajax({
		  type: 'POST',
		  url: OF.attr('action'),
		  data: OF.serialize(),
		  success: function(data){
			  BootstrapDialog.alert({title: '提示信息', message: data.info, buttonLabel:'确定'});
			  if(data.status == true) {
				  setTimeout(function(){
					  window.location.reload();
				  }, 3000);
			  } else {
			      console.log(data.error);
				  OBtn.attr('disabled', false);
			  }
			},
		  dataType: 'json'
		});
	});
});
EOF;
Yii::app()->getClientScript()->registerScript(__CLASS__, $_script);

?>