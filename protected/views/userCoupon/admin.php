<?php
/* @var $this UserCouponController */
/* @var $model UserCoupon */

$this->breadcrumbs=array(
	'发放列表'=>array('admin'),
);

$this->menu=array(
	array('label'=>'发放列表', 'url'=>array('admin')),
	array('label'=>'创建发放记录', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#user-coupon-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-coupon-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
			'name'=>'id',
			'value'=>'$data->id',
			'headerHtmlOptions'=>array('style'=>'width:50px;'),
		),
	
		array(
			'name'=>'user_name',
			'type' => 'raw',
			'value' => 'CHtml::link(CHtml::encode($data->user->user_name), array("/user/view", "id" => $data->user_id), array("target" => "_blank"))',
			'headerHtmlOptions'=>array('style'=>'width:100px;'),
		),
		
		array(
			'name'=>'coupon_name',
			'type' => 'raw',
			'value' => 'CHtml::link(CHtml::encode($data->couponClass->name), array("/couponClass/view", "id" => $data->coupon_id), array("target" => "_blank"))',
			'headerHtmlOptions'=>array('style'=>'width:100px;'),
		),
		array(
			'name'=>'give_time',
			'headerHtmlOptions'=>array('style'=>'width:100px;'),
		),
		array(
			'name'=>'use_status',
			'value' => '$data->getBaseStatus()',
			'filter' => $model->baseStatusAttrs,
			'headerHtmlOptions'=>array('style'=>'width:50px;'),
		),
		
		array(
			'name'=>'used_money',
			'headerHtmlOptions'=>array('style'=>'width:60px;'),
		),
		array(
			'name'=>'use_time',
			'headerHtmlOptions'=>array('style'=>'width:60px;'),
		),
		array(
			'name'=>'begin_time',
			'headerHtmlOptions'=>array('style'=>'width:60px;'),
		),
		array(
			'name'=>'end_time',
			'headerHtmlOptions'=>array('style'=>'width:60px;'),
		),
		array(
		'name'=>'source_type',
		'headerHtmlOptions'=>array('style'=>'width:60px;'),
		),
		array(
		'name'=>'source_id',
		'headerHtmlOptions'=>array('style'=>'width:60px;'),
),
		array(
			'class'=>'CButtonColumn',
		),
	),
	'pager'=>array(
		'class'=>'application.extensions.widgets.CCLinkPager',
		'header' => '',
		'maxButtonCount' => '10',
		'prevPageLabel' => '上一页',
		'nextPageLabel' => '下一页',
		'firstPageLabel' => '首页',
		'lastPageLabel' => '尾页',
		'htmlOptions' => array('class' => 'pagination')
	),
'template' => '{items}{summary}{pager}',
)); ?>
