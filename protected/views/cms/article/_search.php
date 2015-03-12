<?php
/* @var $this ClassController */
/* @var $model CmsClass */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
	'htmlOptions' => array('class' => 'form-horizontal', 'role' => 'form'),
)); ?>
	<div class="form-body">
		<div class="form-group">
			<?php echo $form->labelEx($model,'title', array('class'=>'col-md-2 control-label')); ?>
			<div class="col-md-10">
				<?php echo $form->textField($model, 'title', array('class' => 'form-control input-large isrequired', 'size'=>60,'maxlength'=>100, 'placeholder' => $model->getAttributeLabel('title'))); ?>
			</div>
		</div>
		<div class="form-group">
			<?php echo $form->labelEx($model,'sub_title', array('class'=>'col-md-2 control-label')); ?>
			<div class="col-md-10">
				<?php echo $form->textField($model, 'sub_title', array('class' => 'form-control input-large', 'size'=>30,'maxlength'=>30, 'placeholder' => $model->getAttributeLabel('sub_title'))); ?>
			</div>
		</div>
		<div class="form-group">
			<?php echo $form->labelEx($model,'keyword', array('class'=>'col-md-2 control-label')); ?>
			<div class="col-md-10">
				<?php echo $form->textField($model, 'keyword', array('class' => 'form-control input-large', 'size'=>50,'maxlength'=>50, 'placeholder' => $model->getAttributeLabel('keyword'))); ?>
				<?php echo $form->error($model,'keyword', array('class'=>'help-block' )); ?>
			</div>
		</div>
		<div class="form-group">
			<?php echo $form->labelEx($model,'seacher_text', array('class'=>'col-md-2 control-label')); ?>
			<div class="col-md-10">
				<?php echo $form->textArea($model, 'seacher_text', array('class' => 'form-control input-large', 'rows'=>6, 'cols'=>50, 'placeholder' => $model->getAttributeLabel('seacher_text'))); ?>
				<?php echo $form->error($model,'seacher_text', array('class'=>'help-block' )); ?>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 control-label" for="CmsArticle_add_date"><?php echo $model->getAttributeLabel('add_date'); ?> </label>
			<div class="col-md-10">
				<?php echo $form->textField($model,'add_date', array('class' => 'form-control input-large _datePicker', 
											'placeholder' => $model->getAttributeLabel('add_date'))); ?>
				<?php echo $form->error($model,'add_date', array('class'=>'help-block' )); ?>
			</div>
		</div>
		<div class="form-group">
			<?php echo $form->labelEx($model,'is_recommend', array('class'=>'col-md-2 control-label')); ?>
			<div class="col-md-10">
				<div class="radio-list">
					<?php echo $form->radioButtonList($model, 'is_recommend',
							array(1=>'推荐', 0=>'不推荐'), 
							array('separator'=>'', 'template'=>'<label class="radio-inline">{input} {label}</label>', 'placeholder' => $model->getAttributeLabel('is_recommend')));
					?>
				</div>
				<?php echo $form->error($model,'is_recommend', array('class'=>'help-block' )); ?>
			</div>
		</div>
	</div>
	<div class="form-actions fluid">
		<div class="col-md-offset-2 col-md-10">
			<?php echo CHtml::submitButton('搜索', array('class' => 'btn btn-primary', 'id' => 'submitBtn')); ?>
		</div>
	</div>
<?php $this->endWidget(); ?>


<?php
	Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl ."/plugins/jquery-ui/jquery-ui-timepicker.js", CClientScript::POS_END);
	
	$_script = <<<EOF
	var editors = [];
	$(document).ready(function() {
		$('._datePicker').datetimepicker({
			dateFormat: 'yy-mm-dd',
			timeFormat: 'HH:mm:ss'
		});
	});
EOF;
	Yii::app()->getClientScript()->registerScript(__CLASS__, $_script);

?>

<?php
/* @var $this ArticleController */
/* @var $model CmsArticle */
/* @var $form CActiveForm */
?>
<!-- 
<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'article_id'); ?>
		<?php echo $form->textField($model,'article_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'channel_id'); ?>
		<?php echo $form->textField($model,'channel_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'class_id'); ?>
		<?php echo $form->textField($model,'class_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sub_title'); ?>
		<?php echo $form->textField($model,'sub_title',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'summary'); ?>
		<?php echo $form->textArea($model,'summary',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'content'); ?>
		<?php echo $form->textArea($model,'content',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'keyword'); ?>
		<?php echo $form->textField($model,'keyword',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hits'); ?>
		<?php echo $form->textField($model,'hits'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'seacher_text'); ?>
		<?php echo $form->textArea($model,'seacher_text',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'add_date'); ?>
		<?php echo $form->textField($model,'add_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'add_userid'); ?>
		<?php echo $form->textField($model,'add_userid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'update_date'); ?>
		<?php echo $form->textField($model,'update_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'update_userid'); ?>
		<?php echo $form->textField($model,'update_userid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'is_recommend'); ?>
		<?php echo $form->textField($model,'is_recommend'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div> --><!-- search-form -->