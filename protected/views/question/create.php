<?php
/* @var $this QuestionController */
/* @var $model Questionnaire */

$this->breadcrumbs=array(
    '问卷调查管理',
	'题库管理',
	'新增题目',
);

$this->menu=array(
	array('label'=>'题目列表', 'url'=>array('admin')),
);
?>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>