<?php
/* @var $this LotterydrawTryLogController */
/* @var $model LotterydrawTryLog */

$this->breadcrumbs=array(
	'Lotterydraw Try Logs'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List LotterydrawTryLog', 'url'=>array('index')),
	array('label'=>'Create LotterydrawTryLog', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#lotterydraw-try-log-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'lotterydraw-try-log-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'event_id',
		'status',
		'user_id',
		'iswinner',
		'prize_id',
		/*
		'remark',
		'givetime',
		'addtime',
		'addip',
		*/
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
