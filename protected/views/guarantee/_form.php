<?php
/* @var $this GuaranteeController */
/* @var $model GuaranteeInfo */
/* @var $form CActiveForm */
?>

<div class="form form-horizontal">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'guarantee-info-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">带<span class="required">*</span>号的为必填项.</p>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'name', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<?php echo $form->textField($model, 'name', array('class' => 'form-control col-sm-4 isrequired', 'size'=>60,'maxlength'=>100)); ?>
		</div>
		<div class="col-sm-5 control-info"><?php echo $form->error($model,'name'); ?></div>
	</div>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'user_name', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<?php echo $form->textField($model, 'user_name', array('class' => 'form-control col-sm-4 isrequired', 'size'=>60,'maxlength'=>100)); ?>
		</div>
		<div class="col-sm-5 control-info"><?php echo $form->error($model,'user_name'); ?></div>
	</div>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'abbr', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<?php echo $form->textField($model, 'abbr', array('class' => 'form-control col-sm-4 isrequired', 'size'=>60,'maxlength'=>100)); ?>
		</div>
		<div class="col-sm-5 control-info"><?php echo $form->error($model,'abbr'); ?></div>
	</div>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'tel', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<?php echo $form->textField($model, 'tel', array('class' => 'form-control col-sm-4 isrequired', 'size'=>15,'maxlength'=>15)); ?>
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
		<?php echo $form->labelEx($model,'qualification', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<?php echo $form->textField($model, 'qualification', array('class' => 'form-control col-sm-4 isrequired', 'size'=>20,'maxlength'=>20)); ?>
		</div>
		<div class="col-sm-5 control-info"><?php echo $form->error($model,'qualification'); ?></div>
	</div>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'intro', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<?php echo $form->textArea($model, 'intro', array('class' => 'form-control col-sm-4 isrequired', 'rows'=>6,'cols'=>50)); ?>
		</div>
		<div class="col-sm-5 control-info"><?php echo $form->error($model,'intro'); ?></div>
	</div>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'logo_pic', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<?php echo $form->textArea($model, 'logo_pic', array('class' => 'form-control col-sm-4 isrequired', 'size'=>60,'maxlength'=>255)); ?>
		</div>
		<div class="col-sm-5 control-info"><?php echo $form->error($model,'logo_pic'); ?></div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'status', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<?php echo $form->textArea($model, 'status', array('class' => 'form-control col-sm-4 isrequired', 'size'=>60,'maxlength'=>200)); ?>
		</div>
		<div class="col-sm-5 control-info"><?php echo $form->error($model,'status'); ?></div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-2"></div>
		<div class="col-sm-10">
			<?php echo CHtml::submitButton($model->isNewRecord ? '创建担保机构信息' : '保存担保机构信息', array('class' => 'btn btn-large btn-primary', 'id' => 'submitBtn')); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->