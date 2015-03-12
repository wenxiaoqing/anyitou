<?php
/* @var $this ClassController */
/* @var $model CmsClass */

$this->breadcrumbs=array(
	'Cms Classes'=>array('index'),
	$model->class_id=>array('view','id'=>$model->class_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CmsClass', 'url'=>array('index')),
	array('label'=>'Create CmsClass', 'url'=>array('create')),
	array('label'=>'View CmsClass', 'url'=>array('view', 'id'=>$model->class_id)),
	array('label'=>'Manage CmsClass', 'url'=>array('admin')),
);
?>

<h1>编辑分类信息<?php echo $model->class_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'channelARs' => $channelARs)); ?>