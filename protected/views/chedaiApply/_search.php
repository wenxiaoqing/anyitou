<?php
/* @var $this CarLoanController */
/* @var $model CarLoanApply */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'real_name'); ?>
		<?php echo $form->textField($model,'real_name',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'identity'); ?>
		<?php echo $form->textField($model,'identity',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mobile'); ?>
		<?php echo $form->textField($model,'mobile',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'loan_amount'); ?>
		<?php echo $form->textField($model,'loan_amount',array('size'=>8,'maxlength'=>8)); ?>
	</div>
    <div class="row">
        <?php echo $form->label($model,'loan_purpose'); ?>
        <?php echo $form->textField($model,'loan_purpose',array('size'=>60,'maxlength'=>100)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model,'repayment_source'); ?>
        <?php echo $form->textField($model,'repayment_source',array('size'=>60,'maxlength'=>100)); ?>
    </div>
    <div class="row">
        <?php echo $form->label($model,'mot_time'); ?>
        <?php echo $form->textField($model,'mot_time'); ?>
    </div>
	<div class="row">
		<?php echo $form->label($model,'vehicle_type'); ?>
		<?php echo $form->textField($model,'vehicle_type'); ?>
	</div>
    <div class="row">
        <?php echo $form->label($model,'brand_model'); ?>
        <?php echo $form->textField($model,'brand_model',array('size'=>50,'maxlength'=>50)); ?>
    </div>
    <div class="row">
        <?php echo $form->label($model,'buy_time'); ?>
        <?php echo $form->textField($model,'buy_time'); ?>
    </div>
    <div class="row">
        <?php echo $form->label($model,'buy_price'); ?>
        <?php echo $form->textField($model,'buy_price',array('size'=>8,'maxlength'=>8)); ?>
    </div>
    <div class="row">
        <?php echo $form->label($model,'kilometre'); ?>
        <?php echo $form->textField($model,'kilometre',array('size'=>20,'maxlength'=>20)); ?>
    </div>
    <div class="row">
        <?php echo $form->label($model,'emissions'); ?>
        <?php echo $form->textField($model,'emissions',array('size'=>20,'maxlength'=>20)); ?>
    </div>
	<div class="row">
		<?php echo $form->label($model,'traffic_violation'); ?>
		<?php echo $form->textField($model,'traffic_violation'); ?>
	</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->