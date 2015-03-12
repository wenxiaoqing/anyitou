<?php
/* @var $this ItemRepaymentLogController */
/* @var $model ItemRepaymentLog */

$this->breadcrumbs=array(
	'投资管理'=>array('admin'),
	'还款记录',
);

?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'item-repayment-log-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
        'type',
		'invest_id',
		'item_id',
        array(
            'name' => 'user_id',
            'type' => 'raw',
            'value' => 'CHtml::link(CHtml::encode($data->user->user_name), array("repayment", "user_id" => $data->user_id))." ".CHtml::link("[查看]", array("/user/view", "id" => $data->user_id), array("target" => "_blank"))',
    		'headerHtmlOptions' => array('style' => 'width:135px;'),
        	'htmlOptions' => array('style' => 'text-align:center;'),
        ),
		'trade_no',
		'status',
        array(
            'name' => 'value_time',
            'value' => '$data->value_time',
    		'headerHtmlOptions' => array('style' => 'width:135px;'),
        	'htmlOptions' => array('style' => 'text-align:center;'),
        ),
        array(
            'name' => 'repay_time',
            'value' => '$data->repay_time',
    		'headerHtmlOptions' => array('style' => 'width:135px;'),
        	'htmlOptions' => array('style' => 'text-align:center;'),
        ),
        array(
            'name' => 'interest',
            'value' => '$data->interest',
    		'headerHtmlOptions' => array('style' => 'width:80px;'),
        	'htmlOptions' => array('style' => 'text-align:right;'),
        ),
        array(
            'name' => 'capital',
            'value' => '$data->capital',
    		'headerHtmlOptions' => array('style' => 'width:80px;'),
        	'htmlOptions' => array('style' => 'text-align:right;'),
        ),
        array(
            'name' => 'addtime',
            'value' => '$data->addtime',
    		'headerHtmlOptions' => array('style' => 'width:150px;'),
        	'htmlOptions' => array('style' => 'text-align:center;'),
        ),
        'response',
		/*
		'type',
		'order',
		'addip',
		*/
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
