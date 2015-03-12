<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="wide form form-horizontal">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
	<div class="form-group">
		<?php echo $form->labelEx($model,'item_title', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<?php echo $form->textField($model, 'item_title', array('class' => 'form-control col-sm-4')); ?>
		</div>
		<div class="col-sm-5 control-info"></div>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'username', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<?php echo $form->textField($model, 'username', array('class' => 'form-control col-sm-4')); ?>
		</div>
		<div class="col-sm-5 control-info"></div>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'type', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<?php echo $form->dropDownList($model,'type', $model->typeAttrs, array('class' => 'form-control', 'placeholder' => $model->getAttributeLabel('type'))); ?>
		</div>
		<div class="col-sm-5 control-info"></div>
	</div>
	<div class="form-group">
		<div class="col-sm-2"></div>
		<div class="col-sm-10">
			<?php echo CHtml::submitButton('搜索', array('class' => 'btn btn-large btn-primary', 'id' => 'submitBtn')); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->