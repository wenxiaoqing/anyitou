<?php
/* @var $this DebtInvestLogController */
/* @var $model DebtInvestLog */

$this->breadcrumbs=array(
	'认购记录',
);


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#debt-invest-log-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'debt-invest-log-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'invest_id',
		'trade_no',
		array(
			'name' => 'user_id',
			'value' => '$data->user->user_name',
			),
		array(
			'name' => 'seller_user_id',
			'value' => '$data->seller->user_name',
			),
		
		'debt_id',
		'debt_invest_id',
		
		array(
			'name' => 'item_id',
			'value' => '$data->item_info->item_title',
			),
		
		'amount',
		'real_amount',
		'price',
		'fee',
		//'agreement_id',
		array(
            'name' => 'status',
            'value' => '$data->getStatus()',
            'filter' => $model->statusAttrs,
			'headerHtmlOptions' => array('style' => 'width:50px;'),
        ),
		//'addtime',
		'pay_time',
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
