<?php
/* @var $this LotterydrawPrizesController */
/* @var $data LotterydrawPrizes */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('event_id')); ?>:</b>
	<?php echo CHtml::encode($data->event_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
	<?php echo CHtml::encode($data->type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('level')); ?>:</b>
	<?php echo CHtml::encode($data->level); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('order')); ?>:</b>
	<?php echo CHtml::encode($data->order); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('pic_url')); ?>:</b>
	<?php echo CHtml::encode($data->pic_url); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('chance')); ?>:</b>
	<?php echo CHtml::encode($data->chance); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('money')); ?>:</b>
	<?php echo CHtml::encode($data->money); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('remain')); ?>:</b>
	<?php echo CHtml::encode($data->remain); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('winning_number')); ?>:</b>
	<?php echo CHtml::encode($data->winning_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('out_number')); ?>:</b>
	<?php echo CHtml::encode($data->out_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rules')); ?>:</b>
	<?php echo CHtml::encode($data->rules); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('addtime')); ?>:</b>
	<?php echo CHtml::encode($data->addtime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('addip')); ?>:</b>
	<?php echo CHtml::encode($data->addip); ?>
	<br />

	*/ ?>

</div>