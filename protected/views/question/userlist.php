<?php
/**
 * Created by PhpStorm.
 * User: AKY
 * Date: 2014/11/11
 * Time: 22:03
 */
$this->breadcrumbs=array(
    '问卷调查管理',
    '统计管理'=>array('Tongji'),
    '调查用户列表',
);

$this->menu=array(
    array('label'=>'统计管理', 'url'=>array('Tongji')),
    array('label'=>'调查用户列表', 'url'=>array('UserList')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#question-answer-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>调查用户列表</h1>
<div class="search-form" style="display:none">
    <?php $this->renderPartial('_answer_search',array(
        'model'=>$model,
    )); ?>
</div>
<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'question-answer-grid',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'columns'=>array(
        array(
            'name'  =>  'id',
            'value' =>  '$data->id',
            'headerHtmlOptions' => array('style' => 'width:50px;'),
        ),
        array(
            'name'  =>  'real_name',
            'value' =>  '$data->real_name',
            'headerHtmlOptions' =>  array('style'   =>  'width:50px'),
        ),
        array(
            'name'  =>  'mobile',
            'value' =>  '$data->mobile',
            'headerHtmlOptions' =>  array('style'   =>  'width:50px'),
        ),
        array(
            'name'  =>  'answer_time',
            'value' =>  '$data->answer_time',
            'headerHtmlOptions' =>  array('style'   =>  'width:50px'),
        ),
        array(
            'name'  =>  'lucky',
            'value' =>  '$data->getInfoByKey($data->lucky,2)',
            'filter' => $model->is_lucky,
            'headerHtmlOptions' =>  array('style'   =>  'width:50px'),
        ),
        array(
            'name'  =>  'status',
            'value' =>  '$data->getInfoByKey($data->status,1)',
            'filter' => $model->status_info,
            'headerHtmlOptions' =>  array('style'   =>  'width:50px'),
        ),
        array(
            'class'     =>'CButtonColumn',
            'template'  =>  '{view}{update}',
            'buttons'   =>array(
                'view'      =>  array(
                    'url'   =>  'Yii::app()->controller->createUrl("question/AnswerView/mobile/$data->mobile")',
                    'options'   =>  array('title'=>'点击本用户查看统计详情')
                ),
                'update'    =>  array(
                    'url'   =>  'Yii::app()->controller->createUrl("question/SetLucky/mobile/$data->mobile/lucky/$data->lucky")',
                    'options'   =>  array('title'=>'点击修改用户中奖状态'),
                    'click' =>  'function(){if(!confirm("确定设置此用户中奖？")) return false;}'
                )
            )
        ),
    ),
    'pager'=>array(
        'class'=>'application.extensions.widgets.CCLinkPager',
        'header' => '',
        'maxButtonCount' => '10',
        'prevPageLabel' => '上一页',
        'nextPageLabel' => '下一页',
        'firstPageLabel' => '首页',
        'lastPageLabel' => '尾页',
        'htmlOptions' => array('class' => 'pagination')
    ),
)); ?>