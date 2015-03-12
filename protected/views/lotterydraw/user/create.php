<?php
/* @var $this LotterydrawUserController */
/* @var $model LotterydrawUser */

$this->breadcrumbs=array(
	'Lotterydraw Users'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List LotterydrawUser', 'url'=>array('index')),
	array('label'=>'Manage LotterydrawUser', 'url'=>array('admin')),
);
?>

<h1>Create LotterydrawUser</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>