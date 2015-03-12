<?php
/* @var $this ChannelController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Cms Channels',
);

$this->menu=array(
	array('label'=>'Create CmsChannel', 'url'=>array('create')),
	array('label'=>'Manage CmsChannel', 'url'=>array('admin')),
);
?>

<h1>Cms Channels</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
