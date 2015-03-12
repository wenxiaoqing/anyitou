<?php
/* @var $this CompanyController */
/* @var $model FinancingCompany */

$this->breadcrumbs=array(
	'Financing Companies'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List FinancingCompany', 'url'=>array('index')),
	array('label'=>'Manage FinancingCompany', 'url'=>array('admin')),
);
?>

<h1>创建企业信息</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>