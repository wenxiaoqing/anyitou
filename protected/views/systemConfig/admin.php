<?php
/* @var $this SystemConfigController */
/* @var $model SystemConfig */

$this->breadcrumbs=array(
	'系统管理'=>array('admin'),
	'系统配置',
);

$this->menu=array(
	array('label'=>'创建系统配置', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#system-config-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'system-config-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'scope',
		'variable',
		'value',
		'description',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
