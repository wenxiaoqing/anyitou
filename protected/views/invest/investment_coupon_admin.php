<?php
/* @var $this UserCouponLogController */
/* @var $model UserCouponLog */

$this->breadcrumbs=array(
	'投资管理'=>array('records'),
	'投资券领取记录',
);

?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'user-coupon-log-grid',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'columns'=>array(
    	array(
            'name' => 'id',
            'value' => '$data->id',
    		'headerHtmlOptions' => array('style' => 'width:80px;'),
        ),
        array(
            'name' => 'userName',
            'type' => 'raw',
            'value' => 'CHtml::link(CHtml::encode($data->user->user_name), array(\'/user/view\', \'id\' => $data->user_id), array("target" => "_blank"))',
    		'headerHtmlOptions' => array('style' => 'width:120px;'),
        ),
        array(
            'name' => 'coupon_id',
            'value' => '$data->coupon_id',
    		'headerHtmlOptions' => array('style' => 'width:80px;'),
        ),
        array(
            'name' => 'item_id',
            'value' => '$data->item_id',
    		'headerHtmlOptions' => array('style' => 'width:80px;'),
        ),
        array(
            'name' => 'item',
            'type' => 'raw',
            'value' => 'CHtml::link(CHtml::encode($data->item_info->item_title), array(\'/project/view\', \'id\' => $data->item_id), array("target" => "_blank"))',
        ),
        array(
            'name' => 'get_time',
            'value' => '$data->get_time',
    		'headerHtmlOptions' => array('style' => 'width:180px;'),
            'htmlOptions' => array('style' => 'text-align:center;'),
        ),
        array(
            'name' => 'status',
            'value' => '$data->getStatus()',
             'filter' => $model->statusAttrs,
    		'headerHtmlOptions' => array('style' => 'width:80px;'),
        	'htmlOptions' => array('style' => 'text-align:center;'),
        ),
    	/*
    	'use_time',
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