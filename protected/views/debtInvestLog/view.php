<?php
/* @var $this DebtInvestLogController */
/* @var $model DebtInvestLog */

$this->breadcrumbs=array(
	'认购记录'=>array('admin'),
	$model->id,
);
?>

<h1>认购详细 #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'invest_id',
		'trade_no',
		array(
			'name' => 'user_id',
			'value' => $model->user->user_name,
			),
		array(
			'name' => 'seller_user_id',
			'value' => $model->seller->user_name,
		),
		
		'debt_id',
		'debt_invest_id',
		
		array(
			'name' => 'item_id',
			'value' => $model->item_info->item_title,
		),
		'amount',
		'real_amount',
		'price',
		'fee',
		'agreement_id',
		array(
            'name' => 'status',
            'value' => $model->getStatus(),
        ),
		'addtime',
		'pay_time',
	),
)); ?>
