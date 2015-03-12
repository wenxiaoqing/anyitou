<?php
/* @var $this DebtInvestLogController */
/* @var $model DebtInvestLog */

$this->breadcrumbs=array(
	'认购记录'=>array('admin'),
	$model->id=>array('view','id'=>$model->id),
	'修改',
);

?>

<h1>修改认购记录 <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>