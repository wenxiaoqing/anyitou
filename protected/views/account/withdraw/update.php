<?php
/* @var $this UserCashOutController */
/* @var $model UserCashOut */

$this->breadcrumbs=array(
	'User Cash Outs'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List UserCashOut', 'url'=>array('index')),
	array('label'=>'Create UserCashOut', 'url'=>array('create')),
	array('label'=>'View UserCashOut', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage UserCashOut', 'url'=>array('admin')),
);
?>

<h1>Update UserCashOut <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>