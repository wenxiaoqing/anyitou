<?php
/* @var $this LotterydrawEventController */
/* @var $model LotterydrawEvent */

$this->breadcrumbs=array(
	'抽奖活动'=>array('admin'),
	'创建活动',
);

$this->menu=array(
	array('label'=>'活动管理', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>