<?php
date_default_timezone_set('PRC');
/* @var $this FinancialManagementController */
/* @var $model UserCashLog */
/* @var $form CActiveForm */

?>

<div class="form form-horizontal">
<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

<div class="wide form">
	

	<div class="form-group">
		<?php echo $form->labelEx($model,'cash_status',array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<?php echo $form->dropDownList($model, 'cash_status', $model->directionDicts, array('class' => 'form-control input-large'));?>
		</div>
	</div>
	
	<div class="form-group">
		<label class="col-sm-2 control-label" for="UserCashLog_category">分类</label>
		<div class="col-sm-5">
			<select class="form-control input-large" name="UserCashLog[category]">
			<?php  foreach($categorysAttrs as $key => $val){?>
				<option value="<?php echo $key;?>"> <?php echo $val;?></option>
			<?php }?>
			</select>
		</div>
	</div>
	
	<div class="form-group">
		<label class="col-sm-2 control-label" for="UserCashLog_starttime">起始时间</label>
		<div class="col-sm-5">
		<?php echo $form->textField($model, 'starttime', array('class' => 'form-control input-large _datePicker_time', 'placeholder' => $model->getAttributeLabel('starttime'))); ?>
		<?php echo $form->error($model,'starttime'); ?>
		</div>
	</div>
	
	<div class="form-group">
		<label class="col-sm-2 control-label" for="UserCashLog_endtime">截止时间</label>
		<div class="col-sm-5">
		<?php echo $form->textField($model, 'endtime', array('class' => 'form-control input-large _datePicker_time', 'placeholder' => $model->getAttributeLabel('endtime'))); ?>
		<?php echo $form->error($model,'endtime'); ?>
		</div>
	</div>
	
	<div class="form-group">
		<label class="col-sm-2 control-label" for="UserCashLog_endtime">选择时间</label>
		<div class="col-sm-5">
			<input type="radio" style="margin-left: 0px;" name="date"  value="<?php echo date("Ymd",strtotime("-7 day"))?>"/>七天
			<!--<input type="radio" style="margin-left: 0px;" name="date"  value="<?php echo date("Ymd",strtotime("-15 day"))?>"/>十五天
			<input type="radio" style="margin-left: 0px;" name="date"  value="<?php echo date("Ymd",strtotime("-1 month"))?>"/>一个月-->
			<input type="radio" style="margin-left: 0px;" name="date"  value="<?php echo date("Ymd",strtotime("-1 month"))?>"/>一个月
			<input type="radio" style="margin-left: 0px;" name="date"  value="<?php echo date("Ymd",strtotime("-3 month"))?>"/>三个月
			<input type="radio" style="margin-left: 0px;" name="date"  value=""/>全部
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-2"></div>
		<div class="col-sm-10">
			<?php echo CHtml::submitButton('查询',array('class'=>"btn btn-large btn-primary"));?>
		</div>
	</div>
	
	
	<div class="form-group">
		<label class="col-sm-2 control-label" for="UserCashLog_endtime">总额</label>
		<p class="col-sm-5">
		<?php echo $total_cash.'元';?>
		</p>
	</div>
	

<?php $this->endWidget(); ?>
</div><!-- search-form -->
<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl ."/plugins/jquery-ui/jquery-ui-timepicker.js", CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl ."/plugins/jquery-ui/jquery-ui-datepicker_zh_cn.js", CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl ."/plugins/jquery-ui/jquery-ui-timepicker_zh_cn.js", CClientScript::POS_END);
$_script = <<<EOF
$(document).ready(function() {
	$('._datePicker').datepicker({
		dateFormat: 'yy-mm-dd'
	});
	$('._datePicker_time').datetimepicker({
		dateFormat: 'yy-mm-dd',
		timeFormat: 'HH:mm:ss'
	});
});
EOF;
Yii::app()->getClientScript()->registerScript(__CLASS__, $_script);
?>
