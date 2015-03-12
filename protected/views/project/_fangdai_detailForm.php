<?php

Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl ."/plugins/kindeditor/kindeditor-all.js", CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl ."/plugins/kindeditor/lang/zh_CN.js", CClientScript::POS_END);

?>

<div class="form-horizontal" >
	<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'ItemDetailForm',
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
    		<span><?php echo $model->getAttributeLabel('idea_repay'); ?></span>
    	</div>
    	<div class="panel-body" >
			<?php echo $form->textArea($model,'idea_repay',array('rows'=>6, 'cols'=>50, 'class' => 'form-control col-sm-4 ', 'placeholder' => $model->getAttributeLabel('idea_repay'))); ?>
			<?php echo $form->error($model,'idea_repay'); ?>
		</div>
	</div>
	
	<div class="panel panel-primary">
		<div class="panel-heading">
    		<span>放款意见</span>
    	</div>
    	<div class="panel-body" >
			<?php echo $form->textArea($model,'idea_market',array('rows'=>6, 'cols'=>50, 'class' => 'form-control col-sm-4 ', 'placeholder' => $model->getAttributeLabel('idea_market'))); ?>
			<?php echo $form->error($model,'idea_market'); ?>
		</div>
	</div>
	<div class="text-center">
		<input type="hidden" name="submit" value="true" />
        <button type="button" class="btn btn-large btn-primary" id="submitBtn" >提交项目信息</button>
    </div>
	<?php $this->endWidget(); ?>

<script type="text/javascript" >
var uploadItemImgUrl = '<?php echo Yii::app()->createUrl('upload/ItemImg'); ?>';
var editors = [];
$(document).ready(function() {
	KindEditor.ready(function(K) {
		$('#ItemDetailForm textarea').each(function(){
			editors.push(K.create('#' + $(this).attr('id'), {
				 width:'700px', height:'300px',
				 uploadJson: uploadItemImgUrl
			}));
		});
    });
	
	$('#submitBtn').click(function(){
		var BF = $('#ItemDetailForm');
		for( i in editors ) {
			editors[i].sync();
			console.log(editors[i].html());
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
					  $('#submitBtn').attr('disabled', false);
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
	$('#ItemDetailForm .isrequired').each(function(){
		if($(this).val() == undefined || $(this).val() === '') {
			if(!_focus) {
				$(this).focus();
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
</script>

</div>