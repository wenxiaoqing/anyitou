<?php
/* @var $this ClassController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Cms Classes',
);

$this->menu=array(
	array('label'=>'Create CmsClass', 'url'=>array('create')),
	array('label'=>'Manage CmsClass', 'url'=>array('admin')),
);
?>

<h1>Cms Classes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
