<?php
/* @var $this LotterydrawEventController */
/* @var $model LotterydrawEvent */

$this->breadcrumbs=array(
	'Lotterydraw Events'=>array('index'),
	$model->name,
);

$this->menu=array(
    array('label'=>'活动管理', 'url'=>array('admin')),
	array('label'=>'创建活动', 'url'=>array('create')),
	array('label'=>'编辑活动', 'url'=>array('update', 'id'=>$model->id)),
);
?>

<h1><?php echo $model->name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nid',
		'status',
		'type',
		'name',
		'starttime',
		'expirtdate',
		'all_islucky',
		'credit_value',
		'cycle',
		'interval',
		'max_chance',
		'template',
		'description',
		'addtime',
		'addip',
	),
)); ?>
