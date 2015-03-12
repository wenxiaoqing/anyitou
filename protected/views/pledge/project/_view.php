<?php
/* @var $this PledgeProjectController */
/* @var $data PledgeProject */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('loan_status')); ?>:</b>
	<?php echo CHtml::encode($data->loan_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('repayment_status')); ?>:</b>
	<?php echo CHtml::encode($data->repayment_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('apply_amount')); ?>:</b>
	<?php echo CHtml::encode($data->apply_amount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('apr')); ?>:</b>
	<?php echo CHtml::encode($data->apr); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('repayment_time')); ?>:</b>
	<?php echo CHtml::encode($data->repayment_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('transaction_amount')); ?>:</b>
	<?php echo CHtml::encode($data->transaction_amount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('collection_days')); ?>:</b>
	<?php echo CHtml::encode($data->collection_days); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('applytime')); ?>:</b>
	<?php echo CHtml::encode($data->applytime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('confirm_time')); ?>:</b>
	<?php echo CHtml::encode($data->confirm_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('verifytime')); ?>:</b>
	<?php echo CHtml::encode($data->verifytime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('verify_remark')); ?>:</b>
	<?php echo CHtml::encode($data->verify_remark); ?>
	<br />

	*/ ?>

</div>