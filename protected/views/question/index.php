<?php
/* @var $this QuestionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'问卷调查管理',
    '题库管理'
);

$this->menu=array(
	array('label'=>'新增题库', 'url'=>array('create')),
	array('label'=>'题库列表', 'url'=>array('admin')),
);
?>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
