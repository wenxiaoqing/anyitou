<?php
/* @var $this UserChannelController */
/* @var $model UserChannel */

$this->breadcrumbs=array(
	'渠道管理'=>array('admin'),
	'添加渠道',
);

$this->menu=array(
	array('label'=>'渠道列表', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model));?>
