<?php
/* @var $this ChannelController */
/* @var $model CmsChannel */

$this->breadcrumbs=array(
	'Cms Channels'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List CmsChannel', 'url'=>array('index')),
	array('label'=>'Create CmsChannel', 'url'=>array('create')),
	array('label'=>'Update CmsChannel', 'url'=>array('update', 'id'=>$model->channel_id)),
	array('label'=>'Delete CmsChannel', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->channel_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CmsChannel', 'url'=>array('admin')),
);
?>

<h1>View CmsChannel #<?php echo $model->channel_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'channel_id',
		'name',
		'is_recommend',
	),
)); ?>
