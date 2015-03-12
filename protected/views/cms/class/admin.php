<?php
/* @var $this ClassController */
/* @var $model CmsClass */

$this->breadcrumbs=array(
	'Cms Classes'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List CmsClass', 'url'=>array('index')),
	array('label'=>'Create CmsClass', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#cms-class-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Cms Classes</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'cms-class-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'class_id',
		'channel_id',
		'class',
		'parent_id',
		array(
			'class'=>'CButtonColumn',
		),
	),
	'pager'=>array(
            'class'=>'application.extensions.widgets.CCLinkPager',    
			'header' => '',
			'maxButtonCount' => '15', 
			'prevPageLabel' => '上一页',
			'nextPageLabel' => '下一页',
			'firstPageLabel' => '首页', 
			'lastPageLabel' => '尾页',
			'htmlOptions' => array('class' => 'pagination')
	),
)); ?>
