<?php
/* @var $this LotterydrawUserController */
/* @var $model LotterydrawUser */

$this->breadcrumbs=array(
	'Lotterydraw Users'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List LotterydrawUser', 'url'=>array('index')),
	array('label'=>'Create LotterydrawUser', 'url'=>array('create')),
	array('label'=>'Update LotterydrawUser', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete LotterydrawUser', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage LotterydrawUser', 'url'=>array('admin')),
);
?>

<h1>View LotterydrawUser #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_id',
		'event_id',
		'chance',
		'tried_num',
		'win_number',
		'updatetime',
	),
)); ?>
