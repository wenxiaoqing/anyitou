<?php
/* @var $this DebtInvestLogController */
/* @var $model DebtInvestLog */

$this->breadcrumbs=array(
	'Debt Invest Logs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List DebtInvestLog', 'url'=>array('index')),
	array('label'=>'Manage DebtInvestLog', 'url'=>array('admin')),
);
?>

<h1>Create DebtInvestLog</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>