<?php
/* @var $this UserCouponController */
/* @var $data UserCoupon */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('coupon_id')); ?>:</b>
	<?php echo CHtml::encode($data->coupon_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('give_time')); ?>:</b>
	<?php echo CHtml::encode($data->give_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('use_status')); ?>:</b>
	<?php echo CHtml::encode($data->use_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('used_money')); ?>:</b>
	<?php echo CHtml::encode($data->used_money); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('item_id')); ?>:</b>
	<?php echo CHtml::encode($data->item_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('use_time')); ?>:</b>
	<?php echo CHtml::encode($data->use_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('begin_time')); ?>:</b>
	<?php echo CHtml::encode($data->begin_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('end_time')); ?>:</b>
	<?php echo CHtml::encode($data->end_time); ?>
	<br />

	*/ ?>

</div>