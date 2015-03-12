<?php
/**
 * Created by PhpStorm.
 * User: AKY
 * Date: 2014/11/11
 * Time: 22:03
 */
$this->breadcrumbs=array(
    '问卷调查管理',
    '统计信息'=>array('Tongji'),
    '题目列表',
);

$this->menu=array(
    array('label'=>'调查用户列表', 'url'=>array('UserList')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#questionnaire-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

    <h1>题目列表</h1>
    <div class="search-form" style="display:none">
        <?php $this->renderPartial('_search',array(
            'model'=>$model,
        )); ?>
    </div><!-- search-form -->
<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'questionnaire-grid',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'columns'=>array(
        array(
            'name'  =>  'id',
            'value' =>  '$data->id',
            'headerHtmlOptions' => array('style' => 'width:50px;'),
        ),
        array(
            'name'  =>  'q_title',
            'value' =>  '$data->q_title',
            'headerHtmlOptions' =>  array('style'   =>  'width:300px'),
        ),
        array(
            'name'  =>  'q_category',
            'value' =>  '$data->q_category',
            'headerHtmlOptions' =>  array('style'   =>  'width:50px'),
        ),
        array(
            'name'  =>  'q_type',
            'value' =>  '$data->getInfoByKey($data->q_type,3)',
            'filter' => $model->question_type,
            'headerHtmlOptions' =>  array('style'   =>  'width:50px'),
        ),
        array(
            'name'  =>  'q_sort',
            'value' =>  '$data->q_sort',
            'headerHtmlOptions' =>  array('style'   =>  'width:50px'),
        ),
        array(
            'name'  =>  'q_status',
            'value' =>  '$data->getInfoByKey($data->q_status,1)',
            'filter' => $model->status_info,
            'headerHtmlOptions' =>  array('style'   =>  'width:50px'),
        ),
        array(
            'class'     =>'CButtonColumn',
            'template'  =>  '{view}',
            'buttons'   =>array(
                'view'      =>  array(
                    'url'   =>  'Yii::app()->controller->createUrl("question/TongjiView",array("q_id"=>$data->id,"q_type"=>$data->q_type))',
                    'options'   =>  array('title'=>'点击本题统计详情')
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