<?php
/* @var $this LotterydrawTryLogController */
/* @var $model LotterydrawTryLog */

$this->breadcrumbs=array(
	'Lotterydraw Try Logs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List LotterydrawTryLog', 'url'=>array('index')),
	array('label'=>'Manage LotterydrawTryLog', 'url'=>array('admin')),
);
?>

<h1>Create LotterydrawTryLog</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>