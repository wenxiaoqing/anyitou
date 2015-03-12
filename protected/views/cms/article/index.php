<?php
/* @var $this ArticleController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Cms Articles',
);

$this->menu=array(
	array('label'=>'Create CmsArticle', 'url'=>array('create')),
	array('label'=>'Manage CmsArticle', 'url'=>array('admin')),
);
?>

<h1>Cms Articles</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
