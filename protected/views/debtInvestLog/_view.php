<?php
/* @var $this DebtInvestLogController */
/* @var $data DebtInvestLog */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('invest_id')); ?>:</b>
	<?php echo CHtml::encode($data->invest_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('seller_user_id')); ?>:</b>
	<?php echo CHtml::encode($data->seller_user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('debt_id')); ?>:</b>
	<?php echo CHtml::encode($data->debt_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('debt_invest_id')); ?>:</b>
	<?php echo CHtml::encode($data->debt_invest_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('item_id')); ?>:</b>
	<?php echo CHtml::encode($data->item_id); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('trade_no')); ?>:</b>
	<?php echo CHtml::encode($data->trade_no); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('amount')); ?>:</b>
	<?php echo CHtml::encode($data->amount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('real_amount')); ?>:</b>
	<?php echo CHtml::encode($data->real_amount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('price')); ?>:</b>
	<?php echo CHtml::encode($data->price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fee')); ?>:</b>
	<?php echo CHtml::encode($data->fee); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('agreement_id')); ?>:</b>
	<?php echo CHtml::encode($data->agreement_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('addtime')); ?>:</b>
	<?php echo CHtml::encode($data->addtime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pay_time')); ?>:</b>
	<?php echo CHtml::encode($data->pay_time); ?>
	<br />

	*/ ?>

</div>