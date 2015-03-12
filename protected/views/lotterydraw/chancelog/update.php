<?php
/* @var $this LotterydrawChanceLogController */
/* @var $model LotterydrawChanceLog */

$this->breadcrumbs=array(
	'Lotterydraw Chance Logs'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List LotterydrawChanceLog', 'url'=>array('index')),
	array('label'=>'Create LotterydrawChanceLog', 'url'=>array('create')),
	array('label'=>'View LotterydrawChanceLog', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage LotterydrawChanceLog', 'url'=>array('admin')),
);
?>

<h1>Update LotterydrawChanceLog <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>