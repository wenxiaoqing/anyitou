<?php
/* @var $this CouponClassController */
/* @var $model CouponClass */

$this->breadcrumbs=array(
	'优惠券管理'=>array('admin'),
	'优惠券列表',
);

$this->menu=array(
	array('label'=>'创建优惠券', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#user-grid').yiiGridView('update', {
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
	'id'=>'coupon-class-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
			'name'=>'id',
			'value'=>'$data->id',
			'headerHtmlOptions'=>array('style'=>'width:60px;'),
		),
		array(
			'name'=>'name',
			'headerHtmlOptions'=>array('style'=>'width:100px;'),
		),
		/*array(
			'name'=>'pic_link',
			'headerHtmlOptions'=>array('style'=>'width:150px;'),
		),
		array(
			'name'=>'small_pic_link',
			'headerHtmlOptions'=>array('style'=>'width:150px;'),
		),*/
		array(
			'name'=>'category',
			'value'=>'$data->getCategory()',
			'headerHtmlOptions'=>array('style'=>'width:100px;'),
		),
		array(
			'name'=>'price',
			'headerHtmlOptions'=>array('style'=>'width:80px;'),
		),
		array(
			'name'=>'begin_time',
			'headerHtmlOptions'=>array('style'=>'width:150px;'),
		),
		array(
			'name'=>'delay',
			'headerHtmlOptions'=>array('style'=>'width:50px;'),
		),
		array(
			'name'=>'num',
			'headerHtmlOptions'=>array('style'=>'width:50px;'),
		),
		array(
			'name'=>'descript',
			'headerHtmlOptions'=>array('style'=>'width:150px;'),
		),
		array(
			'name'=>'status',
			'value' => '$data->getBaseStatus()',
			'filter' => $model->statusAttrs,
			'headerHtmlOptions'=>array('style'=>'width:50px;'),
		),
		array(
			'name'=>'part_use',
			'value' => '$data->getPartUse()',
			'filter' => $model->partUseAttrs,
			'headerHtmlOptions'=>array('style'=>'width:50px;'),
		),
		array(
			'name'=>'addup_use',
			'value'=>'$data->getAddup()',
			'filter'=>$model->addupAttrs,
			'headerHtmlOptions'=>array('style'=>'width:50px;'),	
		),
		array(
		'name'=>'use_rules',
		'headerHtmlOptions'=>array('style'=>'width:100px;'),
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
