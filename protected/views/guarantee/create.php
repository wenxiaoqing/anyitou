<?php
/* @var $this GuaranteeController */
/* @var $model GuaranteeInfo */

$this->breadcrumbs=array(
	'Guarantee Infos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List GuaranteeInfo', 'url'=>array('index')),
	array('label'=>'Manage GuaranteeInfo', 'url'=>array('admin')),
);
?>

<h1>创建担保公司</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>