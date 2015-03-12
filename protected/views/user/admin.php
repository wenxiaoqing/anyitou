<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'用户管理'=>array('admin'),
	'管理列表',
);

$this->menu=array(
	array('label'=>'创建用户', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#user-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php echo CHtml::link('高级搜索','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
<div style="text-align:right;" class="W-jump-page" >跳到<input class="jump-page-in" name="User_page" type="text">页<input type="button" class="jump-page-btn btn blue" value="跳转" ></div>
<?php 
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
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
            'name' => 'user_name',
			'type' => 'raw',
            'value' => 'CHtml::link(CHtml::encode($data->user_name), array("/user/view", "id" => $data->id), array("target" => "_blank"))',
        ),
		array(
			'name'=>'real_name',
			'headerHtmlOptions' => array('style' => 'width:120px;'),
		),
		array(
			'name'=>'mobile',
			 'headerHtmlOptions' => array('style' => 'width:100px;'),
		),
		array(
			'name' => 'base_status',
			'value' => '$data->getBaseStatus()',
			'filter' => $model->baseStatusAttrs,
			'headerHtmlOptions' => array('style' => 'width:100px;'),
			),
        array(
            'name' => 'mobile_status',
            'value' => '$data->getMobileStatus()',
            'filter' => $model->mobileStatusAttrs,
        ),
        array(
            'name' => 'real_status',
            'value' => '$data->getRealStatus()',
            'filter' => $model->realStatusAttrs,
        ),
			/*邮箱认证状态*/
//         array(
//             'name' => 'email_status',
//             'value' => '$data->getEmailStatus()',
//             'filter' => $model->emailStatusAttrs,
//         ),		
		array(
            'name' => 'invest_num',
            'value' => '$data->invest_num',
    	    'headerHtmlOptions' => array('style' => 'width:60px;'),
        ),
       array(
            'name' => 'channel_key',
            'type' => 'raw',
       		'value' => '$data->channel_key?$data->channel_key.CHtml::link(CHtml::encode("[查看]"), array("/userChannel/keywordView", "channel_key" => $data->channel_key), array("target" => "_blank")):"-"',
    	    'headerHtmlOptions' => array('style' => 'width:150px;'),
            'htmlOptions' => array('style' => 'text-align:center;'),
        ),
		//'reg_time',
		array(
            'name' => 'num',
            'value' => 'Yii::app()->cache->get($data->id)?Yii::app()->cache->get($data->id):"0"',
    	    'headerHtmlOptions' => array('style' => 'width:60px;'),
        ),
		array(
			'name'=>'reg_time',
			'headerHtmlOptions' => array('style' => 'width:150px;'),
		),
		/*
		'reg_time',
		'last_login_ip',
		'last_login_time',
		'is_verified',
		'auth_type',
		'reg_ip',
		*/
		array(
			'class'=>'CButtonColumn',
			'header'=>'操作', 
			'template' => '{view}{update}',
			'buttons' => array(   
					'view' => array(   
							'label'=>'查看',
							'url'=>'Yii::app()->controller->createUrl("view",array("id"=>$data->primaryKey))',  
							'options'=>array('style'=>'cursor:pointer;', 'target' => '_blank', 'class' => ''),  
					),
					'update' => array(   
							'label'=>'编辑',
							'url'=>'Yii::app()->controller->createUrl("update",array("id"=>$data->primaryKey))',  
							'options'=>array('style'=>'cursor:pointer;', 'target' => '_blank', 'class' => ''),
					),
			),
		),
	),
	'pager'=>array(
			'class'=>'application.extensions.widgets.CCLinkPager',    
			'header' => '',
			'maxButtonCount' => '5', 
			'prevPageLabel' => '上一页',
			'nextPageLabel' => '下一页',
			'firstPageLabel' => '首页', 
			'lastPageLabel' => '尾页',
			'htmlOptions' => array('class' => 'pagination'),
			//'footer' => '<div>跳到<input id="jump-page-in" name="User_page" type="text">页<input id="jump-page-btn" type="button" class="btn blue" value="跳转" ></div>',
	),
	//'summaryText' => Yii::t('zii','Displaying {start}-{end} of 1 result.|Displaying {start}-{end} of {count} results.').'<div style="text-align:right;" class="W-jump-page" >跳到<input class="jump-page-in" name="User_page" type="text">页<input type="button" class="jump-page-btn btn blue" value="跳转" ></div>',
	'template' => '{items}{summary}{pager}',
)); 

Yii::app()->clientScript->registerScript('jumppage', "
$('.jump-page-btn').bind('click', function(){
	var page = $(this).parent().find(\".jump-page-in\").val();
	$(\".jump-page-in\").val(page);
	$('#user-grid').yiiGridView('update', {
		data: $(this).find('input[type=\"text\"], select').serialize() + '&User_page=' + page
	});
	return false;
});
");
?>

<div style="text-align:right;" class="W-jump-page" >跳到<input class="jump-page-in" name="User_page" type="text">页<input type="button" class="jump-page-btn btn blue" value="跳转" ></div>
<!-- 禁止右键 -->
<script type="text/javascript">
var info_protect_switch = <?php echo $this->info_protect_switch ? 'true' : 'false'; ?>;
if(info_protect_switch) {
	$(document).bind("contextmenu",function(){return false;});  
	$(document).bind("selectstart",function(){return false;});  
	$(document).keydown(function(){return key(arguments[0])}); 
}
</script> 