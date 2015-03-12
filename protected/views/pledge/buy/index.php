<?php
/* @var $this PledgeBuyController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Pledge Buys',
);

$this->menu=array(
	array('label'=>'Create PledgeBuy', 'url'=>array('create')),
	array('label'=>'Manage PledgeBuy', 'url'=>array('admin')),
);
?>

<h1>Pledge Buys</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
