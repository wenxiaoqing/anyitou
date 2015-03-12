<?php
/* @var $this DebtInvestLogController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Debt Invest Logs',
);

$this->menu=array(
	array('label'=>'Create DebtInvestLog', 'url'=>array('create')),
	array('label'=>'Manage DebtInvestLog', 'url'=>array('admin')),
);
?>

<h1>Debt Invest Logs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
