<?php
/* @var $this UserCashLogController */
/* @var $model UserCashLog */

$this->breadcrumbs=array(
	'资金管理'=>array('/account'),
	'交易记录',
);

$this->menu=array(
	array('label'=>'List UserCashLog', 'url'=>array('index')),
	array('label'=>'Create UserCashLog', 'url'=>array('create')),
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

<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-cash-log-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
        array(
            'name' => 'id',
            'value' => '$data->id',
            'headerHtmlOptions' => array('style' => 'width:80px;'),
        ),
        array(
            'name' => 'username',
			'type' => 'raw',
			'value' => 'CHtml::link(CHtml::encode($data->user->user_name.($data->user->real_name ? "(".$data->user->real_name.")" : "")), array("/user/view", "id" => $data->user_id), array("target" => "_blank"))',
            'htmlOptions' => array('style' => 'text-align:center;'),
        ),
        array(
            'name' => 'category',
            //'value' => '$data->category',
        	'value' => '$data->getCategory($data->category)',
            'htmlOptions' => array('style' => 'text-align:center;'),
        ),
        array(
            'name' => 'trans_id',
            'value' => '$data->trans_id',
            'headerHtmlOptions' => array('style' => 'width:80px;'),
        ),
        array(
            'name' => 'cash_status',
            'value' => '$data->getDirection($data->cash_status)',
            'filter' => $model->directionDict,
            'htmlOptions' => array('style' => 'text-align:center;'),
        ),
        array(
            'name' => 'cash_num',
            'value' => 'UtilClass::formatMoney($data->cash_num)."元"',
            'htmlOptions' => array('style' => 'text-align:right;'),
        ),
        array(
            'name' => 'use_money',
            'value' => 'UtilClass::formatMoney($data->use_money)."元"',
            'htmlOptions' => array('style' => 'text-align:right;'),
        ),
        array(
            'name' => 'status',
            'value' => '$data->getStatus($data->status)',
            'filter' => $model->statusDict,
            'htmlOptions' => array('style' => 'text-align:center;'),
        ),
        'deal_time',
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
