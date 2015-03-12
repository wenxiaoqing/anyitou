<?php
/* @var $this QuestionController */
/* @var $model Questionnaire */
/* @var $form CActiveForm */
?>

<div class="form form-horizontal">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'questionnaire-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">这些选项<span class="required">*</span>为必填</p>

	<?php echo $form->errorSummary($model); ?>

    <div class="form-group">
		<?php echo $form->labelEx($model,'q_title',array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-5">
		<?php echo $form->textField($model,'q_title',array('size'=>60,'maxlength'=>100)); ?>
        </div>
	</div>

    <div class="form-group">
		<?php echo $form->labelEx($model,'q_answer',array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-5">
		<?php echo $form->textArea($model,'q_answer',array('row'=>200,'cols'=>50)); ?>
        </div>
	</div>

    <div class="form-group">
		<?php echo $form->labelEx($model,'q_category',array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-5">
		<?php echo $form->textField($model,'q_category'); ?>
        </div>
	</div>

    <div class="form-group">
		<?php echo $form->labelEx($model,'q_type',array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-5">
		<?php echo $form->dropDownList($model,'q_type',$model->question_type); ?>
        </div>
	</div>

    <div class="form-group">
		<?php echo $form->labelEx($model,'q_sort',array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-5">
		<?php echo $form->textField($model,'q_sort'); ?>
        </div>
	</div>

    <div class="form-group">
		<?php echo $form->labelEx($model,'q_answer_long',array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-5">
            <?php echo $form->dropDownList($model,'q_answer_long',$model->is_too_long); ?>
        </div>
	</div>
	<div class="form-group">
        <div class="col-sm-2"></div>
        <div class="col-sm-10">
		<?php echo CHtml::submitButton($model->isNewRecord ? '新增' : '保存',array('class' => 'btn btn-large btn-primary', 'id' => 'submitBtn')); ?>
        </div>
	</div>
<?php $this->endWidget(); ?>

</div><!-- form -->