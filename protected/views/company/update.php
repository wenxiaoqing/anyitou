<?php
/* @var $this CompanyController */
/* @var $model FinancingCompany */

$this->breadcrumbs=array(
	'Financing Companies'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List FinancingCompany', 'url'=>array('index')),
	array('label'=>'Create FinancingCompany', 'url'=>array('create')),
	array('label'=>'View FinancingCompany', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage FinancingCompany', 'url'=>array('admin')),
);
?>

<h1>Update FinancingCompany <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>