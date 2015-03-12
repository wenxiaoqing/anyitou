<?php
/* @var $this LotterydrawChanceLogController */
/* @var $model LotterydrawChanceLog */

$this->breadcrumbs=array(
	'Lotterydraw Chance Logs'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List LotterydrawChanceLog', 'url'=>array('index')),
	array('label'=>'Create LotterydrawChanceLog', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#lotterydraw-chance-log-grid').yiiGridView('update', {
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
	'id'=>'lotterydraw-chance-log-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'user_id',
		'event_id',
		'chance',
		'source',
		'source_id',
		/*
		'addtime',
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
