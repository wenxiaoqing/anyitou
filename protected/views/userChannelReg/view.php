<?php
/* @var $this UserChannelController */
/* @var $model UserChannel */

$this->breadcrumbs=array(
	'渠道管理'=>array('index'),
	$model->type,
);

$this->menu=array(
    array('label'=>'编辑渠道', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'添加渠道', 'url'=>array('create')),
	array('label'=>'管理列表', 'url'=>array('admin')),
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
    		'day',
			'type',
    		'number',
			'updatetime',
            array(
                'name' => 'url',
                'type' => 'raw',
                'value' => '<a href="http://www.anyitou.com/channelReg/?from='.$model->type.'" target="_blank" >http://www.anyitou.com/channelReg/?from='.$model->type.'</a>',
            ),
    	),
    )); ?>
	</div>
</div>

<!--<div class="portlet box blue" >
    <div class="portlet-title">
    	<div class="caption">统计信息</div>
    	<div class="tools">
    		<a href="javascript:;" class="collapse"></a>
    	</div>
    </div>
    <div class="portlet-body">
    <a href="/user/admin?channelReg=<?php echo $model->type; ?>&regtime=<?php echo $currentDay; ?>" class="btn btn-default" target="_blank" >今日注册详情</a>
    <a href="/user/admin?channelReg=<?php echo $model->type; ?>" class="btn btn-default" target="_blank" >全部注册详情</a>
	</div>
</div>-->
<script type="text/javascript" src="/plugins/highchartTable-plugin/bower.json"></script>
<script type="text/javascript" src="/plugins/highchartTable-plugin/highchartTable.jquery.json"></script>
<script type="text/javascript" src="/plugins/highchartTable-plugin/jquery.highchartTable.js"></script>
