<?php
/* @var $this DebtSellController */
/* @var $model DebtSell */
/* @var $form CActiveForm */
?>

<div class="form form-horizontal">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'debt-sell-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">带<span class="required">*</span>号的为必填项.</p>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'number', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<?php echo $form->textField($model, 'number', array('class' => 'form-control col-sm-4', 'size'=>30,'maxlength'=>30)); ?>
		</div>
		<div class="col-sm-5 control-info">
		<?php echo $form->error($model,'number'); ?>
		</div>
	</div>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'user_id', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<?php echo $form->textField($model, 'user_id', array('class' => 'form-control col-sm-4', 'size'=>11,'maxlength'=>11)); ?>
		</div>
		<div class="col-sm-5 control-info">
		<?php echo $form->error($model,'user_id'); ?>
		</div>
	</div>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'invest_id', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<?php echo $form->textField($model, 'invest_id', array('class' => 'form-control col-sm-4', 'size'=>11,'maxlength'=>11)); ?>
		</div>
		<div class="col-sm-5 control-info">
		<?php echo $form->error($model,'invest_id'); ?>
		</div>
	</div>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'item_id', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<?php echo $form->textField($model, 'item_id', array('class' => 'form-control col-sm-4', 'size'=>11,'maxlength'=>11)); ?>
		</div>
		<div class="col-sm-5 control-info">
		<?php echo $form->error($model,'item_id'); ?>
		</div>
	</div>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'status', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<?php echo $form->dropDownList($model,'status', $model->statusAttrs, array('class' => 'form-control col-sm-4')); ?>
		</div>
		<div class="col-sm-5 control-info">
		<?php echo $form->error($model,'status'); ?>
		</div>
	</div>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'category', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<?php echo $form->textField($model, 'category', array('class' => 'form-control col-sm-4')); ?>
		</div>
		<div class="col-sm-5 control-info">
		<?php echo $form->error($model,'category'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'amount', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<?php echo $form->textField($model, 'amount', array('class' => 'form-control col-sm-4','size'=>10,'maxlength'=>10)); ?>
		</div>
		<div class="col-sm-5 control-info">
		<?php echo $form->error($model,'amount'); ?>
		</div>
	</div>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'real_amount', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<?php echo $form->textField($model, 'real_amount', array('class' => 'form-control col-sm-4','size'=>10,'maxlength'=>10)); ?>
		</div>
		<div class="col-sm-5 control-info">
		<?php echo $form->error($model,'real_amount'); ?>
		</div>
	</div>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'buyer_apr', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<?php echo $form->textField($model, 'buyer_apr', array('class' => 'form-control col-sm-4','size'=>6,'maxlength'=>6)); ?>
		</div>
		<div class="col-sm-5 control-info">
		<?php echo $form->error($model,'buyer_apr'); ?>
		</div>
	</div>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'repayment_time', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<?php echo $form->textField($model, 'repayment_time', array('class' => 'form-control col-sm-4')); ?>
		</div>
		<div class="col-sm-5 control-info">
		<?php echo $form->error($model,'repayment_time'); ?>
		</div>
	</div>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'price', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<?php echo $form->textField($model, 'price', array('class' => 'form-control col-sm-4','size'=>10,'maxlength'=>10)); ?>
		</div>
		<div class="col-sm-5 control-info">
		<?php echo $form->error($model,'price'); ?>
		</div>
	</div>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'transferred_amount', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<?php echo $form->textField($model, 'transferred_amount', array('class' => 'form-control col-sm-4','size'=>10,'maxlength'=>10)); ?>
		</div>
		<div class="col-sm-5 control-info">
		<?php echo $form->error($model,'transferred_amount'); ?>
		</div>
	</div>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'transferred_num', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<?php echo $form->textField($model, 'transferred_num', array('class' => 'form-control col-sm-4')); ?>
		</div>
		<div class="col-sm-5 control-info">
		<?php echo $form->error($model,'transferred_num'); ?>
		</div>
	</div>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'addtime', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<?php echo $form->textField($model, 'addtime', array('class' => 'form-control col-sm-4')); ?>
		</div>
		<div class="col-sm-5 control-info">
		<?php echo $form->error($model,'addtime'); ?>
		</div>
	</div>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'sell_days', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<?php echo $form->textField($model, 'sell_days', array('class' => 'form-control col-sm-4')); ?>
		</div>
		<div class="col-sm-5 control-info">
		<?php echo $form->error($model,'sell_days'); ?>
		</div>
	</div>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'sell_start_time', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<?php echo $form->textField($model, 'sell_start_time', array('class' => 'form-control col-sm-4')); ?>
		</div>
		<div class="col-sm-5 control-info">
		<?php echo $form->error($model,'sell_start_time'); ?>
		</div>
	</div>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'sell_end_time', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<?php echo $form->textField($model, 'sell_end_time', array('class' => 'form-control col-sm-4')); ?>
		</div>
		<div class="col-sm-5 control-info">
		<?php echo $form->error($model,'sell_end_time'); ?>
		</div>
	</div>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'real_apr', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<?php echo $form->textField($model, 'real_apr', array('class' => 'form-control col-sm-4')); ?>
		</div>
		<div class="col-sm-5 control-info">
		<?php echo $form->error($model,'real_apr'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'desc', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<?php echo $form->textarea($model, 'desc', array('class' => 'form-control col-sm-4','size'=>60,'maxlength'=>255)); ?>
		</div>
		<div class="col-sm-5 control-info">
		<?php echo $form->error($model,'desc'); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-2"></div>
		<div class="col-sm-10">
			<?php echo CHtml::submitButton($model->isNewRecord ? '添加记录' : '保存更改', array('class' => 'btn btn-large btn-primary', 'id' => 'submitBtn')); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->