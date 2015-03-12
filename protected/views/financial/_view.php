<?php
/* @var $this FinancialManagementController */
/* @var $data UserCashLog */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('category')); ?>:</b>
	<?php echo CHtml::encode($data->category); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('trans_id')); ?>:</b>
	<?php echo CHtml::encode($data->trans_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cash_status')); ?>:</b>
	<?php echo CHtml::encode($data->cash_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cash_num')); ?>:</b>
	<?php echo CHtml::encode($data->cash_num); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('use_money')); ?>:</b>
	<?php echo CHtml::encode($data->use_money); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('deal_time')); ?>:</b>
	<?php echo CHtml::encode($data->deal_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	*/ ?>

</div>