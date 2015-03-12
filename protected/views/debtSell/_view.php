<?php
/* @var $this DebtSellController */
/* @var $data DebtSell */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('number')); ?>:</b>
	<?php echo CHtml::encode($data->number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('invest_id')); ?>:</b>
	<?php echo CHtml::encode($data->invest_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('item_id')); ?>:</b>
	<?php echo CHtml::encode($data->item_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('category')); ?>:</b>
	<?php echo CHtml::encode($data->category); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('amount')); ?>:</b>
	<?php echo CHtml::encode($data->amount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('real_amount')); ?>:</b>
	<?php echo CHtml::encode($data->real_amount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('buyer_apr')); ?>:</b>
	<?php echo CHtml::encode($data->buyer_apr); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('repayment_time')); ?>:</b>
	<?php echo CHtml::encode($data->repayment_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('price')); ?>:</b>
	<?php echo CHtml::encode($data->price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('transferred_amount')); ?>:</b>
	<?php echo CHtml::encode($data->transferred_amount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('transferred_num')); ?>:</b>
	<?php echo CHtml::encode($data->transferred_num); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('addtime')); ?>:</b>
	<?php echo CHtml::encode($data->addtime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sell_days')); ?>:</b>
	<?php echo CHtml::encode($data->sell_days); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sell_start_time')); ?>:</b>
	<?php echo CHtml::encode($data->sell_start_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sell_end_time')); ?>:</b>
	<?php echo CHtml::encode($data->sell_end_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('real_apr')); ?>:</b>
	<?php echo CHtml::encode($data->real_apr); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('desc')); ?>:</b>
	<?php echo CHtml::encode($data->desc); ?>
	<br />

	*/ ?>

</div>