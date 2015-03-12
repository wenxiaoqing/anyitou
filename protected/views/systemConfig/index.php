<?php
/* @var $this SystemConfigController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'系统配置',
);

$this->menu=array(
	array('label'=>'创建系统配置', 'url'=>array('create')),
	array('label'=>'系统配置列表', 'url'=>array('admin')),
);
?>

<h1>System Configs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
