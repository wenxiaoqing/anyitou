<?php
/* @var $this UserCouponController */
/* @var $model UserCoupon */

$this->breadcrumbs=array(
	'发放列表'=>array('admin'),
	$model->id=>array('view','id'=>$model->id),
	'修改记录',
);

$this->menu=array(
	array('label'=>'返回列表', 'url'=>array('admin')),
	array('label'=>'创建发放记录', 'url'=>array('create')),
	
);
?>

<h1>修改记录# <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'sourceAttrs'=>$sourceAttrs)); ?>