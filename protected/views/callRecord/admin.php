<?php
/* @var $this CallRecordController */
/* @var $model CallRecord */

$this->breadcrumbs=array(
	'外呼列表',
);

$this->menu=array(
	array('label'=>'创建外呼记录', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#call-record-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="search-form">
<a href="/callRecord/recordOutput">导出记录</a>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'call-record-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		array(
			'name' => 'user_name',
			'type' => 'raw',
			'value' => 'CHtml::link(CHtml::encode(($data->user->user_name)), array("/user/view", "id" => $data->user_id), array("target" => "_blank"))',
			),
		array(
			'name' => 'managerName',
			'type' => 'raw',
			'value' => '$data->manager_user->username',
		),
		
		array(
			'name' => 'type',
			'value' => '$data->getTypeStatus()',
			'filter' => $model->typeStatusArrs,
			'headerHtmlOptions' => array('style' => 'width:100px;'),
			),
		array(
			'name' => 'satisfaction',
			'value' => '$data->getSatisfaction()',
			'filter' => $model->satisfactionArrs,
			'headerHtmlOptions' => array('style' => 'width:100px;'),
			),
		'time',
		'descript',
		array(
			'name' => 'channel_key',
			'type' => 'raw',
			'value'=>'$data->user->channel_key?$data->user->channel_key:其他'
		),
		array(
			'class'=>'CButtonColumn',
			
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