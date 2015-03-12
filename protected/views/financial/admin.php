<?php
/* @var $this FinancialManagementController */
/* @var $model UserCashLog */

$this->breadcrumbs=array(
	'财务管理'=>array('admin'),
	'收支明细',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#user-cash-log-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>


<?php $this->renderPartial('_search',array(
	'model'=>$model,'categorysAttrs'=>$categorysAttrs,'total_cash'=>$total_cash,'admin'=>$admin,
)); ?>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-cash-log-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
			'name' => 'id',
			'value' => '$data->id',
			'type' => 'raw',
			'htmlOptions' => array('style' => 'text-align:center;width:60px;','class'=>'numId','title'=>'$data->id'),
		),
		array(
            'name' => 'username',
			'type' => 'raw',
			'value' => 'CHtml::link(CHtml::encode($data->user->user_name), array("/user/view", "id" => $data->user_id), array("target" => "_blank"))',
        ),
		//'category',
		array(
			'name' => 'category',
			'value' => '$data->getCategorys()',
			'filter' => $model->categorysAttrs,
			'htmlOptions' => array('style' => 'text-align:center;'),
		),
		//'trans_id',
		array(
			'name'=>'trans_id',
			'value'=>'$data->trans_id',
			'type'=>'raw',
			'htmlOptions' => array('style' => 'text-align:center;'),
		),
		array(
			'name' => 'cash_status',
			'value' => '$data->getDirections($data->cash_status)',
			'filter' => array('1' => '支出', '2' => '收入',),
			'htmlOptions' => array('style' => 'text-align:center;'),
		),
		array(
			'name' => 'cash_num',
			'value' => 'UtilClass::formatMoney($data->cash_num)."元"',
			'htmlOptions' => array('style' => 'text-align:center;'),
		),	
		array(
			'name' => 'use_money',
			'value' => 'UtilClass::formatMoney($data->use_money)."元"',
			'htmlOptions' => array('style' => 'text-align:center;'),
		),
		'deal_time',
		//'status',
		array(
			'name' => 'status',
			'value' => '$data->getStatus($data->status)',
			'filter' => array('1' => '有效', '2' => '无效',),
			'htmlOptions' => array('style' => 'text-align:center;'),
		),
		
		/*array(
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
<script type="text/javascript">
$(document).ready(function(){
	var date=<?php echo $date?$date:'0'?>;
		$("input[value="+date+"]").attr("checked", true);
})
</script>