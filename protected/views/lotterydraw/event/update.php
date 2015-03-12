<?php
/* @var $this LotterydrawEventController */
/* @var $model LotterydrawEvent */

$this->breadcrumbs=array(
	'抽奖活动'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'编辑活动信息',
);

$this->menu=array(
    array('label'=>'活动管理', 'url'=>array('admin')),
	array('label'=>'创建活动', 'url'=>array('create')),
	array('label'=>'编辑活动', 'url'=>array('view', 'id'=>$model->id)),
);

?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>