<?php
/* @var $this PledgeLoansController */
/* @var $data PledgeLoans */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('buy_id')); ?>:</b>
	<?php echo CHtml::encode($data->buy_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('project_id')); ?>:</b>
	<?php echo CHtml::encode($data->project_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('trade_no')); ?>:</b>
	<?php echo CHtml::encode($data->trade_no); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sub_trade_no')); ?>:</b>
	<?php echo CHtml::encode($data->sub_trade_no); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('out_user_id')); ?>:</b>
	<?php echo CHtml::encode($data->out_user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('in_user_id')); ?>:</b>
	<?php echo CHtml::encode($data->in_user_id); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('amount')); ?>:</b>
	<?php echo CHtml::encode($data->amount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('datetime')); ?>:</b>
	<?php echo CHtml::encode($data->datetime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('response_data')); ?>:</b>
	<?php echo CHtml::encode($data->response_data); ?>
	<br />

	*/ ?>

</div>