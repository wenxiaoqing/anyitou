<?php
/* @var $this UserCashOutController */
/* @var $data UserCashOut */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bank_id')); ?>:</b>
	<?php echo CHtml::encode($data->bank_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('card_no')); ?>:</b>
	<?php echo CHtml::encode($data->card_no); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cash_out_amount')); ?>:</b>
	<?php echo CHtml::encode($data->cash_out_amount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('get_cash')); ?>:</b>
	<?php echo CHtml::encode($data->get_cash); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('befor_amount')); ?>:</b>
	<?php echo CHtml::encode($data->befor_amount); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('after_amount')); ?>:</b>
	<?php echo CHtml::encode($data->after_amount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fee')); ?>:</b>
	<?php echo CHtml::encode($data->fee); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cash_out_time')); ?>:</b>
	<?php echo CHtml::encode($data->cash_out_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('desc')); ?>:</b>
	<?php echo CHtml::encode($data->desc); ?>
	<br />

	*/ ?>

</div>