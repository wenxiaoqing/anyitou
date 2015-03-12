<?php
/* @var $this CouponClassController */
/* @var $model CouponClass */

$this->breadcrumbs=array(
	'优惠券列表'=>array('index'),
	'创建优惠券',
);

$this->menu=array(
	array('label'=>'优惠券列表', 'url'=>array('admin')),

);
?>

<h1>创建优惠券</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'categoryAttrs'=>$categoryAttrs,'addupAttrs'=>$addupAttrs)); ?>