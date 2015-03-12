<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
    '用户管理'=>array('admin'),
    '管理列表',
);

$this->menu=array(
    array('label'=>'创建用户', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#user-grid').yiiGridView('update', {
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
<div style="text-align:right;" class="W-jump-page" >跳到<input class="jump-page-in" name="User_page" type="text">页<input type="button" class="jump-page-btn btn blue" value="跳转" ></div>
<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'user-grid',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'columns'=>array(
        array(
            'name' => 'id',
            'value' => '$data->id',
            'type' => 'raw',
            'htmlOptions' => array('style' => 'text-align:center;width:60px;','class'=>'numId','title'=>'$data->id'),
        ),
        array(
            'name' => 'user_name',
            'type' => 'raw',
            'value' => 'CHtml::link(CHtml::encode($data->user_name), array("/user/view", "id" => $data->id), array("target" => "_blank"))',
        ),
        array(
            'name'=>'real_name',
            'headerHtmlOptions' => array('style' => 'width:120px;'),
        ),
        array(
            'name'=>'mobile',
            'headerHtmlOptions' => array('style' => 'width:100px;'),
        ),
        array(
            'name' => 'base_status',
            'value' => '$data->getBaseStatus()',
            'filter' => $model->baseStatusAttrs,
            'headerHtmlOptions' => array('style' => 'width:100px;'),
        ),
        array(
            'name' => 'mobile_status',
            'value' => '$data->getMobileStatus()',
            'filter' => $model->mobileStatusAttrs,
        ),
        array(
            'name' => 'real_status',
            'value' => '$data->getRealStatus()',
            'filter' => $model->realStatusAttrs,
        ),
        /*邮箱认证状态*/
//         array(
//             'name' => 'email_status',
//             'value' => '$data->getEmailStatus()',
//             'filter' => $model->emailStatusAttrs,
//         ),		
        array(
            'name' => 'invest_num',
            'value' => '$data->invest_num',
            'headerHtmlOptions' => array('style' => 'width:60px;'),
        ),
//        array(
//            'name' => 'channel_key',
//            'type' => 'raw',
//            'value' => '$data->channel_key?$data->channel_key.CHtml::link(CHtml::encode("[查看]"), array("/userChannel/keywordView", "channel_key" => $data->channel_key), array("target" => "_blank")):"-"',
//            'headerHtmlOptions' => array('style' => 'width:150px;'),
//            'htmlOptions' => array('style' => 'text-align:center;'),
//        ),
        //'reg_time',
//        array(
//            'name' => 'num',
//            'value' => 'Yii::app()->cache->get($data->id)?Yii::app()->cache->get($data->id):"0"',
//            'headerHtmlOptions' => array('style' => 'width:60px;'),
//        ),
//        array(
//            'name'=>'reg_time',
//            'headerHtmlOptions' => array('style' => 'width:150px;'),
//        ),
        /*
        'reg_time',
        'last_login_ip',
        'last_login_time',
        'is_verified',
        'auth_type',
        'reg_ip',
        */
        array(
            'class'=>'CButtonColumn',
            'header'=>'操作',
            'template' => '{view}',
            'buttons' => array(
                'view' => array(
                    'label'=>'点击查看审核信息',
                    //'url'=>'Yii::app()->controller->createUrl("view",array("id"=>$data->primaryKey))',
                    'url'=>'"javascript:view($data->id);"',
                    'options'=>array('style'=>'cursor:pointer;', 'target' => '_blank', 'class' => 'verify_view','data-id'=>""),
                ),
//                'update' => array(
//                    'label'=>'编辑',
//                    //'url'=>'Yii::app()->controller->createUrl("update",array("id"=>$data->primaryKey))',
//                    'url'=>'"javascript:edit($data->id);"',
//                    'options'=>array('style'=>'cursor:pointer;', 'target' => '_blank', 'class' => 'verify_view','data-id'=>"$data->id"),
//                ),
            ),
        ),
    ),
    'pager'=>array(
        'class'=>'application.extensions.widgets.CCLinkPager',
        'header' => '',
        'maxButtonCount' => '5',
        'prevPageLabel' => '上一页',
        'nextPageLabel' => '下一页',
        'firstPageLabel' => '首页',
        'lastPageLabel' => '尾页',
        'htmlOptions' => array('class' => 'pagination'),
        //'footer' => '<div>跳到<input id="jump-page-in" name="User_page" type="text">页<input id="jump-page-btn" type="button" class="btn blue" value="跳转" ></div>',
    ),
    //'summaryText' => Yii::t('zii','Displaying {start}-{end} of 1 result.|Displaying {start}-{end} of {count} results.').'<div style="text-align:right;" class="W-jump-page" >跳到<input class="jump-page-in" name="User_page" type="text">页<input type="button" class="jump-page-btn btn blue" value="跳转" ></div>',
    'template' => '{items}{summary}{pager}',
));

Yii::app()->clientScript->registerScript('jumppage', "
$('.jump-page-btn').bind('click', function(){
	var page = $(this).parent().find(\".jump-page-in\").val();
	$(\".jump-page-in\").val(page);
	$('#user-grid').yiiGridView('update', {
		data: $(this).find('input[type=\"text\"], select').serialize() + '&User_page=' + page
	});
	return false;
});
");
?>
<div style="text-align:right;" class="W-jump-page" >跳到<input class="jump-page-in" name="User_page" type="text">页<input type="button" class="jump-page-btn btn blue" value="跳转" ></div>
<div id="verify-view-html" style="display:none;" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">用户审核信息</h4>
            </div>
            <div class="modal-body">
                <div class="table-scrollable">
                    <table class="table table-striped table-hover table-bordered dataTable" id="sample_editable_1" aria-describedby="sample_editable_1_info">
                        <thead>
                            <tr role="row">
                                <th>用户ID</th>
                                <th>类型</th>
                                <th>审核状态</th>
                                <th>审核时间</th>
                            </tr>
                        </thead>
                        <tbody role="alert" aria-live="polite" aria-relevant="all" class="lists"></tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default red" data-dismiss="modal">关闭</button>
            </div>
        </div>
    </div>
</div>

<div id="verify-edit-html" style="display:none;" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close close_dialog" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">用户审核信息</h4>
            </div>
            <div class="modal-body">
                <form method="post" class="verify_edit">
                    <input type="text" name="submit" value="" />
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default close_dialog" data-dismiss="modal">关闭</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

    function update(user_id,type){
        //ajax修改审核状态
        $.ajax({
            type:'POST',
            url:'/UserVerifyLog/setVerifyInfo',
            data:{user_id:user_id,type:type},
            dataType:'json',
            success:function(data){
                if(data.status == 1){
                    dom = '.verify_' + type;
                    $(dom + ' verify_action').remove();
                    $(dom).html('<span class="label label-success">已通过</span>');
                }
                if(data.status == 0){
                    BootstrapDialog.alert({title: '提示信息', message: "请求失败！", buttonLabel:'确定'});
                }
            }
        });
    }

    function view(id){
        var user_id = 'user_id' + id;
        $("<div></div>").attr("id","verify-view-html" + user_id)
            .addClass('modal fade')
            .html($("#verify-view-html").html())
            .appendTo("body");

        //ajax请求审核记录数据
        $.ajax({
            type:'POST',
            url:'/UserVerifyLog/VerifyInfo',
            data:{user_id:id},
            dataType:'json',
            success:function(data){
                if(data.status == 1){
                    var list = '';
                    $.each(data.data,function(k,v){
                        if(v.status == 1){
                            v.status = '<span class="label label-success">已通过</span>';
                        }else{
                            v.status = '<button type="button" class="btn blue verify_action" onclick="javascript:update(' + this.user_id + ',' + this.type +')">点击审核通过</button>';
                        }
                        list += "<tr><td>" + v.user_id + "</td>" +
                            "<td>" + v.type_name + "</td>" +
                            "<td class='verify_" + v.type +"'>" + v.status + "</td>"+
                            "<td>" + v.verify_time + "</td></tr>";
                    });
                    $('.lists').html(list);
                }
                if(data.status == 0){
                    $('.modal-body').html('<div class="alert alert-danger" role="alert"><strong>此用户暂时还无审核数据!</strong></div>');
                }
            }
        });
        //显示弹出层
        $("#verify-view-html" + user_id).modal('show');
        //点击关闭按钮，删除追加到body的结构
        $(".close_dialog").click(function(){
            $("#verify-view-html" + user_id).remove();
            $(".modal-backdrop").remove();
        });
    }
</script>