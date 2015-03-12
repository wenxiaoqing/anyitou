<?php
/* @var $this LotterydrawEventController */
/* @var $data LotterydrawEvent */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nid')); ?>:</b>
	<?php echo CHtml::encode($data->nid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
	<?php echo CHtml::encode($data->type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('starttime')); ?>:</b>
	<?php echo CHtml::encode($data->starttime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('expirtdate')); ?>:</b>
	<?php echo CHtml::encode($data->expirtdate); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('all_islucky')); ?>:</b>
	<?php echo CHtml::encode($data->all_islucky); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('credit_value')); ?>:</b>
	<?php echo CHtml::encode($data->credit_value); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cycle')); ?>:</b>
	<?php echo CHtml::encode($data->cycle); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('interval')); ?>:</b>
	<?php echo CHtml::encode($data->interval); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('max_chance')); ?>:</b>
	<?php echo CHtml::encode($data->max_chance); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('template')); ?>:</b>
	<?php echo CHtml::encode($data->template); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('addtime')); ?>:</b>
	<?php echo CHtml::encode($data->addtime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('addip')); ?>:</b>
	<?php echo CHtml::encode($data->addip); ?>
	<br />

	*/ ?>

</div>