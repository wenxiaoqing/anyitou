<?php
/* @var $this UserChannelController */
/* @var $model UserChannel */

$this->breadcrumbs=array(
	'关键词管理'=>array('index'),
	$model->title,
);

$this->menu=array(
    //array('label'=>'编辑渠道', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'添加关键词', 'url'=>array('create')),
	array('label'=>'关键词列表', 'url'=>array('admin')),
);

$currentDay = date('Y-m-d');

?>

<div class="portlet box blue" >
    <div class="portlet-title">
    	<div class="caption">基本信息</div>
    	<div class="tools">
    		<a href="javascript:;" class="collapse"></a>
    	</div>
    </div>
    <div class="portlet-body">
    <?php $this->widget('zii.widgets.CDetailView', array(
    	'data'=>$model,
    	'attributes'=>array(
    		'id',
			'title',
    		'plan',
			'group',
			array(
			'name'=>'type_id',
			'value'=>$model->userChannelType->name,	
			),
			'channel_key',
			'add_time',
            array(
                'name' => 'status',
                'value' => $model->getStatus(),
            ),
            array(
                'name' => 'url',
                'type' => 'raw',
                'value' => '<a href="http://www.anyitou.com/channel/?from='.$model->channel_key.'" target="_blank" >http://www.anyitou.com/channel/?from='.$model->channel_key.'</a>',
            ),
    	),
    )); ?>
	</div>
</div>

<div class="portlet box blue" >
    <div class="portlet-title">
    	<div class="caption">统计信息</div>
    	<div class="tools">
    		<a href="javascript:;" class="collapse"></a>
    	</div>
    </div>
    <div class="portlet-body">
    <a href="/user/admin?channel=<?php echo $model->channel_key; ?>&regtime=<?php echo $currentDay; ?>" class="btn btn-default" target="_blank" >今日注册详情</a>
    <a href="/user/admin?channel=<?php echo $model->channel_key; ?>" class="btn btn-default" target="_blank" >全部注册详情</a>
	</div>
</div>

<!--<?php print_r($statModel); $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-channel-grid',
	'dataProvider' => $UserChannelReg->search(),
	'filter'=>$UserChannelReg,
	'columns'=>array(
		array(
            'name' => 'id',
            'value' => '$data->id',
    	    'headerHtmlOptions' => array('style' => 'width:80px;'),
        ),
		'day',
		'number',
		'updatetime',
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
)); ?>-->

