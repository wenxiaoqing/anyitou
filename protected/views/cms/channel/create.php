<?php
/* @var $this ChannelController */
/* @var $model CmsChannel */

$this->breadcrumbs=array(
	'Cms Channels'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CmsChannel', 'url'=>array('index')),
	array('label'=>'Manage CmsChannel', 'url'=>array('admin')),
);
?>

<div class="portlet box blue ">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa fa-reorder"></i>创建频道
		</div>
		<div class="tools"></div>
	</div>
	<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
