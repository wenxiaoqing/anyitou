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
		<?php echo $form->textField($model, 'item_title', array('class' => 'form-control col-sm-4 isrequired')); ?>
		</div>
		<div class="col-sm-5 control-info"></div>
	</div>
	<!--<div class="form-group">
		<label class='col-sm-2 control-label'>担保公司</label>
		<div class="col-sm-5">
		<input type="text" name="ItemInfo['guarantee_id']" class="form-control col-sm-4">
		</div>
	</div>-->
	<div class="form-group">
		<?php echo $form->labelEx($model,'guarantee_id', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<?php echo $form->textField($model, 'guarantee_id', array('class' => 'form-control col-sm-4 isrequired')); ?>
		</div>
		<div class="col-sm-5 control-info"></div>
	</div>
	<div class="form-group">
		<label for="category" class="col-sm-2 control-label"><?php echo $model->getAttributeLabel('category'); ?>：</label>
		<div class="col-sm-5">
		<?php echo $form->dropDownList($model, 'category', $model->categoryArrs, array('class' => 'form-control isrequired', 'placeholder' => $model->getAttributeLabel('category'))); ?>
		</div>
  		<div class="col-sm-5 control-info"></div>
	</div>	
	<div class="form-group">
		<label for="category" class="col-sm-2 control-label"><?php echo $model->getAttributeLabel('invest_status'); ?>：</label>
		<div class="col-sm-5">
		<?php echo $form->dropDownList($model, 'invest_status', $model->investStatusArrs, array('class' => 'form-control isrequired', 'placeholder' => $model->getAttributeLabel('invest_status'))); ?>
		</div>
  		<div class="col-sm-5 control-info"></div>
	</div>	
	<!--<div class="form-group">
		<label class='col-sm-2 control-label'>借款公司</label>
		<div class="col-sm-5">
		<input type="text" name="ItemInfo['company_id']" class="form-control col-sm-4">
		</div>
	</div>-->
	<div class="form-group">
		<?php echo $form->labelEx($model,'company_id', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<?php echo $form->textField($model, 'company_id', array('class' => 'form-control col-sm-4', 'size'=>50,'maxlength'=>50)); ?>
		</div>
		<div class="col-sm-5 control-info"></div>
	</div>
	<div class="form-group">
	<lable class="col-sm-2 control-label">开始时间</lable><div class="col-sm-5">
	<?php echo $form->textField($model, 'begin_time', array('class' => 'form-control col-sm-4 _datePicker', 'size'=>50,'maxlength'=>50)); ?>
	</div>
    <div class="col-sm-5 control-info"><?php echo $form->error($model,'begin_time');?></div>
 </div>
 	<div class="form-group">
	<lable class="col-sm-2 control-label">还款时间</lable><div class="col-sm-5">
	<?php echo $form->textField($model, 'repayment_time', array('class' => 'form-control col-sm-4 _datePicker', 'size'=>50,'maxlength'=>50)); ?>
	</div>
 <div class="col-sm-5 control-info"><?php echo $form->error($model,'repayment_time');?></div>
 </div>
	<div class="form-group">
		<div class="col-sm-2"></div>
		<div class="col-sm-10">
			<?php echo CHtml::submitButton('搜索', array('class' => 'btn btn-large btn-primary', 'id' => 'submitBtn')); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->