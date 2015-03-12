<?php
/* @var $this CompanyController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Financing Companies',
);

$this->menu=array(
	array('label'=>'Create FinancingCompany', 'url'=>array('create')),
	array('label'=>'Manage FinancingCompany', 'url'=>array('admin')),
);
?>

<h1>Financing Companies</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
