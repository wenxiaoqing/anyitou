<div class="form form-horizontal">

<?php $form=$this->beginWidget('CActiveForm'); ?>
	
	<div class="form-group col-sm-12">
		<?php echo $form->dropDownList($model, 'itemname', $itemnameSelectOptions); ?>
		<?php echo $form->error($model, 'itemname'); ?>
	</div>
	
	<div class="form-group col-sm-12">
		<?php echo CHtml::submitButton(Rights::t('core', 'Assign'), array('class' => 'btn btn-large btn-primary', 'id' => 'submitBtn')); ?>
	</div>

<?php $this->endWidget(); ?>

</div>