<?php
/* @var $this GuaranteeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Guarantee Infos',
);

$this->menu=array(
	array('label'=>'Create GuaranteeInfo', 'url'=>array('create')),
	array('label'=>'Manage GuaranteeInfo', 'url'=>array('admin')),
);
?>

<h1>Guarantee Infos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
