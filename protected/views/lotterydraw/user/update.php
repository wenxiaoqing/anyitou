<?php
/* @var $this LotterydrawUserController */
/* @var $model LotterydrawUser */

$this->breadcrumbs=array(
	'Lotterydraw Users'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List LotterydrawUser', 'url'=>array('index')),
	array('label'=>'Create LotterydrawUser', 'url'=>array('create')),
	array('label'=>'View LotterydrawUser', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage LotterydrawUser', 'url'=>array('admin')),
);
?>

<h1>Update LotterydrawUser <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>