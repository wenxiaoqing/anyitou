<?php
/* @var $this FinancialManagementController */
/* @var $model UserCashLog */

$this->breadcrumbs=array(
	'User Cash Logs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List UserCashLog', 'url'=>array('index')),
	array('label'=>'Manage UserCashLog', 'url'=>array('admin')),
);
?>

<h1>Create UserCashLog</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>