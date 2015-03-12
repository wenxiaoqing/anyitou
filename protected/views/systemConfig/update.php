<?php
/* @var $this SystemConfigController */
/* @var $model SystemConfig */

$this->breadcrumbs=array(
	'系统配置列表'=>array('admin'),
	$model->id=>array('view','id'=>$model->id),
	'修改',
);

$this->menu=array(
	array('label'=>'系统配置列表', 'url'=>array('admin')),
	array('label'=>'创建系统配置', 'url'=>array('create')),
	array('label'=>'查看系统配置', 'url'=>array('view', 'id'=>$model->id)),
);
?>

<h1>系统配置 <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>