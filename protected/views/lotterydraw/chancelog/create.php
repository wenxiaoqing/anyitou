<?php
/* @var $this LotterydrawChanceLogController */
/* @var $model LotterydrawChanceLog */

$this->breadcrumbs=array(
	'Lotterydraw Chance Logs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List LotterydrawChanceLog', 'url'=>array('index')),
	array('label'=>'Manage LotterydrawChanceLog', 'url'=>array('admin')),
);
?>

<h1>Create LotterydrawChanceLog</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>