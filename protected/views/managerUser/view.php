<?php
/* @var $this ManagerUserController */
/* @var $model ManagerUser */

$this->breadcrumbs=array(
	'系统用户管理'=>array('admin'),
	$model->id,
);

$this->menu=array(
	array('label'=>'管理列表', 'url'=>array('admin')),
	array('label'=>'添加用户', 'url'=>array('create')),
	array('label'=>'更新信息', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'删除用户', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>查看 #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'username',
		'email',
	),
)); ?>
