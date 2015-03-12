<?php
/* @var $this DebtSellController */
/* @var $model DebtSell */

$this->breadcrumbs=array(
	'Debt Sells'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List DebtSell', 'url'=>array('index')),
	array('label'=>'Manage DebtSell', 'url'=>array('admin')),
);
?>

<h1>Create DebtSell</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>