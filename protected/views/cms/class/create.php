<?php
/* @var $this ClassController */
/* @var $model CmsClass */

$this->breadcrumbs=array(
	'Cms Classes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CmsClass', 'url'=>array('index')),
	array('label'=>'Manage CmsClass', 'url'=>array('admin')),
);
?>

<h1>创建分类</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'channelARs' => $channelARs)); ?>