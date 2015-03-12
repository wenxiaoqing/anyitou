<?php
/* @var $this ChannelController */
/* @var $model CmsChannel */
/* @var $form CActiveForm */
?>
<div class="portlet-body form">
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'cms-channel-form',
		'enableAjaxValidation'=>false,
		'htmlOptions' => array('class' => 'form-horizontal', 'role' => 'form'),
	)); ?>
		<div class="form-body">
			<div class="form-group">
				<?php echo $form->labelEx($model,'name', array('class'=>'col-md-2 control-label')); ?>
				<div class="col-md-10">
					<?php echo $form->textField($model, 'name', array('class' => 'form-control input-large isrequired', 'size'=>30,'maxlength'=>30)); ?>
					<?php echo $form->error($model,'name', array('class'=>'help-block' )); ?>
				</div>
			</div>
			<div class="form-group">
				<?php echo $form->labelEx($model,'is_recommend', array('class'=>'col-md-2 control-label')); ?>
				<div class="col-md-10">
					<div class="radio-list">
						<?php echo $form->radioButtonList($model, 'is_recommend',
								array(1=>'推荐', 0=>'不推荐'), 
								array('separator'=>'', 'template'=>'<label class="radio-inline">{input} {label}</label>'));
						?>
					</div>
					<?php echo $form->error($model,'is_recommend', array('class'=>'help-block' )); ?>
				</div>
			</div>
		</div>
		<div class="form-actions fluid">
			<div class="col-md-offset-2 col-md-10">
				<button type="submit" class="btn blue">创建频道</button>                  
			</div>
		</div>
	<?php $this->endWidget(); ?>
</div>