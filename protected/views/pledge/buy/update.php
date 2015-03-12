<?php
/* @var $this PledgeBuyController */
/* @var $model PledgeBuy */

$this->breadcrumbs=array(
	'Pledge Buys'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List PledgeBuy', 'url'=>array('index')),
	array('label'=>'Create PledgeBuy', 'url'=>array('create')),
	array('label'=>'View PledgeBuy', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage PledgeBuy', 'url'=>array('admin')),
);
?>

<h1>Update PledgeBuy <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>