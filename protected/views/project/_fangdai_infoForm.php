<?php
/* @var $this ProjectController */

$this->pageTitle = '创建项目';

$this->breadcrumbs=array(
	'项目管理' => array('admin'),
	'创建项目',
);

$this->menu=array(
	array('label'=>'项目列表', 'url'=>array('admin')),
);


Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl ."/plugins/kindeditor/kindeditor-all.js", CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl ."/plugins/kindeditor/lang/zh_CN.js", CClientScript::POS_END);

?>
<div class="form-horizontal" >
	<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'ItemInfoForm',
			'enableClientValidation'=>true,
			'clientOptions'=>array(
				'validateOnSubmit'=>true,
			),
			'htmlOptions'=>array(
				'class'=>'login-form'
			)
	)); ?>
    <div class="panel panel-primary">
    	<div class="panel-body" >
			<div class="form-group">
				<label for="item_title" class="col-sm-2 control-label"><?php echo $model->getAttributeLabel('item_title'); ?>：<span class="required">*</span></label>
				<div class="col-sm-5">
				<?php echo $form->textField($model, 'item_title', array('class' => 'form-control col-sm-4 isrequired', 'placeholder' => $model->getAttributeLabel('item_title')) ); ?>
				</div>
				<div class="col-sm-5 control-info"></div>
			</div>
			<input type="hidden" name="ItemInfo[category]" value="<?php echo $model->category; ?>">												
			<div class="form-group">
				<label for="item_title" class="col-sm-2 control-label"><?php echo $model->getAttributeLabel('isrecommend'); ?>：</label>
				<div class="col-sm-5">
				<?php echo $form->dropDownList($model, 'isrecommend', $model->isrecommendArrs, array('class' => 'form-control isrequired', 'placeholder' => $model->getAttributeLabel('isrecommend'))); ?>
				</div>
  				<div class="col-sm-5 control-info"></div>
			</div>
			<div class="form-group">
				<label for="item_title" class="col-sm-2 control-label"><?php echo $model->getAttributeLabel('number_id'); ?>：<span class="required">*</span></label>
				<div class="col-sm-5">
				<?php echo $form->textField($model, 'number_id', array('class' => 'form-control col-sm-4 isrequired', 'placeholder' => $model->getAttributeLabel('number_id')) ); ?>
				</div>
				<div class="col-sm-5 control-info"></div>
			</div>
			<div class="form-group">
				<label for="companyName" class="col-sm-2 control-label">借款人：<span class="required">*</span></label>
				<div class="col-sm-5">
				<?php if(!empty($borrower_user)): ?>
					<input type="text" class="form-control col-sm-4 isrequired" id="borrower" placeholder="借款人" value="<?php echo $borrower_user->user_name; ?>" autocomplete="off" />
				<?php else: ?>
					<input type="text" class="form-control col-sm-4 isrequired" id="borrower" placeholder="借款人" value="" autocomplete="off" />
				<?php endif;?>
				<input type="hidden" id="borrower_user_id" name="ItemInfo[borrower_user_id]" placeholder="borrower_user_id" value="<?php echo $model->borrower_user_id; ?>" >
				</div>
  				<div class="col-sm-5 control-info"></div>
			</div>
			
			<div class="form-group">
				<label for="companyName" class="col-sm-2 control-label">评估机构：<span class="required">*</span></label>
				<div class="col-sm-5">
				<select class="form-control col-sm-4 isrequired" name="ItemInfo[evaluation_company_id]" >
				<?php foreach($companyModel as $record) :?>
					<option value="<?php echo $record->id; ?>" <?php if($model->evaluation_company_id == $record->id) { echo 'selected'; } ?> ><?php echo $record->name; ?></option>
				<?php endforeach; ?>
				</select>
				</div>
  				<div class="col-sm-5 control-info"></div>
			</div>
			<div class="form-group">
				<label for="companyName" class="col-sm-2 control-label">回购机构：<span class="required">*</span></label>
				<div class="col-sm-5">
				<select class="form-control col-sm-4 isrequired" name="ItemInfo[guarantee_id]" >
				<?php foreach($guaranteeModels as $record) :?>
					<option value="<?php echo $record->id; ?>" <?php if($model->guarantee_id == $record->id) { echo 'selected'; } ?> ><?php echo $record->name; ?></option>
				<?php endforeach; ?>
				</select>
				</div>
  				<div class="col-sm-5 control-info"></div>
			</div>
			<!--<div class="form-group">
				<label for="financing_amount" class="col-sm-2 control-label"><?php echo $model->getAttributeLabel('guarantee_type'); ?>：<span class="required">*</span></label>
				<div class="col-sm-5">
				<?php echo $form->textField($model, 'guarantee_type', array('class' => 'form-control col-sm-4 isrequired', 'placeholder' => $model->getAttributeLabel('guarantee_type')) ); ?>
				</div>
				<div class="col-sm-5 control-info"><label> &nbsp;&nbsp; </label></div>
			</div>-->
			<div class="form-group">
				<label for="financing_amount" class="col-sm-2 control-label"><?php echo $model->getAttributeLabel('financing_amount'); ?>：<span class="required">*</span></label>
				<div class="col-sm-5">
				<?php echo $form->textField($model, 'financing_amount', array('class' => 'form-control col-sm-4 isrequired', 'placeholder' => $model->getAttributeLabel('financing_amount')) ); ?>
				</div>
				<div class="col-sm-5 control-info"><label>元 &nbsp;&nbsp; </label></div>
			</div>
			<div class="form-group">
				<label for="financing_amount" class="col-sm-2 control-label"><?php echo $model->getAttributeLabel('credito_amount'); ?>：<span class="required">*</span></label>
				<div class="col-sm-5">
				<?php echo $form->textField($model, 'credito_amount', array('class' => 'form-control col-sm-4 isrequired', 'placeholder' => $model->getAttributeLabel('credito_amount')) ); ?>
				</div>
				<div class="col-sm-5 control-info"><label>元 &nbsp;&nbsp; </label></div>
			</div>
			<div class="form-group">
				<label for="item_title" class="col-sm-2 control-label"><?php echo $model->getAttributeLabel('pay_type'); ?>：</label>
				<div class="col-sm-5">
				<?php echo $form->dropDownList($model, 'pay_type', $model->paytypeArrs, array('class' => 'form-control isrequired', 'placeholder' => $model->getAttributeLabel('pay_type'))); ?>
				</div>
  				<div class="col-sm-5 control-info"></div>
			</div>
			<div class="form-group">
				<label for="rate_of_interest" class="col-sm-2 control-label"><?php echo $model->getAttributeLabel('rate_of_interest'); ?>：<span class="required">*</span></label>
				<div class="col-sm-5">
				<?php echo $form->textField($model, 'rate_of_interest', array('class' => 'form-control col-sm-4 isrequired', 'placeholder' => $model->getAttributeLabel('rate_of_interest')) ); ?>
				</div>
				<div class="col-sm-5 control-info"><label>% &nbsp;&nbsp; 1到100之间,保留两位小数</label></div>
			</div>
			<div class="form-group">
				<label for="reward_apr" class="col-sm-2 control-label"><?php echo $model->getAttributeLabel('reward_apr'); ?>：<span class="required">*</span></label>
				<div class="col-sm-5">
				<?php echo $form->textField($model, 'reward_apr', array('class' => 'form-control col-sm-4 isrequired', 'placeholder' => $model->getAttributeLabel('reward_apr')) ); ?>
				</div>
				<div class="col-sm-5 control-info"><label>% &nbsp;&nbsp; 0到1之间,保留两位小数</label></div>
			</div>
			<div class="form-group">
				<label for="investment" class="col-sm-2 control-label"><?php echo $model->getAttributeLabel('investment'); ?>：<span class="required">*</span></label>
				<div class="col-sm-5">
				<?php echo $form->textField($model, 'investment', array('class' => 'form-control col-sm-4 isrequired', 'placeholder' => $model->getAttributeLabel('investment')) ); ?>
				</div>
				<div class="col-sm-5 control-info"><label>元 &nbsp;&nbsp; </label></div>
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
	</div>
	<div class="panel panel-primary">
		<div class="panel-heading">
    		<span>借款用途</span>
    	</div>
    	<div class="panel-body" >
			<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50, 'class' => 'form-control col-sm-4 ', 'placeholder' => $model->getAttributeLabel('description'))); ?>
		</div>
	</div>
	<div class="text-center">
		<input type="hidden" name="submit" value="true" />
        <button type="button" class="btn btn-large btn-primary" id="submitBtn" >提交项目信息</button>
    </div>
	<?php $this->endWidget(); ?>
</div>
<?php

Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl ."/plugins/jquery-ui/jquery-ui-timepicker.js", CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl ."/plugins/jquery-ui/jquery-ui-datepicker_zh_cn.js", CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl ."/plugins/jquery-ui/jquery-ui-timepicker_zh_cn.js", CClientScript::POS_END);

$uploadItemImgUrl = Yii::app()->createUrl('upload/ItemImg');
$_script = <<<EOF
var editors = [];
$(document).ready(function() {
	$('._datePicker').datepicker({
		dateFormat: 'yy-mm-dd'
	});
	$('._datePicker_time').datetimepicker({
		dateFormat: 'yy-mm-dd',
		timeFormat: 'HH:mm:ss'
	});
	$("#companyName").autocomplete({
        source: "/company/autocomplete",
        minLength: 2,
        select: function( event, ui ) {
        	$('#company_id').val(ui.item.value);
        	$('#companyName').val(ui.item.label);
       	 	return false;
        }
    });
	KindEditor.ready(function(K) {
		$('#ItemInfoForm textarea').each(function(){
			editors.push(K.create('#' + $(this).attr('id'), { 
						width:'700px', height:'300px',
						uploadJson: '{$uploadItemImgUrl}'
				}));
		});
    });
	$("#borrower").autocomplete({
        source: "/user/autocomplete",
        minLength: 2,
        select: function( event, ui ){
        	$('#borrower_user_id').val(ui.item.value);
        	$('#borrower').val(ui.item.label);
       	 	return false;
        }
    });
	
	$('#submitBtn').click(function(){
		var BF = $('#ItemInfoForm');
		
		for( i in editors ) {
			editors[i].sync();
		}
		if(checkFrom()) {
			$(this).attr('disabled', true);
			$.ajax({
			  type: 'POST',
			  url: BF.attr('action'),
			  data: BF.serialize(),
			  success: function(data){
				  BootstrapDialog.alert({title: '提示信息', message: data.message, buttonLabel:'确定'});
				  if(data.status == true) {
					  setTimeout(function(){
						  window.location.href = data.url;
						}, 3000);
				  } else {
					  $('#submitBtn').attr('disabled', false );
				  }
				},
			  dataType: 'json'
			});
		}
	});
});
function checkFrom() {
	var _tips = new Array;
	var _focus = false;
	var _hastips = false;
	var tipStr = '';
	$('#ItemInfoForm .isrequired').each(function(){
		if($(this).val() == undefined || $(this).val() === '') {
			if(!_focus) {
				if($(this).attr('id') == 'company_id') {
					$('#companyName').focus();
				} else {
					$(this).focus();
				}
				_focus = true;
			}
			$(this).parent().parent().addClass('error');
			_hastips = true;
			tipStr += '<p>' + $(this).attr('placeholder') + '是必填项，不能为空</p>';
		}
	});
	if(tipStr != '') { toastr.warning( tipStr ); }
	if(_hastips) return false;
	return true;
}
EOF;
Yii::app()->getClientScript()->registerScript(__CLASS__, $_script);
?>
