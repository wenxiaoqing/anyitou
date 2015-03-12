<?php
/* @var $this CallRecordController */
/* @var $model CallRecord */

$this->breadcrumbs=array(
	'列表管理'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'返回列表', 'url'=>array('admin')),
	array('label'=>'创建列表', 'url'=>array('create')),
	
);
?>

<h1>外呼详细 #<?php echo $model->id; ?></h1>
<div class="portlet box blue" >
    <div class="portlet-title">
    	<div class="caption">用户信息</div>
    	<div class="tools">
    		<a href="javascript:;" class="collapse"></a>
    	</div>
    </div>
    <div class="portlet-body">
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'time',
		array(
			'name' => 'managerName',
			'type' => 'raw',
			'value' => $model->getTypeStatus(),
		),
		'descript',
		array(
		'name' => 'satisfaction',
		'value' => $model->getSatisfaction(),
),
		array(
		'name' => 'user_name',
		'type' => 'raw',
		'value' => $model->user->user_name,
),
	),
)); ?>
</div>
</div>