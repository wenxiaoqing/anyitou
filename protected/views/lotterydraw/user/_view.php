<?php
/* @var $this LotterydrawUserController */
/* @var $data LotterydrawUser */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('event_id')); ?>:</b>
	<?php echo CHtml::encode($data->event_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('chance')); ?>:</b>
	<?php echo CHtml::encode($data->chance); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tried_num')); ?>:</b>
	<?php echo CHtml::encode($data->tried_num); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('win_number')); ?>:</b>
	<?php echo CHtml::encode($data->win_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updatetime')); ?>:</b>
	<?php echo CHtml::encode($data->updatetime); ?>
	<br />


</div>