<?php
/* @var $this DebtInvestLogController */
/* @var $model DebtInvestLog */
/* @var $form CActiveForm */
?>

<div class="form form-horizontal">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'debt-invest-log-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">带<span class="required">*</span>号的为必填项.</p>

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
		<?php echo $form->labelEx($model,'user_id', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<?php echo $form->textField($model, 'user_id', array('class' => 'form-control col-sm-4', 'size'=>11,'maxlength'=>11)); ?>
		</div>
		<div class="col-sm-5 control-info">
		<?php echo $form->error($model,'user_id'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'seller_user_id', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<?php echo $form->textField($model, 'seller_user_id', array('class' => 'form-control col-sm-4', 'size'=>11,'maxlength'=>11)); ?>
		</div>
		<div class="col-sm-5 control-info">
		<?php echo $form->error($model,'seller_user_id'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'debt_id', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<?php echo $form->textField($model, 'debt_id', array('class' => 'form-control col-sm-4', 'size'=>10,'maxlength'=>10)); ?>
		</div>
		<div class="col-sm-5 control-info">
		<?php echo $form->error($model,'debt_id'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'debt_invest_id', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<?php echo $form->textField($model, 'debt_invest_id', array('class' => 'form-control col-sm-4', 'size'=>11,'maxlength'=>11)); ?>
		</div>
		<div class="col-sm-5 control-info">
		<?php echo $form->error($model,'debt_invest_id'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'item_id', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<?php echo $form->textField($model, 'item_id', array('class' => 'form-control col-sm-4', 'size'=>10,'maxlength'=>10)); ?>
		</div>
		<div class="col-sm-5 control-info">
		<?php echo $form->error($model,'item_id'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'trade_no', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<?php echo $form->textField($model, 'trade_no', array('class' => 'form-control col-sm-4', 'size'=>50,'maxlength'=>50)); ?>
		</div>
		<div class="col-sm-5 control-info">
		<?php echo $form->error($model,'trade_no'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'amount', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<?php echo $form->textField($model, 'amount', array('class' => 'form-control col-sm-4', 'size'=>10,'maxlength'=>10)); ?>
		</div>
		<div class="col-sm-5 control-info">
		<?php echo $form->error($model,'amount'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'real_amount', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<?php echo $form->textField($model, 'real_amount', array('class' => 'form-control col-sm-4', 'size'=>10,'maxlength'=>10)); ?>
		</div>
		<div class="col-sm-5 control-info">
		<?php echo $form->error($model,'real_amount'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'price', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<?php echo $form->textField($model, 'price', array('class' => 'form-control col-sm-4', 'size'=>10,'maxlength'=>10)); ?>
		</div>
		<div class="col-sm-5 control-info">
		<?php echo $form->error($model,'price'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'fee', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<?php echo $form->textField($model, 'fee', array('class' => 'form-control col-sm-4', 'size'=>10,'maxlength'=>10)); ?>
		</div>
		<div class="col-sm-5 control-info">
		<?php echo $form->error($model,'fee'); ?>
		</div>
	</div>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'agreement_id', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<?php echo $form->textField($model, 'agreement_id', array('class' => 'form-control col-sm-4', 'size'=>30,'maxlength'=>30)); ?>
		</div>
		<div class="col-sm-5 control-info">
		<?php echo $form->error($model,'agreement_id'); ?>
		</div>
	</div>


	<div class="form-group">
		<?php echo $form->labelEx($model,'status', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<?php echo $form->textField($model,'status', array('class' => 'form-control col-sm-4')); ?>
		</div>
		<div class="col-sm-5 control-info">
		<?php echo $form->error($model,'status'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'addtime', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<?php echo $form->textField($model,'addtime', array('class' => 'form-control col-sm-4')); ?>
		</div>
		<div class="col-sm-5 control-info">
		<?php echo $form->error($model,'addtime'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'pay_time', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<?php echo $form->textField($model,'pay_time', array('class' => 'form-control col-sm-4')); ?>
		</div>
		<div class="col-sm-5 control-info">
		<?php echo $form->error($model,'pay_time'); ?>
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