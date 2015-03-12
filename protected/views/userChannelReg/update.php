<?php
/* @var $this UserChannelController */
/* @var $model UserChannel */

$this->breadcrumbs=array(
	'用户渠道管理'=>array('admin'),
	'编辑渠道',
    $model->title=>array('view','id'=>$model->id),
);

$this->menu=array(
    array('label'=>'渠道管理', 'url'=>array('admin')),
	array('label'=>'添加渠道', 'url'=>array('create')),
	array('label'=>'查看信息', 'url'=>array('view', 'id'=>$model->id)),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>