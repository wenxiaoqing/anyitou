<?php
/* @var $this FinancialManagementController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'User Cash Logs',
);

$this->menu=array(
	array('label'=>'Create UserCashLog', 'url'=>array('create')),
	array('label'=>'Manage UserCashLog', 'url'=>array('admin')),
);
?>

<h1>User Cash Logs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
