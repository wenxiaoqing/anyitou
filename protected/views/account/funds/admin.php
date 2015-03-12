<?php
/* @var $this CompanyController */
/* @var $model FinancingCompany */

$this->breadcrumbs=array(
	'资金管理' => array('index'),
	'账户管理',
);

$this->menu=array(
	array('label'=>'充值记录', 'url'=>array('/account/recharge/admin')),
);
Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . "/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css");
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
            'name' => 'user_id',
            'value' => '$data->user_id',
            'headerHtmlOptions' => array('style' => 'width:80px;'),
        ),
        array(
            'name' => 'username',
			'type' => 'raw',
			'value' => 'CHtml::link(CHtml::encode($data->user->user_name), array("/user/view", "id" => $data->user_id), array("target" => "_blank"))',
        ),
        array(
            'name' => 'all_assets',
            'value' => 'UtilClass::formatMoney($data->all_assets)."元"',
            'htmlOptions' => array('style' => 'text-align:right;'),
            'filter' => '',
        ),
        array(
            'name' => 'use_money',
            'value' => 'UtilClass::formatMoney($data->use_money)."元"',
            'htmlOptions' => array('style' => 'text-align:right;'),
        ),
        array(
            'name' => 'frozen_money',
            'value' => 'UtilClass::formatMoney($data->frozen_money)."元"',
            'htmlOptions' => array('style' => 'text-align:right;'),
        ),
        array(
            'name' => 'prize_num',
            'value' => 'UtilClass::formatMoney($data->prize_num)."元"',
            'htmlOptions' => array('style' => 'text-align:right;'),
        ),
        array(
            'name' => 'collected_interest',
            'value' => 'UtilClass::formatMoney($data->collected_interest)."元"',
            'htmlOptions' => array('style' => 'text-align:right;'),
        ),
        array(
            'name' => 'all_income',
            'value' => 'UtilClass::formatMoney($data->all_income)."元"',
            'htmlOptions' => array('style' => 'text-align:right;'),
        ),
        array(
            'name' => 'all_income',
            'value' => 'UtilClass::formatMoney($data->all_income)."元"',
            'htmlOptions' => array('style' => 'text-align:right;'),
        ),
        array(
            'name' => 'status',
            'value' => '$data->getStatus($data->status)',
            'filter' => array('0' => '未开通', '1' => '正常',),
            'htmlOptions' => array('style' => 'text-align:center;'),
        ),
		/*array(
			'class'=>'CButtonColumn',
		),*/
	//),
		array(
				'class'=>'CButtonColumn',
				'header'=>'操作',
				'template' => '{link}',
				'buttons' => array(
						'link' => array(
								'label'=>'收支统计',
								'url'=>'"javascript:view($data->user_id)"',
								'options'=>array('style'=>'cursor:pointer;','class' => 'btn default','data-target'=>"#full-width",'data-toggle'=>"modal"),
						),
				),
		),
		
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

<div id="full-width" class="modal container fade" tabindex="-1" style="height:410px;">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
		<h4 class="modal-title">收支统计</h4>
	</div>
	<div class="modal-body">
		<div id="response"></div>
	</div>
	<div class="modal-footer">
		<button type="button"  data-dismiss="modal" class="btn blue btn-default">close</button>
	</div>
</div>
<script type="text/javascript">
$('body').on('click','.default',function(){
	var str=$(this).attr("href");
	var user_id=str.substr(16);
	user_id = user_id.substring(0,user_id.length-1);
	var url = '/account/funds/incomeAndExpenses';
	var data = {user_id:user_id};
	$.post(url, data, function(response){
        $("#response").html(response);
	},'json');
});
</script>