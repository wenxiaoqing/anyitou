<?php
/* @var $this UserCouponController */
/* @var $model UserCoupon */

$this->breadcrumbs=array(
	'返回列表'=>array('admin'),
	'创建记录',
);

$this->menu=array(
	array('label'=>'返回列表', 'url'=>array('admin')),
	
);
?>

<h1>创建发放记录</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'sourceAttrs'=>$sourceAttrs)); ?>