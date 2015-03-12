<?php
/* @var $this LotterydrawPrizesController */
/* @var $model LotterydrawPrizes */

$this->breadcrumbs=array(
	'Lotterydraw Prizes'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List LotterydrawPrizes', 'url'=>array('index')),
	array('label'=>'Create LotterydrawPrizes', 'url'=>array('create')),
	array('label'=>'View LotterydrawPrizes', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage LotterydrawPrizes', 'url'=>array('admin')),
);
?>

<h1>Update LotterydrawPrizes <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>