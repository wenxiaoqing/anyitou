<?php
/* @var $this RechargeController */

$this->breadcrumbs=array(
	'Recharge'=>array('/recharge'),
	'Admin',
);
?>
<?php
/* @var $this CompanyController */
/* @var $model FinancingCompany */

$this->breadcrumbs=array(
	'资金管理' => array('/account'),
	'充值记录',
);

$this->menu=array(
	array('label'=>'账户管理', 'url'=>array('/account/funds/admin')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#financing-company-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'funds',
	'dataProvider' => $model->search(),
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
            'headerHtmlOptions' => array('style' => 'width:100px;'),
        ),
        array(
            'name' => 'username',
            'type' => 'raw',
			'value' => 'CHtml::link(CHtml::encode($data->user->user_name.($data->user->real_name ? "(".$data->user->real_name.")" : "")), array("/user/view", "id" => $data->user_id), array("target" => "_blank"))',
            'headerHtmlOptions' => array('style' => 'width:150px;'),
        ),
        array(
            'name' => 'category',
            'value' => '$data->category',
            'headerHtmlOptions' => array('style' => 'width:80px;'),
        ),
        array(
            'name' => 'recharge_amount',
            'value' => 'UtilClass::formatMoney($data->recharge_amount)."元"',
            'htmlOptions' => array('style' => 'text-align:right;'),
        ),
        array(
            'name' => 'recharge_time',
            'value' => '$data->recharge_time',
            'headerHtmlOptions' => array('style' => 'width:140px;'),
            'htmlOptions' => array('style' => 'text-align:center;'),
        ),
        array(
            'name' => 'status',
            'value' => '$data->getStatus($data->status)',
            'filter' => $model->statusDict,
            'htmlOptions' => array('style' => 'text-align:center;'),
        ),
/*		array(
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
