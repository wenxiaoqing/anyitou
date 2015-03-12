<?php
/* @var $this UserFriendRecommendController */
/* @var $model UserFriendRecommend */

$this->breadcrumbs=array(
	'用户管理'=>array('admin'),
	'邀请记录',
);

$this->menu=array(
		array('label'=>'创建邀请记录','url'=>array('inviteCreate')),		
);

/*
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#user-friend-recommend-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");*/
?>

<div class="portlet box blue" >
    <div class="portlet-title">
    	<div class="caption">邀请记录</div>
    	<div class="tools">
    	</div>
    </div>
    <div class="portlet-body">
    	<div class="table-responsive">
    	<?php $this->widget('zii.widgets.grid.CGridView', array(
        	'id'=>'user-friend-recommend-grid',
        	'dataProvider'=>$model->search(),
        	'filter'=>$model,
        	'columns'=>array(
    	        array(
                    'name' => 'id',
                    'value' => '$data->id',
    	            'headerHtmlOptions' => array('style' => 'width:80px;'),
                ),
    	        array(
    	            'name' => 'user_name',
    	            'type' => 'raw',
    	            'value' => 'CHtml::link(CHtml::encode($data->user->user_name), array("/user/view", "id" => $data->user_id))',
    	        ),
    	        array(
    	            'name' => 'recommend_user_name',
    	            'type' => 'raw',
    	            'value' => 'CHtml::link(CHtml::encode($data->recommend_user->user_name), array("/user/view", "id" => $data->recommend_id))',
    	        ),
        		array(
    	            'name' => 'prize',
    	            'type' => 'raw',
    	            'value' => '"<span>".$data->prize."</span><span class=\"unit\" >元</span>"',
        		    //'filter' => '',
            		'htmlOptions' => array('style' => 'text-align:right;'),
    	        ),
    	        array(
    	            'name' => 'income',
    	            'type' => 'raw',
    	            'value' => '"<span>".$data->income."</span><span class=\"unit\" >元</span>"',
    	            //'filter' => '',
            		'htmlOptions' => array('style' => 'text-align:right;'),
    	        ),
    	        array(
                    'name' => 'date_time',
                    'value' => '$data->date_time',
    	            'headerHtmlOptions' => array('style' => 'width:150px;'),
    	            'htmlOptions' => array('style' => 'text-align:center;'),
                ),
        		array(
                    'name' => 'recommend_type',
                    'value' => '$data->getType()',
        		    'filter' => $model->typeAttrs,
                ),
    	        array(
                    'name' => 'status',
                    'value' => '$data->getStatus()',
    	            'filter' => $model->statusAttrs,
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
    	</div>
    </div>
</div>
