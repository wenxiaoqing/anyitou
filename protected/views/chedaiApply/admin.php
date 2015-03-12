<?php
/* @var $this CarLoanController */
/* @var $model CarLoanApply */

$this->breadcrumbs=array(
	'Car Loan Applies'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List CarLoanApply', 'url'=>array('index')),
	array('label'=>'Create CarLoanApply', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#car-loan-apply-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>车贷申请管理</h1>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'car-loan-apply-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'user_id',
		'real_name',
		'identity',
		'mobile',
		'loan_amount',
		/*
		'used_time',
		'license_plate',
		'vehicle_type',
		'used_property',
		'traffic_violation',
		'turbo',
		'buy_time',
		'buy_price',
		'color',
		'brand_model',
		'emissions',
		'kilometre',
		'loan_purpose',
		'repayment_source',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
