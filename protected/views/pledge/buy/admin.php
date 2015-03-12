<?php
/* @var $this PledgeBuyController */
/* @var $model PledgeBuy */

$this->breadcrumbs=array(
    'Pledge Buys'=>array('index'),
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
    $('#pledge-buy-grid').yiiGridView('update', {
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
    'id'=>'pledge-buy-grid',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'columns'=>array(
        'id',
        'trade_no',
        'user_id',
        'project_id',
        'status',
        'loan_status',
        'repayment_status',
        'amount',
        'interest',
        'repayed_capital',
        'payed_interest',
        'buytime',
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
