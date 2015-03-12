<?php
/* @var $this LotterydrawTryLogController */
/* @var $model LotterydrawTryLog */

$this->breadcrumbs=array(
	'Lotterydraw Try Logs'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List LotterydrawTryLog', 'url'=>array('index')),
	array('label'=>'Create LotterydrawTryLog', 'url'=>array('create')),
	array('label'=>'Update LotterydrawTryLog', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete LotterydrawTryLog', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage LotterydrawTryLog', 'url'=>array('admin')),
);
?>

<h1>View LotterydrawTryLog #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'event_id',
		'status',
		'user_id',
		'iswinner',
		'prize_id',
		'remark',
		'givetime',
		'addtime',
		'addip',
	),
)); ?>
