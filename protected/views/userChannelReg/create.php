<?php
/* @var $this UserChannelController */
/* @var $model UserChannel */

$this->breadcrumbs=array(
	'用户渠道管理'=>array('admin'),
	'添加渠道',
);

$this->menu=array(
	array('label'=>'管理列表', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>