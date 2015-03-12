<?php
/* @var $this QuestionController */
/* @var $model Questionnaire */

$this->breadcrumbs=array(
    '问卷调查管理',
	'题库管理',
	'题目详情',
);

$this->menu=array(
    array('label'=>'题目列表', 'url'=>array('admin')),
	array('label'=>'新增题目', 'url'=>array('create')),
	array('label'=>'修改题目', 'url'=>array('update', 'id'=>$model->id)),
);
?>

<h1>题目详情 记录ID为<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'q_title',
        array(
            'name'  =>  'q_answer',
            'value' =>  $model->getQuestionAnswer()
        ),
        array(
            'name'  =>  'q_type',
            'value' =>  $model->getInfoByKey($model->q_type,3),
        ),
        array(
            'name'  =>  'q_sort',
            'value' =>  $model->q_sort,
        ),
        array(
            'name'  =>  'q_status',
            'value' =>  $model->getInfoByKey($model->q_status,1),
        ),
        array(
            'name'  =>  'q_answer_long',
            'value' =>  $model->getInfoByKey($model->q_answer_long,2),
        ),
		'add_time',
		'update_time',
	),
)); ?>
