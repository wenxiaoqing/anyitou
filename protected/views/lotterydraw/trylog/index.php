<?php
/* @var $this LotterydrawTryLogController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Lotterydraw Try Logs',
);

$this->menu=array(
	array('label'=>'Create LotterydrawTryLog', 'url'=>array('create')),
	array('label'=>'Manage LotterydrawTryLog', 'url'=>array('admin')),
);
?>

<h1>Lotterydraw Try Logs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
