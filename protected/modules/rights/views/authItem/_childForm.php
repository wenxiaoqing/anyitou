<?php $form=$this->beginWidget('CActiveForm', array('htmlOptions' => array('class' => 'form-horizontal', 'role' => 'form'))); ?>
	<div class="form-body">
		<div class="form-group">
			<?php echo $form->labelEx($model,'name', array('class'=>'col-md-1 control-label')); ?>
			<div class="col-md-6" >
				<?php echo $form->dropDownList($model, 'itemname', $itemnameSelectOptions, array('class' => 'form-control col-sm-5 input-large')); ?>
				<?php echo $form->error($model, 'itemname', array('class'=>'text-field control-info col-sm-10')); ?>
			</div>
			<div class="hint control-info col-md-5"><?php echo Rights::t('core', 'Do not change the name unless you know what you are doing.'); ?></div>
		</div>
	</div>
	<div class="form-actions fluid">
		<div class="col-md-offset-1 col-md-11">
			<?php echo CHtml::submitButton(Rights::t('core', 'Add'), array('class' => 'btn btn-primary')); ?>            
		</div>
	</div>

<?php $this->endWidget(); ?>