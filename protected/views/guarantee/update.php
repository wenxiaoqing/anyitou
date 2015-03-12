<?php
/* @var $this GuaranteeController */
/* @var $model GuaranteeInfo */

$this->breadcrumbs=array(
	'Guarantee Infos'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	//array('label'=>'担保机构列表', 'url'=>array('index')),
	array('label'=>'创建担保机构', 'url'=>array('create')),
	array('label'=>'查看信息', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'管理列表', 'url'=>array('admin')),
);
?>

<h1>Update GuaranteeInfo <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>