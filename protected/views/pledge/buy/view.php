<?php
/* @var $this PledgeBuyController */
/* @var $model PledgeBuy */

$this->breadcrumbs=array(
	'Pledge Buys'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List PledgeBuy', 'url'=>array('index')),
	array('label'=>'Create PledgeBuy', 'url'=>array('create')),
	array('label'=>'Update PledgeBuy', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete PledgeBuy', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PledgeBuy', 'url'=>array('admin')),
);
?>

<h1>View PledgeBuy #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_id',
		'project_id',
		'trade_no',
		'status',
		'loan_status',
		'repayment_status',
		'amount',
		'interest',
		'repayed_capital',
		'payed_interest',
		'buytime',
		'response_data',
	),
)); ?>
