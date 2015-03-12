<?php
/* @var $this CompanyController */
/* @var $model FinancingCompany */
/* @var $form CActiveForm */

Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl ."/plugins/kindeditor/kindeditor-all.js");
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl ."/plugins/kindeditor/lang/zh_CN.js");

?>

<div class="form form-horizontal">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'financing-company-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">带<span class="required">*</span>号的为必填项</p>

	<div class="form-group">
		<?php echo $form->labelEx($model,'name', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<?php echo $form->textField($model, 'name', array('class' => 'form-control col-sm-4 isrequired', 'size'=>60,'maxlength'=>100)); ?>
		</div>
		<div class="col-sm-5 control-info"><?php echo $form->error($model,'name'); ?></div>
	</div>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'user_id', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<input type="text" class="form-control col-sm-4" id="username" placeholder="绑定的用户" value="<?php echo $model->user->user_name; ?>" autocomplete="off" />
		<input type="hidden" id="user_id" name="FinancingCompany[user_id]" placeholder="绑定的用户" value="<?php echo $model->user_id;?>" >
		</div>
		<div class="col-sm-5 control-info"></div>
	</div>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'company_no', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<?php echo $form->textField($model, 'company_no', array('class' => 'form-control col-sm-4 isrequired', 'size'=>60,'maxlength'=>100)); ?>
		</div>
		<div class="col-sm-5 control-info"><?php echo $form->error($model,'company_no'); ?></div>
	</div>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'tel', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<?php echo $form->textField($model, 'tel', array('class' => 'form-control col-sm-4 isrequired', 'size'=>11,'maxlength'=>11)); ?>
		</div>
		<div class="col-sm-5 control-info"><?php echo $form->error($model,'tel'); ?></div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'address', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<?php echo $form->textField($model, 'address', array('class' => 'form-control col-sm-4 isrequired', 'size'=>60,'maxlength'=>255)); ?>
		</div>
		<div class="col-sm-5 control-info"><?php echo $form->error($model,'address'); ?></div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'link_user', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<?php echo $form->textField($model, 'link_user', array('class' => 'form-control col-sm-4 isrequired', 'size'=>20,'maxlength'=>20)); ?>
		</div>
		<div class="col-sm-5 control-info"><?php echo $form->error($model,'link_user'); ?></div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'link_mobile', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<?php echo $form->textField($model, 'link_mobile', array('class' => 'form-control col-sm-4 isrequired', 'size'=>15,'maxlength'=>15)); ?>
		</div>
		<div class="col-sm-5 control-info"><?php echo $form->error($model,'link_mobile'); ?></div>
	</div>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'information', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
		<?php echo $form->textArea($model, 'information', array('class' => 'form-control col-sm-4 isrequired', 'rows'=>6, 'cols'=>50)); ?>
		<div><?php echo $form->error($model,'information'); ?></div>
		</div>
	</div>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'qualification', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
		<?php echo $form->textArea($model, 'qualification', array('class' => 'form-control col-sm-4 isrequired', 'rows'=>6, 'cols'=>50)); ?>
		<div><?php echo $form->error($model,'qualification'); ?></div>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'intro', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
		<?php echo $form->textArea($model, 'intro', array('class' => 'form-control col-sm-4 isrequired', 'rows'=>6, 'cols'=>50)); ?>
		<div><?php echo $form->error($model,'intro'); ?></div>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'background', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
		<?php echo $form->textArea($model, 'background', array('class' => 'form-control col-sm-4 isrequired', 'rows'=>6, 'cols'=>50)); ?>
		<div><?php echo $form->error($model,'background'); ?></div>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'website', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<?php echo $form->textField($model, 'website', array('class' => 'form-control col-sm-4 isrequired', 'size'=>60,'maxlength'=>1000)); ?>
		</div>
		<div class="col-sm-5 control-info"><?php echo $form->error($model,'website'); ?></div>
	</div>

	<div class="form-group">
		<div class="col-sm-2"></div>
		<div class="col-sm-10">
			<?php echo CHtml::submitButton($model->isNewRecord ? '添加新企业' : '保存企业信息', array('class' => 'btn btn-large btn-primary', 'id' => 'submitBtn')); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<script type="text/javascript" >
var uploadCompanyImgUrl = '<?php echo Yii::app()->createUrl('upload/CompanyImg'); ?>';
var editors = [];
$(document).ready(function() {
	$("#username").autocomplete({
        source: "/user/autocomplete",
        minLength: 2,
        select: function( event, ui ){
        	$('#user_id').val(ui.item.value);
        	$('#username').val(ui.item.label);
       	 	return false;
        }
    });
	// init KindEditor
	KindEditor.ready(function(K) {
		$('#financing-company-form textarea').each(function(){
			editors.push(K.create('#' + $(this).attr('id'), { 
				width:'700px', height:'300px',
				uploadJson: uploadCompanyImgUrl
			}));
		});
    });
	
});

</script>