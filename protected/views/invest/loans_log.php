<?php
/* @var $this BackgroundLoansLogController */
/* @var $model BackgroundLoansLog */

$this->breadcrumbs=array(
	'Background Loans Logs'=>array('index'),
	'Manage',
);

?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'background-loans-log-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
        array(
            'name' => 'id',
            'value' => '$data->id',
    		'headerHtmlOptions' => array('style' => 'width:80px;'),
        ),
        array(
            'name' => 'invest_id',
            'value' => '$data->invest_id',
    		'headerHtmlOptions' => array('style' => 'width:80px;'),
        ),
        array(
            'name' => 'item_id',
            'value' => '$data->invest_id',
    		'headerHtmlOptions' => array('style' => 'width:80px;'),
        ),
        array(
            'name' => 'trade_no',
            'value' => '$data->trade_no',
    		'headerHtmlOptions' => array('style' => 'width:150px;'),
            'htmlOptions' => array('style' => 'padding: 0 15px;'),
        ),
        array(
            'name' => 'sub_trade_no',
            'value' => '$data->sub_trade_no',
    		'headerHtmlOptions' => array('style' => 'padding: 0 20px; width:150px;'),
            'htmlOptions' => array('style' => 'padding: 0 15px;'),
        ),
        array(
            'name' => 'out_user_id',
            'value' => '$data->out_user->user_name."(".$data->out_user->real_name.")"',
    		'headerHtmlOptions' => array('style' => 'width:120px;'),
        ),
        array(
            'name' => 'in_user_id',
            'value' => '$data->in_user->user_name',
    		'headerHtmlOptions' => array('style' => 'width:120px;'),
        ),
		/*
		'in_user_id',
		'total_money',
		'user_real_money',
		'datetime',
		'status',
		'desc',
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
