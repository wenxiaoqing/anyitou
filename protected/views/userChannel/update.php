<?php
/* @var $this UserChannelController */
/* @var $model UserChannel */

$this->breadcrumbs=array(
	'关键词列表'=>array('admin'),
	'编辑关键词',
    $model->title=>array('view','id'=>$model->id),
);

$this->menu=array(
    array('label'=>'关键词列表', 'url'=>array('admin')),
	array('label'=>'添加关键词', 'url'=>array('create')),
	array('label'=>'查看详情', 'url'=>array('view', 'id'=>$model->id)),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>