<?php
/* @var $this UserController */
/* @var $data User */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_name')); ?>:</b>
	<?php echo CHtml::encode($data->user_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('real_name')); ?>:</b>
	<?php echo CHtml::encode($data->real_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mobile')); ?>:</b>
	<?php echo CHtml::encode($data->mobile); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('base_status')); ?>:</b>
	<?php echo CHtml::encode($data->base_status); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('email_status')); ?>:</b>
	<?php echo CHtml::encode($data->email_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('real_status')); ?>:</b>
	<?php echo CHtml::encode($data->real_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reg_time')); ?>:</b>
	<?php echo CHtml::encode($data->reg_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('last_login_ip')); ?>:</b>
	<?php echo CHtml::encode($data->last_login_ip); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('last_login_time')); ?>:</b>
	<?php echo CHtml::encode($data->last_login_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_verified')); ?>:</b>
	<?php echo CHtml::encode($data->is_verified); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('auth_type')); ?>:</b>
	<?php echo CHtml::encode($data->auth_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reg_ip')); ?>:</b>
	<?php echo CHtml::encode($data->reg_ip); ?>
	<br />

	*/ ?>

</div>