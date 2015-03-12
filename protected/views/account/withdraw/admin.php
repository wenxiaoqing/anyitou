<?php
/* @var $this UserCashOutController */
/* @var $model UserCashOut */

$this->breadcrumbs=array(
	'资金管理'=>array('/account'),
	'提现管理',
);

$this->menu=array(
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#user-cash-out-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>提现记录</h1>

<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-cash-out-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
            'name' => 'id',
            'value' => '$data->id',
            'headerHtmlOptions' => array('style' => 'width:80px;'),
        ),
        array(
            'name' => 'trade_no',
            'value' => '$data->trade_no',
            'headerHtmlOptions' => array('style' => 'width:80px;'),
        ),
		array(
            'name' => 'username',
            'type' => 'raw',
			'value' => 'CHtml::link(CHtml::encode($data->user->user_name), array("/user/view", "id" => $data->user_id), array("target" => "_blank"))',
            'headerHtmlOptions' => array('style' => 'width:135px;'),
        ),
        array(
            'name' => 'realname',
            'value' => '$data->user->real_name',
            'headerHtmlOptions' => array('style' => 'width:135px;'),
        ),
		array(
            'name' => 'bank_id',
            'value' => '$data->bank_id',
            'headerHtmlOptions' => array('style' => 'width:80px;'),
        ),
        array(
            'name' => 'card_no',
            'value' => '$data->card_no',
            'headerHtmlOptions' => array('style' => 'width:100px;'),
        ),
        array(
            'name' => 'cash_out_amount',
            'value' => 'UtilClass::formatMoney($data->cash_out_amount)."元"',
            'htmlOptions' => array('style' => 'text-align:right;'),
        ),
        array(
            'name' => 'get_cash',
            'value' => 'UtilClass::formatMoney($data->get_cash)."元"',
            'htmlOptions' => array('style' => 'text-align:right;'),
        ),
		array(
            'name' => 'fee',
            'value' => 'UtilClass::formatMoney($data->fee)."元"',
            'htmlOptions' => array('style' => 'text-align:right;'),
        ),
        array(
            'name' => 'status',
            'value' => '$data->getStatus($data->status)',
            'filter' => $model->statusDict,
            'htmlOptions' => array('style' => 'text-align:center;'),
        ),
		'cash_out_time',
		/*
		'befor_amount',
		'after_amount',
		'desc',
		array(
			'class'=>'CButtonColumn',
		),*/
	),
	'pager'=>array(
        'class'=>'application.extensions.widgets.CCLinkPager',
        'header' => '',
        'maxButtonCount' => '15', 
        'prevPageLabel' => '上一页',
        'nextPageLabel' => '下一页',
        'firstPageLabel' => '首页', 
        'lastPageLabel' => '尾页',
        'htmlOptions' => array('class' => 'pagination')
	),
)); ?>
