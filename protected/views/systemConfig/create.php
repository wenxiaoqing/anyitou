<?php
/* @var $this SystemConfigController */
/* @var $model SystemConfig */

$this->breadcrumbs=array(
	'系统配置列表'=>array('admin'),
	'创建',
);

$this->menu=array(
	array('label'=>'系统配置列表', 'url'=>array('admin')),
);
?>

<h1>创建系统配置</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>