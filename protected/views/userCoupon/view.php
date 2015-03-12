<?php
/* @var $this UserCouponController */
/* @var $model UserCoupon */

$this->breadcrumbs=array(
	'发放列表'=>array('admin'),
	$model->id,
);

$this->menu=array(
	array('label'=>'返回列表', 'url'=>array('admin')),
	array('label'=>'创建记录', 'url'=>array('create')),
	
);
?>

<h1>发放详细#<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
	array(
		'name'=>'user_name',
		'type' => 'raw',
		'value' => $model->user->user_name,
		
		),
		array(
			'name'=>'coupon_name',
			'type' => 'raw',
			'value' => $model->couponClass->name,
			
		),
		'give_time',
		array(
			'name'=>'use_status',
			'value'=>$model->getBaseStatus(),
		),
		'used_money',
		array(
			'name'=>'item_name',
			'value'=>$model->itemInfo->item_title,
			),
		'use_time',
		'begin_time',
		'end_time',
		'source_id',
		'source_type',
		
	),
)); ?>
