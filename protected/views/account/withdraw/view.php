<?php
/* @var $this UserCashOutController */
/* @var $model UserCashOut */

$this->breadcrumbs=array(
	'User Cash Outs'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List UserCashOut', 'url'=>array('index')),
	array('label'=>'Create UserCashOut', 'url'=>array('create')),
	array('label'=>'Update UserCashOut', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete UserCashOut', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage UserCashOut', 'url'=>array('admin')),
);
?>

<h1>View UserCashOut #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_id',
		'bank_id',
		'card_no',
		'cash_out_amount',
		'get_cash',
		'befor_amount',
		'after_amount',
		'fee',
		'status',
		'cash_out_time',
		'desc',
	),
)); ?>
