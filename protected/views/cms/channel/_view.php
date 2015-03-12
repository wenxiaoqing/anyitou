<?php
/* @var $this ChannelController */
/* @var $data CmsChannel */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('channel_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->channel_id), array('view', 'id'=>$data->channel_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_recommend')); ?>:</b>
	<?php echo CHtml::encode($data->is_recommend); ?>
	<br />


</div>