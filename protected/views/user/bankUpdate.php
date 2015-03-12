<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'银行卡管理'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'修改',
);

$this->menu=array(
	array('label'=>'查看信息', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'管理列表', 'url'=>array('UserBankFunds')),
);
?>

<h1>修改用户信息 <?php echo $model->id; ?></h1>


<div class="form form-horizontal">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">带<span class="required">*</span>号的为必填项.</p>

	
	<div class="form-group">
		<?php echo $form->labelEx($model,'user_id', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<?php echo $form->textField($model, 'user_id', array('class' => 'form-control col-sm-4 isrequired', 'size'=>20,'maxlength'=>20)); ?>
		</div>
		<div class="col-sm-5 control-info"><?php echo $form->error($model,'user_id'); ?></div>
	</div>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'bank_id', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<?php echo $form->textField($model, 'bank_id', array('class' => 'form-control col-sm-4 isrequired', 'size'=>20,'maxlength'=>20)); ?>
		</div>
		<div class="col-sm-5 control-info"><?php echo $form->error($model,'bank_id'); ?></div>
	</div>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'bank_address', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<?php echo $form->textField($model, 'bank_address', array('class' => 'form-control col-sm-4 isrequired', 'size'=>20,'maxlength'=>20)); ?>
		</div>
		<div class="col-sm-5 control-info"><?php echo $form->error($model,'bank_address'); ?></div>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'bank_card_no', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<?php echo $form->textField($model, 'bank_card_no', array('class' => 'form-control col-sm-4 isrequired', 'size'=>20,'maxlength'=>20)); ?>
		</div>
		<div class="col-sm-5 control-info"><?php echo $form->error($model,'bank_card_no'); ?></div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-2"></div>
		<div class="col-sm-10">
			<?php echo CHtml::submitButton('保存信息', array('class' => 'btn btn-large btn-primary', 'id' => 'submitBtn')); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div>