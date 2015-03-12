<?php
/* @var $this LotterydrawChanceLogController */
/* @var $model LotterydrawChanceLog */

$this->breadcrumbs=array(
	'Lotterydraw Chance Logs'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List LotterydrawChanceLog', 'url'=>array('index')),
	array('label'=>'Create LotterydrawChanceLog', 'url'=>array('create')),
	array('label'=>'Update LotterydrawChanceLog', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete LotterydrawChanceLog', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage LotterydrawChanceLog', 'url'=>array('admin')),
);
?>

<h1>View LotterydrawChanceLog #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_id',
		'event_id',
		'chance',
		'source',
		'source_id',
		'addtime',
	),
)); ?>
