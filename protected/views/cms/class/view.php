<?php
/* @var $this ClassController */
/* @var $model CmsClass */

$this->breadcrumbs=array(
	'Cms Classes'=>array('index'),
	$model->class_id,
);

$this->menu=array(
	array('label'=>'List CmsClass', 'url'=>array('index')),
	array('label'=>'Create CmsClass', 'url'=>array('create')),
	array('label'=>'Update CmsClass', 'url'=>array('update', 'id'=>$model->class_id)),
	array('label'=>'Delete CmsClass', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->class_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CmsClass', 'url'=>array('admin')),
);
?>

<h1>View CmsClass #<?php echo $model->class_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'class_id',
		'channel_id',
		'class',
		'parent_id',
	),
)); ?>
