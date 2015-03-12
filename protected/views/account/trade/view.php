<?php
/* @var $this UserCashLogController */
/* @var $model UserCashLog */

$this->breadcrumbs=array(
	'User Cash Logs'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List UserCashLog', 'url'=>array('index')),
	array('label'=>'Create UserCashLog', 'url'=>array('create')),
	array('label'=>'Update UserCashLog', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete UserCashLog', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage UserCashLog', 'url'=>array('admin')),
);
?>

<h1>View UserCashLog #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_id',
		'category',
		'trans_id',
		'cash_status',
		'cash_num',
		'use_money',
		'deal_time',
		'status',
	),
)); ?>
