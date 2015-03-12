<?php
/* @var $this ManagerUserController */
/* @var $model ManagerUser */

$this->breadcrumbs=array(
	'Manager Users'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ManagerUser', 'url'=>array('index')),
	array('label'=>'Create ManagerUser', 'url'=>array('create')),
	array('label'=>'View ManagerUser', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ManagerUser', 'url'=>array('admin')),
);
?>

<h1>更新管理用户信息<?php echo $model->id; ?></h1>

<div class="form form-horizontal">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'manager-user-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">带<span class="required">*</span>号的为必填项.</p>

	<div class="form-group">
		<?php echo $form->labelEx($model,'username', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<?php echo $form->textField($model, 'username', array('class' => 'form-control col-sm-4 isrequired', 'size'=>50,'maxlength'=>50)); ?>
		</div>
		<div class="col-sm-5 control-info"><?php echo $form->error($model,'username'); ?></div>
	</div>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'email', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<?php echo $form->textField($model, 'email', array('class' => 'form-control col-sm-4 isrequired', 'size'=>50,'maxlength'=>50)); ?>
		</div>
		<div class="col-sm-5 control-info"><?php echo $form->error($model,'email'); ?></div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-2"></div>
		<div class="col-sm-10">
			<?php echo CHtml::submitButton('保存', array('class' => 'btn btn-large btn-primary', 'id' => 'submitBtn')); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->