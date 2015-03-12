<?php
/* @var $this LotterydrawEventController */
/* @var $model LotterydrawEvent */

$this->breadcrumbs=array(
	'抽奖活动' => array('index'),
	'活动管理',
);

$this->menu=array(
	array('label'=>'创建活动', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#lotterydraw-event-grid').yiiGridView('update', {
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

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'lotterydraw-event-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'nid',
		'status',
		'type',
		'name',
		'starttime',
        'expirtdate',
        'status',
		'addtime',
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
			'maxButtonCount' => '10', 
			'prevPageLabel' => '上一页',
			'nextPageLabel' => '下一页',
			'firstPageLabel' => '首页', 
			'lastPageLabel' => '尾页',
			'htmlOptions' => array('class' => 'pagination')
	),
	'template' => '{items}{summary}{pager}',
)); ?>
