<?php
/* @var $this DebtSellController */
/* @var $model DebtSell */

$this->breadcrumbs=array(
	'发起记录'=>array('admin'),
	$model->id=>array('view','id'=>$model->id),
	'修改',
);

/*$this->menu=array(
	array('label'=>'List DebtSell', 'url'=>array('index')),
	array('label'=>'Create DebtSell', 'url'=>array('create')),
	array('label'=>'View DebtSell', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage DebtSell', 'url'=>array('admin')),
);*/
?>

<h1>修改发起记录 <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>