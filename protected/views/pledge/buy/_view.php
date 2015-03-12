<?php
/* @var $this PledgeBuyController */
/* @var $data PledgeBuy */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('project_id')); ?>:</b>
	<?php echo CHtml::encode($data->project_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('trade_no')); ?>:</b>
	<?php echo CHtml::encode($data->trade_no); ?>
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

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('amount')); ?>:</b>
	<?php echo CHtml::encode($data->amount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('interest')); ?>:</b>
	<?php echo CHtml::encode($data->interest); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('repayed_capital')); ?>:</b>
	<?php echo CHtml::encode($data->repayed_capital); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('payed_interest')); ?>:</b>
	<?php echo CHtml::encode($data->payed_interest); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('buytime')); ?>:</b>
	<?php echo CHtml::encode($data->buytime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('response_data')); ?>:</b>
	<?php echo CHtml::encode($data->response_data); ?>
	<br />

	*/ ?>

</div>