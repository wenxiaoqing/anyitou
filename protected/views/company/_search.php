<?php
/* @var $this CompanyController */
/* @var $model FinancingCompany */
/* @var $form CActiveForm */
?>

<div class="wide form form-horizontal">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'name', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<?php echo $form->textField($model, 'name', array('class' => 'form-control col-sm-4 isrequired', 'size'=>60,'maxlength'=>100)); ?>
		</div>
		<div class="col-sm-5 control-info"></div>
	</div>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'tel', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<?php echo $form->textField($model, 'tel', array('class' => 'form-control col-sm-4 isrequired', 'size'=>11,'maxlength'=>11)); ?>
		</div>
		<div class="col-sm-5 control-info"></div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'tel', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<?php echo $form->textField($model, 'tel', array('class' => 'form-control col-sm-4 isrequired', 'size'=>11,'maxlength'=>11)); ?>
		</div>
		<div class="col-sm-5 control-info"></div>
	</div>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'address', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<?php echo $form->textField($model, 'address', array('class' => 'form-control col-sm-4 isrequired', 'size'=>60,'maxlength'=>255)); ?>
		</div>
		<div class="col-sm-5 control-info"></div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'link_user', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<?php echo $form->textField($model, 'link_user', array('class' => 'form-control col-sm-4 isrequired', 'size'=>20,'maxlength'=>20)); ?>
		</div>
		<div class="col-sm-5 control-info"></div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'link_mobile', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<?php echo $form->textField($model, 'link_mobile', array('class' => 'form-control col-sm-4 isrequired', 'size'=>15,'maxlength'=>15)); ?>
		</div>
		<div class="col-sm-5 control-info"></div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'qualification', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<?php echo $form->textField($model, 'qualification', array('class' => 'form-control col-sm-4 isrequired', 'size'=>60,'maxlength'=>255)); ?>
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

</div>