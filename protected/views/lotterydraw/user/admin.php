<?php
/* @var $this LotterydrawUserController */
/* @var $model LotterydrawUser */

$this->breadcrumbs=array(
	'Lotterydraw Users'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List LotterydrawUser', 'url'=>array('index')),
	array('label'=>'Create LotterydrawUser', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#lotterydraw-user-grid').yiiGridView('update', {
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
	'id'=>'lotterydraw-user-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'user_id',
		'event_id',
		'chance',
		'tried_num',
		'win_number',
		/*
		'updatetime',
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
