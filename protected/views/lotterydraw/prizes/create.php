<?php
/* @var $this LotterydrawPrizesController */
/* @var $model LotterydrawPrizes */

$this->breadcrumbs=array(
	'Lotterydraw Prizes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List LotterydrawPrizes', 'url'=>array('index')),
	array('label'=>'Manage LotterydrawPrizes', 'url'=>array('admin')),
);
?>

<h1>Create LotterydrawPrizes</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>