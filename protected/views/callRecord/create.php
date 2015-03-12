<?php
/* @var $this CallRecordController */
/* @var $model CallRecord */

$this->breadcrumbs=array(
	'列表管理'=>array('admin'),
	'创建记录',
);

$this->menu=array(
	array('label'=>'列表管理', 'url'=>array('admin')),
	
);
?>

<h1>创建外呼记录</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>