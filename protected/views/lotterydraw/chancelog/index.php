<?php
/* @var $this LotterydrawChanceLogController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Lotterydraw Chance Logs',
);

$this->menu=array(
	array('label'=>'Create LotterydrawChanceLog', 'url'=>array('create')),
	array('label'=>'Manage LotterydrawChanceLog', 'url'=>array('admin')),
);
?>

<h1>Lotterydraw Chance Logs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
