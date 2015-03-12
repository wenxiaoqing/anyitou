<?php
/* @var $this LotterydrawEventController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Lotterydraw Events',
);

$this->menu=array(
	array('label'=>'Create LotterydrawEvent', 'url'=>array('create')),
	array('label'=>'Manage LotterydrawEvent', 'url'=>array('admin')),
);
?>

<h1>Lotterydraw Events</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
