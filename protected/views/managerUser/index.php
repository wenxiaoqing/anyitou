<?php
/* @var $this ManagerUserController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Manager Users',
);

$this->menu=array(
	array('label'=>'Create ManagerUser', 'url'=>array('create')),
	array('label'=>'Manage ManagerUser', 'url'=>array('admin')),
);
?>

<h1>Manager Users</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
