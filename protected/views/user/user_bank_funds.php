<?php
/* @var $this UserFriendRecommendController */
/* @var $model UserFriendRecommend */

$this->breadcrumbs=array(
	'用户管理'=>array('admin'),
	'银行卡管理',
);


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
");
?>

<!--<div class="portlet box blue" >-->
  <!--<div class="portlet-title">
    	<div class="caption">邀请记录</div>
    	<div class="tools">
    	</div>
    </div>-->
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
    	        	'type'=>'raw',
    	        	'value' => 'CHtml::link(CHtml::encode($data->user->user_name), array("/user/view", "id" => $data->user_id), array("target" => "_blank"))',
    	        ),
        		array(
        			'name' => 'bank_card_no',
        			'value'=>'$data->bank_card_no',
        			'htmlOptions' => array('style' => 'text-align:center;'),
        			),
    	        array(
    	            'name' => 'bank_name',
    	        	'type'=>'raw',
    	        	'value' => 'CHtml::link(CHtml::encode($data->bankInfo->name), array("/user/bankView", "id" => $data->bankInfo->id), array("target" => "_blank"))',
    	        	'htmlOptions' => array('style' => 'text-align:center;width:10%;'),
    	        ),
        		array(
    	            'name' => 'bank_address',
        			'value'=>'$data->bank_address',
            		'htmlOptions' => array('style' => 'text-align:center;'),
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
   <!--</div>-->
</div>
