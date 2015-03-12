<?php
/* @var $this LotterydrawPrizesController */
/* @var $model LotterydrawPrizes */

$this->breadcrumbs=array(
	'Lotterydraw Prizes'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List LotterydrawPrizes', 'url'=>array('index')),
	array('label'=>'Create LotterydrawPrizes', 'url'=>array('create')),
	array('label'=>'Update LotterydrawPrizes', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete LotterydrawPrizes', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage LotterydrawPrizes', 'url'=>array('admin')),
);
?>

<h1>View LotterydrawPrizes #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'event_id',
		'status',
		'type',
		'level',
		'order',
		'name',
		'pic_url',
		'chance',
		'money',
		'description',
		'remain',
		'winning_number',
		'out_number',
		'rules',
		'addtime',
		'addip',
	),
)); ?>
