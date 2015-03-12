<?php
/* @var $this GuaranteeController */
/* @var $model GuaranteeInfo */

$this->breadcrumbs=array(
	'Guarantee Infos'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List GuaranteeInfo', 'url'=>array('index')),
	array('label'=>'Create GuaranteeInfo', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#guarantee-info-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php echo CHtml::link('高级搜索','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'guarantee-info-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'tel',
		'address',
		'link_user',
		'link_mobile',
		/*
		'qualification',
		'intro',
		'website',
		'logo_pic',
		'status',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
	'pager'=>array(
            'class'=>'application.extensions.widgets.CCLinkPager',    
			'header' => '',
			'maxButtonCount' => '15', 
			'prevPageLabel' => '上一页',
			'nextPageLabel' => '下一页',
			'firstPageLabel' => '首页', 
			'lastPageLabel' => '尾页',
			'htmlOptions' => array('class' => 'pagination')
	),
)); ?>
