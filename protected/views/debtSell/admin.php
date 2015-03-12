<?php
/* @var $this DebtSellController */
/* @var $model DebtSell */

$this->breadcrumbs=array(
	'发起人列表',
);


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#debt-sell-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'debt-sell-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'number',
		array(
			'name' => 'user_id',
			'value' => '$data->user->user_name',
			'headerHtmlOptions' => array('style' => 'width:70px;'),
			),
		'invest_id',
		array(
			'name' => 'item_id',
			'value' => '$data->item_info->item_title',
			'headerHtmlOptions' => array('style' => 'width:70px;'),
			),
		array(
			'name' => 'status',
			'value' => '$data->getStatus()',
			'filter' => $model->statusAttrs,
			'headerHtmlOptions' => array('style' => 'width:70px;'),
			),
		
		'category',
		'amount',
		'real_amount',
		'buyer_apr',
		'repayment_time',
		'price',
		'transferred_amount',
		'transferred_num',
		/*'addtime',
		'sell_days',
		'sell_start_time',
		'sell_end_time',
		'real_apr',
		'desc',*/
		
		array(
			'class'=>'CButtonColumn',
			'header'=>'操作', 
			'template' => '{view}{update}',
			'buttons' => array(   
					'view' => array(   
							'label'=>'查看',
							'url'=>'Yii::app()->controller->createUrl("view",array("id"=>$data->primaryKey))',  
							'options'=>array('style'=>'cursor:pointer;', 'target' => '_blank', 'class' => ''),  
					),
					'update' => array(   
							'label'=>'编辑',
							'url'=>'Yii::app()->controller->createUrl("update",array("id"=>$data->primaryKey))',  
							'options'=>array('style'=>'cursor:pointer;', 'target' => '_blank', 'class' => ''),
					),
			),
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


