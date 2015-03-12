<?php
/* @var $this PledgeRepaymentController */
/* @var $model PledgeRepayment */

$this->breadcrumbs=array(
	'Pledge Repayments'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List PledgeRepayment', 'url'=>array('index')),
	array('label'=>'Create PledgeRepayment', 'url'=>array('create')),
	array('label'=>'Update PledgeRepayment', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete PledgeRepayment', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PledgeRepayment', 'url'=>array('admin')),
);
?>

<h1>View PledgeRepayment #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'buy_id',
		'user_id',
		'project_id',
		'trade_no',
		'status',
		'type',
		'value_time',
		'repay_time',
		'amount',
		'datetime',
		'reponse_data',
	),
)); ?>
