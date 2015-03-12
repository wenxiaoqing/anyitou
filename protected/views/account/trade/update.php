<?php
/* @var $this UserCashLogController */
/* @var $model UserCashLog */

$this->breadcrumbs=array(
	'User Cash Logs'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List UserCashLog', 'url'=>array('index')),
	array('label'=>'Create UserCashLog', 'url'=>array('create')),
	array('label'=>'View UserCashLog', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage UserCashLog', 'url'=>array('admin')),
);
?>

<h1>Update UserCashLog <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>