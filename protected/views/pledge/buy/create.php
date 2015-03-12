<?php
/* @var $this PledgeBuyController */
/* @var $model PledgeBuy */

$this->breadcrumbs=array(
	'Pledge Buys'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List PledgeBuy', 'url'=>array('index')),
	array('label'=>'Manage PledgeBuy', 'url'=>array('admin')),
);
?>

<h1>Create PledgeBuy</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>