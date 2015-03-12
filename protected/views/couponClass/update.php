<?php
/* @var $this CouponClassController */
/* @var $model CouponClass */

$this->breadcrumbs=array(
	'优惠券列表'=>array('admin'),
	$model->name=>array('view','id'=>$model->id),
	'修改',
);

$this->menu=array(
	array('label'=>'返回列表', 'url'=>array('admin')),
	array('label'=>'创建 优惠券', 'url'=>array('create')),
	
);
?>


<?php echo $this->renderPartial('_form', array('model'=>$model,'categoryAttrs'=>$categoryAttrs,)); ?>