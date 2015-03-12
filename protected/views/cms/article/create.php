<?php
/* @var $this ArticleController */
/* @var $model CmsArticle */

$this->breadcrumbs=array(
	'Cms Articles'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CmsArticle', 'url'=>array('index')),
	array('label'=>'Manage CmsArticle', 'url'=>array('admin')),
);
?>

<div class="portlet box blue ">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa fa-reorder"></i>创建文章
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