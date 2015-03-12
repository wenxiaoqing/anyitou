<?php
/* @var $this GuaranteeController */
/* @var $model GuaranteeInfo */

$this->breadcrumbs=array(
	'Guarantee Infos'=>array('index'),
	$model->name,
);

$this->menu=array(
	//array('label'=>'List GuaranteeInfo', 'url'=>array('index')),
	array('label'=>'创建担保机构', 'url'=>array('create')),
	array('label'=>'编辑', 'url'=>array('update', 'id'=>$model->id)),
	//array('label'=>'删除', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'管理列表', 'url'=>array('admin')),
);
?>

<h1>查看担保机构 #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
        'user_name',
        'abbr',
		'tel',
		'address',
		'link_user',
		'link_mobile',
		'qualification',
		'intro',
		'website',
		'logo_pic',
		'status',
	),
)); ?>
