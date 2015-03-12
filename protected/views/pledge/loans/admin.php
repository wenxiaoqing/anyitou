<?php
/* @var $this PledgeLoansController */
/* @var $model PledgeLoans */

$this->breadcrumbs=array(
	'Pledge Loans'=>array('index'),
	'Manage',
);

$this->menu=array(
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#pledge-loans-grid').yiiGridView('update', {
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
	'id'=>'pledge-loans-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'buy_id',
		'project_id',
		'trade_no',
		'sub_trade_no',
		'out_user_id',
		'in_user_id',
		'amount',
		'status',
		'datetime',
		//'response_data',
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
