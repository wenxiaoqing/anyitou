<?php
/* @var $this SystemConfigController */
/* @var $model SystemConfig */

$this->breadcrumbs=array(
	'系统配置列表'=>array('admin'),
	$model->id,
);

$this->menu=array(
	array('label'=>'系统配置列表', 'url'=>array('admin')),
	array('label'=>'创建系统配置', 'url'=>array('create')),
	array('label'=>'修改系统配置', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'删除系统配置', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'确认删除?')),
);
?>

<h1>系统配置 #<?php echo $model->id; ?></h1>
<div class="portlet box blue" >
    <div class="portlet-title">
    	<div class="caption">系统配置信息</div>
    	<div class="tools">
    		<a href="javascript:;" class="collapse"></a>
    	</div>
    </div>
     <div class="portlet-body">
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'scope',
		'variable',
		'value',
		'description',
	),
)); ?>
</div>
</div>
