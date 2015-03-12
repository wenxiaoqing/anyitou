
<div class="form-horizontal" >
	<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'NoticeInvestForm',
			'enableClientValidation'=>true,
			'clientOptions'=>array(
				'validateOnSubmit'=>true,
			),
			'htmlOptions'=>array(
				'class'=>'login-form'
			)
	)); ?>
    <div class="panel panel-primary">
    	<div class="panel-heading">
    		<span>基本信息</span>
    	</div>
    	<div class="panel-body" >
			<div class="form-group">
				<label for="title" class="col-sm-2 control-label"><?php echo $model->getAttributeLabel('title'); ?>：<span class="required">*</span></label>
				<div class="col-sm-5">
				<?php echo $form->textField($model, 'title', array('class' => 'form-control col-sm-4 isrequired', 'placeholder' => $model->getAttributeLabel('title')) ); ?>
				</div>
				<div class="col-sm-5 control-info"></div>
			</div>

			<div class="form-group">
				<label for="guarantee" class="col-sm-2 control-label"><?php echo $model->getAttributeLabel('guarantee'); ?>：<span class="required">*</span></label>
				<div class="col-sm-5">
				<?php echo $form->textField($model, 'guarantee', array('class' => 'form-control col-sm-4 isrequired', 'placeholder' => $model->getAttributeLabel('guarantee')) ); ?>
				</div>
				<div class="col-sm-5 control-info"></div>
			</div>
			<div class="form-group">
				<label for="amount" class="col-sm-2 control-label"><?php echo $model->getAttributeLabel('amount'); ?>：<span class="required">*</span></label>
				<div class="col-sm-5">
				<?php echo $form->textField($model, 'amount', array('class' => 'form-control col-sm-4 isrequired', 'placeholder' => $model->getAttributeLabel('amount')) ); ?>
				</div>
				<div class="col-sm-5 control-info"></div>
			</div>
			<div class="form-group">
				<label for="rate" class="col-sm-2 control-label"><?php echo $model->getAttributeLabel('rate'); ?>：<span class="required">*</span></label>
				<div class="col-sm-5">
				<?php echo $form->textField($model, 'rate', array('class' => 'form-control col-sm-4 isrequired', 'placeholder' => $model->getAttributeLabel('rate')) ); ?>
				</div>
				<div class="col-sm-5 control-info"></div>
			</div>
			<div class="form-group">
				<label for="time_limit" class="col-sm-2 control-label"><?php echo $model->getAttributeLabel('time_limit'); ?>：<span class="required">*</span></label>
				<div class="col-sm-5">
				<?php echo $form->textField($model, 'time_limit', array('class' => 'form-control col-sm-4 isrequired', 'placeholder' => $model->getAttributeLabel('time_limit')) ); ?>
				</div>
				<div class="col-sm-5 control-info"></div>
			</div>
			<div class="form-group">
				<label for="finance_time" class="col-sm-2 control-label"><?php echo $model->getAttributeLabel('finance_time'); ?>：<span class="required">*</span></label>
				<div class="col-sm-5">
				<?php echo $form->textField($model, 'finance_time', array('class' => 'form-control col-sm-4 _datePicker_time', 'placeholder' => date("Y-m-d H:i:s",$model->getAttributeLabel('finance_time'))) ); ?>
				</div>
				<div class="col-sm-5 control-info"></div>
			</div>
			<div class="form-group">
				<label for="companyName" class="col-sm-2 control-label">是否显示：<span class="required">*</span></label>
				<div class="col-sm-5">
				<select class="form-control col-sm-4 isrequired" name="CmsNoticeInvest[status]" >
					<option value="1" <?php if($model->status == 1) { echo 'selected'; } ?> >显示</option>
					<option value="0" <?php if($model->status != 1) { echo 'selected'; } ?> >隐藏</option>
				</select>
				</div>
  				<div class="col-sm-5 control-info"></div>
			</div>
	<!--<div class="panel panel-primary">
		<div class="panel-heading">
    		<span><?php echo $model->getAttributeLabel('desc'); ?></span>
    	</div>
    	<div class="panel-body" >
			<?php echo $form->textArea($model,'desc',array('rows'=>6, 'cols'=>50, 'class' => 'form-control col-sm-4 isrequired', 'placeholder' => $model->getAttributeLabel('desc'))); ?>
		</div>
	</div>-->

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

$uploadItemImgUrl = Yii::app()->createUrl('upload/ArticleImg');
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
	KindEditor.ready(function(K) {
		$('#NoticeInvestForm textarea').each(function(){
			editors.push(K.create('#' + $(this).attr('id'), { 
						width:'700px', height:'300px',
						uploadJson: '{$uploadItemImgUrl}'
				}));
		});
    });
	
	$('#submitBtn').click(function(){
		var BF = $('#NoticeInvestForm');
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
	$('#NoticeInvestForm .isrequired').each(function(){
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

