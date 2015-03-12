<?php
/* @var $this LotterydrawPrizesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Lotterydraw Prizes',
);

$this->menu=array(
	array('label'=>'Create LotterydrawPrizes', 'url'=>array('create')),
	array('label'=>'Manage LotterydrawPrizes', 'url'=>array('admin')),
);
?>

<h1>Lotterydraw Prizes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
