<?php
/* @var $this PledgeLoansController */
/* @var $model PledgeLoans */

$this->breadcrumbs=array(
	'Pledge Loans'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List PledgeLoans', 'url'=>array('index')),
	array('label'=>'Create PledgeLoans', 'url'=>array('create')),
	array('label'=>'Update PledgeLoans', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete PledgeLoans', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PledgeLoans', 'url'=>array('admin')),
);
?>

<h1>View PledgeLoans #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'buy_id',
		'project_id',
		'trade_no',
		'sub_trade_no',
		'out_user_id',
		'in_user_id',
		'amount',
		'status',
		'datetime',
		'response_data',
	),
)); ?>
