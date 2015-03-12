<?php
/* @var $this LotterydrawTryLogController */
/* @var $model LotterydrawTryLog */

$this->breadcrumbs=array(
	'Lotterydraw Try Logs'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List LotterydrawTryLog', 'url'=>array('index')),
	array('label'=>'Create LotterydrawTryLog', 'url'=>array('create')),
	array('label'=>'View LotterydrawTryLog', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage LotterydrawTryLog', 'url'=>array('admin')),
);
?>

<h1>Update LotterydrawTryLog <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>