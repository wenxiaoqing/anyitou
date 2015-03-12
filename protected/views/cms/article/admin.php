<?php
/* @var $this ArticleController */
/* @var $model CmsArticle */

$this->breadcrumbs=array(
	'Cms Articles'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List CmsArticle', 'url'=>array('index')),
	array('label'=>'Create CmsArticle', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#cms-article-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>文章管理</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('高级搜索','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'cms-article-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
			'name' => 'article_id',
			'value' => '$data->article_id',
			'headerHtmlOptions' => array('width' => '60'),
		),
		array(
			'name' => 'title',
			'type'=>'raw',
			'value' => 'CHtml::link($data->title, array("view", "id" => $data->article_id))',
			'headerHtmlOptions' => array('width' => '300'),
		),
		array(
			'name' => 'channel_id',
			'value' => '$data->cmsChannel->name',
		),
		array(
			'name' => 'class_id',
			'value' => '$data->cmsClass->class',
		),
		array(
			'name' => 'add_date',
			'value' => '$data->add_date',
			'headerHtmlOptions' => array('width' => '125'),
		),
		/*
		'content',
		'keyword',
		'hits',
		'seacher_text',
		'add_date',
		'add_userid',
		'update_date',
		'update_userid',
		'is_recommend',
		*/
		array(
			'class'=>'CButtonColumn',
			'header' => '操作',
			'headerHtmlOptions' => array('width' => '120'),
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
