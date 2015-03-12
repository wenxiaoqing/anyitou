<?php
/* @var $this ClassController */
/* @var $model CmsClass */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cms-channel-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('class' => 'form-horizontal', 'role' => 'form'),
)); ?>
	<div class="form-body">
		<div class="form-group">
			<?php echo $form->labelEx($model,'channel_id', array('class'=>'col-md-2 control-label')); ?>
			<div class="col-md-10">
				<?php echo $form->dropDownList($model, 'channel_id', CHtml::listData($channelARs, 'channel_id', 'name'), array('class' => 'form-control input-large isrequired', 'placeholder' => $model->getAttributeLabel('channel'))); ?>
				<?php echo $form->error($model,'channel_id', array('class'=>'help-block' )); ?>
			</div>
		</div>
		<div class="form-group">
			<?php echo $form->labelEx($model,'class_id', array('class'=>'col-md-2 control-label')); ?>
			<div class="col-md-10">
				<?php echo $form->dropDownList($model, 'class_id', CHtml::listData($classARs, 'class_id', 'class'), array('class' => 'form-control input-large isrequired', 'placeholder' => $model->getAttributeLabel('class'))); ?>
				<?php echo $form->error($model,'class_id', array('class'=>'help-block' )); ?>
			</div>
		</div>
		<div class="form-group">
			<?php echo $form->labelEx($model,'title', array('class'=>'col-md-2 control-label')); ?>
			<div class="col-md-10">
				<?php echo $form->textField($model, 'title', array('class' => 'form-control input-large isrequired', 'size'=>60,'maxlength'=>100, 'placeholder' => $model->getAttributeLabel('title'))); ?>
				<?php echo $form->error($model,'title', array('class'=>'help-block' )); ?>
			</div>
		</div>
		<div class="form-group">
			<?php echo $form->labelEx($model,'sub_title', array('class'=>'col-md-2 control-label')); ?>
			<div class="col-md-10">
				<?php echo $form->textField($model, 'sub_title', array('class' => 'form-control input-large', 'size'=>30,'maxlength'=>30, 'placeholder' => $model->getAttributeLabel('sub_title'))); ?>
				<?php echo $form->error($model,'sub_title', array('class'=>'help-block' )); ?>
			</div>
		</div>
		<div class="form-group">
			<?php echo $form->labelEx($model,'summary', array('class'=>'col-md-2 control-label')); ?>
			<div class="col-md-10">
				<?php echo $form->textArea($model, 'summary', array('class' => 'form-control input-large', 'rows'=>6, 'cols'=>50, 'placeholder' => $model->getAttributeLabel('summary'))); ?>
				<?php echo $form->error($model,'summary', array('class'=>'help-block' )); ?>
			</div>
		</div>
		<div class="form-group">
			<?php echo $form->labelEx($model,'content', array('class'=>'col-md-2 control-label')); ?>
			<div class="col-md-10">
				<?php echo $form->textArea($model, 'content', array('class' => 'form-control input-large isrequired', 'rows'=>6, 'cols'=>50, 'placeholder' => $model->getAttributeLabel('content'))); ?>
				<?php echo $form->error($model,'content', array('class'=>'help-block' )); ?>
			</div>
		</div>
		<div class="form-group">
			<?php echo $form->labelEx($model,'keyword', array('class'=>'col-md-2 control-label')); ?>
			<div class="col-md-10">
				<?php echo $form->textField($model, 'keyword', array('class' => 'form-control input-large', 'size'=>50,'maxlength'=>50, 'placeholder' => $model->getAttributeLabel('keyword'))); ?>
				<?php echo $form->error($model,'keyword', array('class'=>'help-block' )); ?>
			</div>
		</div>
		<div class="form-group">
			<?php echo $form->labelEx($model,'seacher_text', array('class'=>'col-md-2 control-label')); ?>
			<div class="col-md-10">
				<?php echo $form->textArea($model, 'seacher_text', array('class' => 'form-control input-large', 'rows'=>6, 'cols'=>50, 'placeholder' => $model->getAttributeLabel('seacher_text'))); ?>
				<?php echo $form->error($model,'seacher_text', array('class'=>'help-block' )); ?>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 control-label" for="CmsArticle_add_date"><?php echo $model->getAttributeLabel('add_date'); ?> </label>
			<div class="col-md-10">
				<?php echo $form->textField($model,'add_date', array('class' => 'form-control input-large _datePicker', 
											'placeholder' => $model->getAttributeLabel('add_date'))); ?>
				<?php echo $form->error($model,'add_date', array('class'=>'help-block' )); ?>
			</div>
		</div>
		<div class="form-group">
			<?php echo $form->labelEx($model,'is_recommend', array('class'=>'col-md-2 control-label')); ?>
			<div class="col-md-10">
				<div class="radio-list">
					<?php echo $form->radioButtonList($model, 'is_recommend',
							array(1=>'推荐', 0=>'不推荐'), 
							array('separator'=>'', 'template'=>'<label class="radio-inline">{input} {label}</label>', 'placeholder' => $model->getAttributeLabel('is_recommend')));
					?>
				</div>
				<?php echo $form->error($model,'is_recommend', array('class'=>'help-block' )); ?>
			</div>
		</div>
	</div>
	<div class="form-actions fluid">
		<div class="col-md-offset-2 col-md-10">
			<?php echo CHtml::link($model->isNewRecord ? '创建' : '保存', 'javascript:void(0);', array('class' => 'btn btn-primary', 'id' => 'submitBtn')); ?>
		</div>
	</div>
<?php $this->endWidget(); ?>

<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl ."/plugins/jquery-ui/jquery-ui-timepicker.js", CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl ."/plugins/jquery-ui/jquery-ui-datepicker_zh_cn.js", CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl ."/plugins/jquery-ui/jquery-ui-timepicker_zh_cn.js", CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl ."/plugins/kindeditor/kindeditor-all.js", CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl ."/plugins/kindeditor/lang/zh_CN.js", CClientScript::POS_END);

$uploadArticleImgUrl = Yii::app()->createUrl('upload/ArticleImg');

$_script = <<<EOF
var editors = [];
$(document).ready(function() {
	$('._datePicker').datetimepicker({
		dateFormat: 'yy-mm-dd',
		timeFormat: 'HH:mm:ss'
	});
	KindEditor.ready(function(K) {
		$('textarea').each(function(){
			editors.push(K.create('#' + $(this).attr('id'), { 
				width:'700px', height:'300px',
				uploadJson: '{$uploadArticleImgUrl}'
			}));
		});
    });
	$('#submitBtn').click(function(){
		var CCF = $('#cms-channel-form');
		for( i in editors ) {
			editors[i].sync();
		}
		if(checkFrom()) {
			$(this).attr('disabled',"true");
			$.ajax({
			  type: 'POST',
			  url: CCF.attr('action'),
			  data: CCF.serialize(),
			  success: function(data){
				  BootstrapDialog.alert({title: '提示信息', message: data.message, buttonLabel:'确定'});
				  $('#submitBtn').attr('disabled',"false");
				  if(data.status == true) {
					setTimeout(function(){
						window.location.href = data.url;
					}, 3000);
				  } else {
					  $(this).attr('disabled',"false");
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
	$('#cms-channel-form .isrequired').each(function(){
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
EOF;
Yii::app()->getClientScript()->registerScript(__CLASS__, $_script);

?>