<?php
/* @var $this QuestionController */
/* @var $model Questionnaire */
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
        <?php echo $form->label($model,'q_id'); ?>
        <?php echo $form->textField($model,'q_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model,'answer'); ?>
        <?php echo $form->textField($model,'answer',array('size'=>60,'maxlength'=>500)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model,'answer_time'); ?>
        <?php echo $form->textField($model,'answer_time'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model,'real_name'); ?>
        <?php echo $form->textField($model,'real_name',array('size'=>60,'maxlength'=>20)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model,'mobile'); ?>
        <?php echo $form->textField($model,'mobile'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model,'address'); ?>
        <?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>100)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model,'lucky'); ?>
        <?php echo $form->textField($model,'lucky'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model,'status'); ?>
        <?php echo $form->textField($model,'status'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Search'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->