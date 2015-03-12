<?php
/* @var $this ChannelController */
/* @var $model CmsChannel */

$this->breadcrumbs=array(
	'Cms Channels'=>array('index'),
	$model->name=>array('view','id'=>$model->channel_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CmsChannel', 'url'=>array('index')),
	array('label'=>'Create CmsChannel', 'url'=>array('create')),
	array('label'=>'View CmsChannel', 'url'=>array('view', 'id'=>$model->channel_id)),
	array('label'=>'Manage CmsChannel', 'url'=>array('admin')),
);
?>

<div class="portlet box blue ">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa fa-reorder"></i>编辑频道 #<?php echo $model->channel_id; ?>
		</div>
		<div class="tools"></div>
	</div>
	<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>