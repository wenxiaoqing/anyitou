<?php
/* @var $this QuestionController */
/* @var $data Questionnaire */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('q_title')); ?>:</b>
	<?php echo CHtml::encode($data->q_title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('q_answer')); ?>:</b>
	<?php echo $data->getQuestionAnswer(); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('q_category')); ?>:</b>
	<?php echo CHtml::encode($data->q_category); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('q_type')); ?>:</b>
	<?php echo $data->getInfoByKey(CHtml::encode($data->q_type),3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('q_sort')); ?>:</b>
	<?php echo CHtml::encode($data->q_sort); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('q_status')); ?>:</b>
    <?php echo $data->getInfoByKey(CHtml::encode($data->q_status),1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('q_answer_long')); ?>:</b>
	<?php echo $data->getinfoByKey(CHtml::encode($data->q_answer_long),2); ?>
	<br />
    <?php
    /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('add_time')); ?>:</b>
	<?php echo CHtml::encode($data->add_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('update_time')); ?>:</b>
	<?php echo CHtml::encode($data->update_time); ?>
	<br />

	*/ ?>

</div>