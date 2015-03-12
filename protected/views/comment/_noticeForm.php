
<div class="form-horizontal" >
	<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'CommentForm',
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
				<label for="userid" class="col-sm-2 control-label"><?php echo $model->getAttributeLabel('userid'); ?>：<span class="required"></span></label>
				<div class="col-sm-5">
					<h5><?php echo $model->userid;?></h5>
				</div>
				<div class="col-sm-5 control-info"></div>
			</div>
			<div class="form-group">
				<label for="username" class="col-sm-2 control-label"><?php echo $model->getAttributeLabel('username'); ?>：<span class="required"></span></label>
				<div class="col-sm-5">
					<h5><?php echo $model->username;?></h5>
				</div>
				<div class="col-sm-5 control-info"></div>
			</div>
			<div class="form-group">
				<label for="item_id" class="col-sm-2 control-label"><?php echo $model->getAttributeLabel('item_id'); ?>：<span class="required"></span></label>
				<div class="col-sm-5">
					<h5><?php echo $model->item_id;?></h5>
				</div>
				<div class="col-sm-5 control-info"></div>
			</div>
			<div class="form-group">
				<label for="sendtime" class="col-sm-2 control-label"><?php echo $model->getAttributeLabel('sendtime'); ?>：<span class="required"></span></label>
				<div class="col-sm-5">
					<h5><?php echo date('Y-m-d H:i',$model->sendtime);?></h5>
				</div>
				<div class="col-sm-5 control-info"></div>
			</div>
			<div class="form-group">
				<label for="ip" class="col-sm-2 control-label"><?php echo $model->getAttributeLabel('ip'); ?>：<span class="required"></span></label>
				<div class="col-sm-5">
					<h5><?php echo $model->ip;?></h5>
				</div>
				<div class="col-sm-5 control-info"></div>
			</div>
			<div class="form-group">
				<label for="status" class="col-sm-2 control-label"><?php echo $model->getAttributeLabel('status'); ?>：<span class="required">*</span></label>
				<div class="col-sm-5">
				<select class="form-control col-sm-4 isrequired" name="Comment[status]" >
					<?php foreach($model->statusArrs as $key => $value){?>
					<option value="<?php echo $key;?>" <?php if($model->status == $key) { echo 'selected'; } ?> ><?php echo $value;?></option>
					<?php }?>
				</select>
				</div>
  				<div class="col-sm-5 control-info"></div>
			</div>
	<div class="panel panel-primary">
		<div class="panel-heading">
    		<span><?php echo $model->getAttributeLabel('message'); ?></span>
    	</div>
    	<div class="panel-body" >
			<?php echo $form->textArea($model,'message',array('rows'=>6, 'cols'=>50, 'class' => 'form-control col-sm-4 isrequired', 'placeholder' => $model->getAttributeLabel('message'))); ?>
		</div>
	</div>
	<div class="panel panel-primary">
		<div class="panel-heading">
    		<span><?php echo $model->getAttributeLabel('repay'); ?></span>
    	</div>
    	<div class="panel-body" >
			<?php echo $form->textArea($model,'repay',array('rows'=>6, 'cols'=>50, 'class' => 'form-control col-sm-4 isrequired', 'placeholder' => $model->getAttributeLabel('repay'))); ?>
		</div>
	</div>

	<div class="text-center">
		<input type="hidden" name="submit" value="true" />
        <button type="button" class="btn btn-large btn-primary" id="submitBtn" >提交审核</button>
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
		$('#CommentForm textarea').each(function(){
			editors.push(K.create('#' + $(this).attr('id'), { 
						width:'700px', height:'300px',
						uploadJson: '{$uploadItemImgUrl}'
				}));
		});
    });
	
	$('#submitBtn').click(function(){
		var BF = $('#CommentForm');
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
	$('#CommentForm .isrequired').each(function(){
		if($(this).val() == undefined || $(this).val() === '') {
			if(!_focus) {
				if($(this).attr('id') == 'is_recommend') {
					$('#title').focus();
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

