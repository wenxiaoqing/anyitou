<?php
/* @var $this ApiCsaiController */
/* @var $model StatisticsCsai */

$this->breadcrumbs=array(
	'投资用户',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#statistics-csai-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>投资用户列表</h1>

<div class="search-form" style="display:none">
<?php
$this->renderPartial('_search',array('model'=>$model,));
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl ."/plugins/jquery-ui/jquery-ui-timepicker.js", CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl ."/plugins/jquery-ui/jquery-ui-datepicker_zh_cn.js", CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl ."/plugins/jquery-ui/jquery-ui-timepicker_zh_cn.js", CClientScript::POS_END);
$_script = <<<EOF
    $(document).ready(function() {
        $('#time').datepicker({
            dateFormat: 'yy-mm-dd'
        });
    })
EOF;
Yii::app()->getClientScript()->registerScript(__CLASS__, $_script);

?>
    <div class="form-group">
        <form name="search_user_invest" action="/ApiCsai/UserInvest?user_id=<?php echo $user_id ?>" method="post">
            <label for="raise_begin_time" class="col-sm-2 control-label">选择日期：</label>
            <div class="col-sm-5">
                <input class="form-control col-sm-4" name="time" id="time" type="text" value="<?php echo $date; ?>" />
                <input type="hidden" name="user_id" value="<?php echo $user_id ;?>">
            </div>
            <div class="col-sm-5 control-info"><input class="btn btn-large btn-primary" id="submitBtn" type="submit" name="submit" value="查看"><label>（选取日期，即可查看当月统计）</label></div>
        </form>
    </div>
</div><!-- search-form -->

<?php
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'statistics-csai-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
        array(
            'name'  =>  'id',
            'value' =>  '$data->id',
            'headerHtmlOptions' => array('style' => 'width:50px;'),
        ),
		'user_name',
        array(
            'name'  =>  'real_name',
            'value' =>  '($data->real_name != "") ? $data->real_name : "-"'
        ),
        array(
            'name'  =>  'mobile',
            'value' =>  '($data->replaceMobile($data->mobile) != "") ? $data->replaceMobile($data->mobile) : "-"'
        ),
		'invest_total',
		/*
		'statistical_time',
		*/
        array(
            'name'  =>  'is_invest_month',
            'value' =>  '$data->getStatusInvestMonth($data->user_id)',
        ),
        array(
            'class'     =>'CButtonColumn',
            'template'  =>  '{view}',
            'buttons'   =>array(
                'view'      =>  array(
                    'url'   =>  'Yii::app()->controller->createUrl("ApiCsai/UserInvest",array("user_id"=>$data->user_id))',
                    'options'   =>  array('title'=>'查看投资详情')
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
    'template' => '{items}{summary}{pager}',
)); ?>
