<?php
/* @var $this PledgeProjectController */
/* @var $model PledgeProject */

$this->breadcrumbs=array(
	'Pledge Projects'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List PledgeProject', 'url'=>array('index')),
	array('label'=>'Create PledgeProject', 'url'=>array('create')),
	array('label'=>'Update PledgeProject', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete PledgeProject', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PledgeProject', 'url'=>array('admin')),
);
?>

<h1>View PledgeProject #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_id',
		'status',
		'loan_status',
		'repayment_status',
		'apply_amount',
		'apr',
		'repayment_time',
		'transaction_amount',
		'collection_days',
		'applytime',
		'confirm_time',
		'verifytime',
		'verify_remark',
	),
)); ?>
