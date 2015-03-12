<?php
/* @var $this CompanyController */
/* @var $model FinancingCompany */

$this->breadcrumbs=array(
	'Financing Companies'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List FinancingCompany', 'url'=>array('index')),
	array('label'=>'Create FinancingCompany', 'url'=>array('create')),
	array('label'=>'Update FinancingCompany', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Manage FinancingCompany', 'url'=>array('admin')),
);
?>

<h1>查看企业信息 #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
        array(
           'name' => 'user_id',
           'type' => 'raw',
           'value' => $model->user_id ? '<a href="'.Yii::app()->createUrl('user/view', array('id' => $model->user_id)).'" target="_blank" >'.$model->user->user_name.'</a>' : "-",
        ),
		'tel',
		'address',
		'link_user',
		'link_mobile',
		'company_no',
        array(
		    'name' => 'information',
		    'type' => 'raw',
		    'value' => $model->information,
		),
        array(
		    'name' => 'qualification',
		    'type' => 'raw',
		    'value' => $model->qualification,
		),
        array(
		    'name' => 'intro',
		    'type' => 'raw',
		    'value' => $model->intro,
		),
		array(
		    'name' => 'background',
		    'type' => 'raw',
		    'value' => $model->background,
		),
		'website',
	),
)); ?>
