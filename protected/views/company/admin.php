<?php
/* @var $this CompanyController */
/* @var $model FinancingCompany */

$this->breadcrumbs=array(
	'Financing Companies'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List FinancingCompany', 'url'=>array('index')),
	array('label'=>'Create FinancingCompany', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#financing-company-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php echo CHtml::link('高级搜索','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'financing-company-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
           'name' => 'id',
           'headerHtmlOptions' => array('style' => 'width:100px;'),
        ),
		array(
           'name' => 'name',
           'headerHtmlOptions' => array('style' => 'width:400px;'),
        ),
        array(
           'name' => 'user_id',
           'value' => ' $data->user_id ? CHtml::link(CHtml::encode($data->user->user_name), array("/user/view", "id" => $data->user_id), array("target" => "_blank")) : "-" ',
           'type' => 'raw',
           'headerHtmlOptions' => array('style' => 'width:150px;'),
        ),
		'tel',
		'link_user',
		'link_mobile',
		array(
			'class'=>'CButtonColumn',
			'headerHtmlOptions' => array('style' => 'width:100px;'),
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
<script type="text/javascript" >
$(function() {
	$('.bind-user-btn').click(function(){
		
	});
});
</script>