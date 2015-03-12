<?php
/* @var $this QuestionController */
/* @var $model Questionnaire */

$this->breadcrumbs=array(
    '问卷调查管理',
	'题库管理',
    '更新题目',
	$model->id=>array('view','id'=>$model->id),
);

$this->menu=array(
	array('label'=>'题库管理', 'url'=>array('admin')),
	array('label'=>'新增题目', 'url'=>array('create')),
	array('label'=>'题目详情', 'url'=>array('view', 'id'=>$model->id)),
);
?>

<h1>更新记录ID为 <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>