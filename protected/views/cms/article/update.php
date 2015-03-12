<?php
/* @var $this ArticleController */
/* @var $model CmsArticle */

$this->breadcrumbs=array(
	'Cms Articles'=>array('index'),
	$model->title=>array('view','id'=>$model->article_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CmsArticle', 'url'=>array('index')),
	array('label'=>'Create CmsArticle', 'url'=>array('create')),
	array('label'=>'View CmsArticle', 'url'=>array('view', 'id'=>$model->article_id)),
	array('label'=>'Manage CmsArticle', 'url'=>array('admin')),
);
?>

<div class="portlet box blue ">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa fa-reorder"></i>编辑文章 #<?php echo $model->article_id; ?>
		</div>
		<div class="tools"></div>
	</div>
	<div class="portlet-body form">
	<?php echo $this->renderPartial('_form', array('model'=>$model,
				'channelARs' => $channelARs,
				'classARs' => $classARs,));
	?>
	</div>
</div>