<?php
/* @var $this ArticleController */
/* @var $model CmsArticle */

$this->breadcrumbs=array(
	'Cms Articles'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List CmsArticle', 'url'=>array('index')),
	array('label'=>'Create CmsArticle', 'url'=>array('create')),
	array('label'=>'Update CmsArticle', 'url'=>array('update', 'id'=>$model->article_id)),
	array('label'=>'Delete CmsArticle', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->article_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CmsArticle', 'url'=>array('admin')),
);
?>

<h1>View CmsArticle #<?php echo $model->article_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'article_id',
		'channel_id',
		'class_id',
		'title',
		'sub_title',
		array(
		    'name' => 'summary',
		    'type' => 'raw',
		    'value' => $data->summary,
		),
		array(
		    'name' => 'content',
		    'type' => 'raw',
		    'value' => $data->content,
		),
		'keyword',
		'hits',
		'add_date',
		'update_date',
		'is_recommend',
	),
)); ?>
