<?php
/* @var $this LotterydrawEventController */
/* @var $model LotterydrawEvent */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'lotterydraw-event-form',
	'enableAjaxValidation'=>false,
)); ?>
	<div class="form-body form-horizontal">
		<p class="note">带<span class="required">*</span>号的为必填项. </p>
		<div class="form-group">
			<?php echo $form->labelEx($model,'name', array('class'=>'col-md-2 control-label')); ?>
			<div class="col-md-10">
				<?php echo $form->textField($model, 'name', array('class' => 'form-control input-large isrequired', 'size'=>60,'maxlength'=>100, 'placeholder' => $model->getAttributeLabel('name'))); ?>
				<?php echo $form->error($model,'name', array('class'=>'help-block' )); ?>
			</div>
		</div>
		<div class="form-group">
			<?php echo $form->labelEx($model,'type', array('class'=>'col-md-2 control-label')); ?>
			<div class="col-md-10">
				<?php echo $form->textField($model, 'type', array('class' => 'form-control input-large isrequired', 'size'=>60,'maxlength'=>100, 'placeholder' => $model->getAttributeLabel('type'))); ?>
				<?php echo $form->error($model,'type', array('class'=>'help-block' )); ?>
			</div>
		</div>
		<div class="form-group">
			<?php echo $form->labelEx($model,'status', array('class'=>'col-md-2 control-label')); ?>
			<div class="col-md-10">
				<?php echo $form->textField($model, 'status', array('class' => 'form-control input-large isrequired', 'size'=>60,'maxlength'=>100, 'placeholder' => $model->getAttributeLabel('status'))); ?>
				<?php echo $form->error($model,'status', array('class'=>'help-block' )); ?>
			</div>
		</div>
		<div class="form-group">
			<?php echo $form->labelEx($model,'nid', array('class'=>'col-md-2 control-label')); ?>
			<div class="col-md-10">
				<?php echo $form->textField($model, 'nid', array('class' => 'form-control input-large', 'size'=>60,'maxlength'=>100, 'placeholder' => $model->getAttributeLabel('nid'))); ?>
				<?php echo $form->error($model,'nid', array('class'=>'help-block' )); ?>
			</div>
		</div>
		<div class="form-group">
			<?php echo $form->labelEx($model,'starttime', array('class'=>'col-md-2 control-label')); ?>
			<div class="col-md-10">
				<?php echo $form->textField($model, 'starttime', array('class' => 'form-control input-large _datePicker', 'size'=>60,'maxlength'=>100, 'placeholder' => $model->getAttributeLabel('starttime'))); ?>
				<?php echo $form->error($model,'starttime', array('class'=>'help-block' )); ?>
			</div>
		</div>
		<div class="form-group">
			<?php echo $form->labelEx($model,'expirtdate', array('class'=>'col-md-2 control-label')); ?>
			<div class="col-md-10">
				<?php echo $form->textField($model, 'expirtdate', array('class' => 'form-control input-large _datePicker', 'size'=>60,'maxlength'=>100, 'placeholder' => $model->getAttributeLabel('expirtdate'))); ?>
				<?php echo $form->error($model,'expirtdate', array('class'=>'help-block' )); ?>
			</div>
		</div>
		<div class="form-group">
			<?php echo $form->labelEx($model,'all_islucky', array('class'=>'col-md-2 control-label')); ?>
			<div class="col-md-10">
				<?php echo $form->textField($model, 'all_islucky', array('class' => 'form-control input-large', 'size'=>60,'maxlength'=>100, 'placeholder' => $model->getAttributeLabel('all_islucky'))); ?>
				<?php echo $form->error($model,'all_islucky', array('class'=>'help-block' )); ?>
			</div>
		</div>
		<div class="form-group">
			<?php echo $form->labelEx($model,'cycle', array('class'=>'col-md-2 control-label')); ?>
			<div class="col-md-10">
				<?php echo $form->textField($model, 'cycle', array('class' => 'form-control input-large', 'size'=>60,'maxlength'=>100, 'placeholder' => $model->getAttributeLabel('cycle'))); ?>
				<?php echo $form->error($model,'cycle', array('class'=>'help-block' )); ?>
			</div>
		</div>
		<div class="form-group">
			<?php echo $form->labelEx($model,'interval', array('class'=>'col-md-2 control-label')); ?>
			<div class="col-md-10">
				<?php echo $form->textField($model, 'interval', array('class' => 'form-control input-large', 'size'=>60,'maxlength'=>100, 'placeholder' => $model->getAttributeLabel('interval'))); ?>
				<?php echo $form->error($model,'interval', array('class'=>'help-block' )); ?>
			</div>
		</div>
		<div class="form-group">
			<?php echo $form->labelEx($model,'max_chance', array('class'=>'col-md-2 control-label')); ?>
			<div class="col-md-10">
				<?php echo $form->textField($model, 'max_chance', array('class' => 'form-control input-large', 'size'=>60,'maxlength'=>100, 'placeholder' => $model->getAttributeLabel('max_chance'))); ?>
				<?php echo $form->error($model,'max_chance', array('class'=>'help-block' )); ?>
			</div>
		</div>
		<div class="form-group">
			<?php echo $form->labelEx($model,'template', array('class'=>'col-md-2 control-label')); ?>
			<div class="col-md-10">
				<?php echo $form->textField($model, 'template', array('class' => 'form-control input-large', 'size'=>60,'maxlength'=>100, 'placeholder' => $model->getAttributeLabel('template'))); ?>
				<?php echo $form->error($model,'template', array('class'=>'help-block' )); ?>
			</div>
		</div>
		<div class="form-group">
			<?php echo $form->labelEx($model,'description', array('class'=>'col-md-2 control-label')); ?>
			<div class="col-md-10">
				<?php echo $form->textArea($model, 'description', array('class' => 'form-control input-large', 'rows'=>6, 'cols'=>120, 'placeholder' => $model->getAttributeLabel('description'))); ?>
				<?php echo $form->error($model,'description', array('class'=>'help-block' )); ?>
			</div>
		</div>
		<div class="form-group">
    		<div class="col-sm-2"></div>
    		<div class="col-sm-10">
    			<?php echo CHtml::submitButton($model->isNewRecord ? '创建' : '保存', array('class' => 'btn btn-primary', 'id' => 'submitBtn')); ?>
    		</div>
    	</div>
	</div>
<?php $this->endWidget(); ?>

<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl ."/plugins/jquery-ui/jquery-ui-timepicker.js", CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl ."/plugins/jquery-ui/jquery-ui-datepicker_zh_cn.js", CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl ."/plugins/jquery-ui/jquery-ui-timepicker_zh_cn.js", CClientScript::POS_END);

$_script = <<<EOF
	$('._datePicker').datetimepicker({
		dateFormat: 'yy-mm-dd',
		timeFormat: 'HH:mm:ss'
	});
EOF;
Yii::app()->getClientScript()->registerScript('_form', $_script);

?>