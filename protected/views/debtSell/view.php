<?php
/* @var $this DebtSellController */
/* @var $model DebtSell */

$this->breadcrumbs=array(
	'发起记录'=>array('admin'),
	$model->id,
);
?>

<h1>发起人详细<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'number',
		array(
			'name' => 'user_id',
			'value' => $model->user->user_name,
			),
		'invest_id',
		array(
			'name' => 'item_id',
			'value' => $model->item_info->item_title,
			),
		array(
			'name' => 'status',
			'value' => $model->getStatus(),
			),
		'category',
		'amount',
		'real_amount',
		'buyer_apr',
		'repayment_time',
		'price',
		'transferred_amount',
		'transferred_num',
		'addtime',
		'sell_days',
		'sell_start_time',
		'sell_end_time',
		'real_apr',
		'desc',
	),
)); ?>
