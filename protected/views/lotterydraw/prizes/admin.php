<?php
/* @var $this LotterydrawPrizesController */
/* @var $model LotterydrawPrizes */

$this->breadcrumbs=array(
	'Lotterydraw Prizes'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List LotterydrawPrizes', 'url'=>array('index')),
	array('label'=>'Create LotterydrawPrizes', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#lotterydraw-prizes-grid').yiiGridView('update', {
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
	'id'=>'lotterydraw-prizes-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'event_id',
		'status',
		'type',
		'level',
		'order',
		/*
		'name',
		'pic_url',
		'chance',
		'money',
		'description',
		'remain',
		'winning_number',
		'out_number',
		'rules',
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
