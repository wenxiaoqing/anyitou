<?php
/* @var $this PledgeProjectController */
/* @var $model PledgeProject */

$this->breadcrumbs=array(
	'Pledge Projects'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List PledgeProject', 'url'=>array('index')),
	array('label'=>'Create PledgeProject', 'url'=>array('create')),
	array('label'=>'View PledgeProject', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage PledgeProject', 'url'=>array('admin')),
);
?>

<h1>Update PledgeProject <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>