<!-- 审核信息列表HTML 开始-->
<div class="form-horizontal" >
    <div class="portlet box blue" >
        <div class="portlet-title">
            <div class="caption">项目资料审核</div>
            <div class="tools">
                <a href="javascript:;" class="collapse"></a>
            </div>
        </div>
        <div class="portlet-body">
            <?php if(!empty($data)) :?>
            <div class="table-scrollable">
                <table class="table table-striped table-hover table-bordered dataTable" id="sample_editable_1" aria-describedby="sample_editable_1_info">
                    <thead>
                    <tr role="row">
                        <th>项目ID</th>
                        <th>类型</th>
                        <th>审核状态</th>
                        <th>审核时间</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody role="alert" aria-live="polite" aria-relevant="all" class="lists">
                        <?php foreach($data as $k=>$v):?>
                            <tr>
                                <td><?php echo $v['pid'] ?>
                                <td><?php echo $v['type_name']?></td>
                                <td class="verify_<?php echo $v['type'] ?>">
                                    <?php if(!$v['status']):?>
                                    <button type="button" class="btn blue verify_action" onclick="javascript:update(<?php echo $v['pid']; ?>,'<?php echo $v['type'] ?>')">点击审核通过</button>
                                    <?php else: ?>
                                        <span class="label label-success">已通过</span>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo $v['verify_time']?></td>
                                <td><button type="button" class="btn blue attachments_list" data-item="<?php echo $_GET['id']?>" data-imgurl verify-type="<?php echo $v['type'] ?>">查看</button>&nbsp;&nbsp;<button type="button" class="btn blue attachments" data-item="<?php echo $_GET['id']?>" data-imgurl verify-type="<?php echo $v['type']?>">点击上传文件</button></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <?php else: ?>
                <div class="alert alert-danger" role="alert"><strong>没有请求到项目的审核信息!</strong></div>
            <?php endif;?>
        </div>
    </div>
</div>
<!-- 审核列表HTML结束 -->

<!-- 点击图片上传 HTML 开始-->
<div id="cover-dialog-html" style="display:none;" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close close_dialog" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">资料图片</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form">
                <div class="show-conver" ></div>
                <div style="padding: 10px 0; " >
                    <span class="btn blue fileinput-button">
                    <i class="fa fa-plus"></i>
                    <span>新增资料图片</span>
                    <input type="file" name="imgFile" class="btn-fileinput">
                    </span>
                </div>
                <div class="progress" >
                        <div class="progress-bar progress-bar-success"></div>
                </div>
                    <div class="form-group">
                        <label for="file_name" class="col-sm-4 control-label">自定义名称</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="file_name" name="name" placeholder="请输入自定义的文件名称" value="" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sort" class="col-sm-4 control-label">文件排序</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="sort" name="display_order"  placeholder="请输入数字进行排序" value="" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-10">
                            <button type="button" class="btn blue sub_attach_info">提交</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn red close_dialog" data-dismiss="modal">关闭</button>
            </div>
        </div>
    </div>
</div>
<!-- 点击图片上传HTML 结束-->

<!-- 图片重新上传 HTML 开始-->
<div id="re_upload_img" style="display:none;" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close close_dialog" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">修改审核图片</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form">
                <div class="show-conver" ></div>
                <div style="padding: 10px 0; " >
                    <span class="btn blue fileinput-button">
                    <i class="fa fa-plus"></i>
                    <span>重新添加图片</span>
                    <input type="file" name="imgFile" class="btn-fileinput">
                    </span>
                </div>
                <div class="progress" >
                    <div class="progress-bar progress-bar-success"></div>
                </div>
                    <div class="form-group">
                        <label for="file_name" class="col-sm-4 control-label">自定义名称</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="file_name" name="name" placeholder="请输入自定义的文件名称" value="" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sort" class="col-sm-4 control-label">文件排序</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="sort" name="display_order"  placeholder="请输入数字进行排序" value="" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-10">
                            <button type="button" class="btn blue edit_upload">提交</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn red close_dialog" data-dismiss="modal">关闭</button>
            </div>
        </div>
    </div>
</div>
<!-- 图片重新上传 HTMl 结束 -->

<!-- 查看图片列表 HTML 开始-->
<div id="img_list" style="display:none;" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close close_dialog" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">资料图片信息</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form">
                    <table class="table" id="img_table">
                        <thead>
                        <tr class="active">
                            <th class="col-sm-1">ID</th>
                            <th class="col-sm-5">名称</th>
                            <th class="col-sm-1">排序</th>
                            <th class="col-sm-3">操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn red close_dialog" data-dismiss="modal">关闭</button>
            </div>
        </div>
    </div>
</div>
<!-- 查看图片列表HTML 结束 -->

<!-- 图片预览HTML开始-->
<div id="img-dialog-html" style="display:none;" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close close_dialog" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">图片预览</h4>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn red close_dialog" data-dismiss="modal">关闭</button>
            </div>
        </div>
    </div>
</div>
<!-- 图片预览HTML结束-->

<?php $pid = $_GET['id']; ?>
<script type="text/javascript" src="/plugins/jquery-file-upload/js/jquery.fileupload.js"></script>
<script type="text/javascript" src="/plugins/fancybox/source/jquery.fancybox.js"></script>
<link type="text/css" rel="stylesheet" href="/plugins/fancybox/source/jquery.fancybox.css" />
<script type="text/javascript">
    /**
     * 删除追加到body的弹出层HTML结构
     * @param dom_id id节点
     */
    function close_dialog(dom_id){
        //点击关闭按钮，删除追加到body的结构
        $(".close_dialog").click(function(){
            $("#" + dom_id).remove();
            $(".modal-backdrop").remove();
        });
    }

    /**
     * 文件删除
     * @param img_id 文件ID
     * @param modalId 窗口HTML DOM 节点
     */
    function deleteImg(img_id,modalId){
        if(img_id != ""){
            BootstrapDialog.confirm('确定要执行删除么？',function(result){
                if(result === true){
                    $.ajax({
                        type:'POST',
                        url:'/Project/DelAttach',
                        data:{id:img_id},
                        dataType:'json',
                        success:function(re){
                            if(re.status == 1){
                                //删除父级弹窗，因为父级窗口是通过点击事件js加载，没法实时显示数据
                                //$("#" + modalId).remove();
                                $(".modal-backdrop").remove();
                                $("#" + modalId + " #list_tr_img_" + img_id).remove();
                                BootstrapDialog.alert('删除成功', function(){}, '提示信息');
                            }
                            if(re.status == 0){
                                BootstrapDialog.alert('删除失败', function(){}, '提示信息');
                            }
                        }
                    });
                }
            });
        }
    }

    /**
     * 文件上传
     */
    var uploadItemImgUrl = '<?php echo Yii::app()->createUrl('Project/SetAttachments'); ?>';
    $('.attachments').click(function(){
        var myself = $(this);
        //获取项目ID以及审核资料类型
        var itemid = myself.attr('data-item');
        var verify_type = myself.attr('verify-type');

        //构造请求接口参数
        var uploadUrl = uploadItemImgUrl + '?pid=' +itemid + '&verify_type=' +　verify_type;

        //加载隐藏的HTML，追加到body标签里
        var modalId = 'item-attach-' + itemid;
        if($("#" + modalId).length <= 0) {
            $("<div></div>").attr("id", modalId)
                .addClass('modal fade')
                .html($('#cover-dialog-html').html())
                .appendTo("body");
        }

        //点击新增资料图片，进行上传
        $('.btn-fileinput').fileupload({
            url: uploadUrl,
            dataType: 'json',
            maxFileSize: 2000000, // 2 MB
            done: function (e, data) {
                if(data.result.error == '0') {
                    //上传成功，则显示预览图
                    $("#" + modalId + ' .show-conver').html($("<img/>").attr("src", data.result.url));
                    $("#" + modalId + ' .show-conver img').css('width','500px','height','600px');
                    //myself.attr('data-imgurl', data.result.url);
                    //获取记录ID
                    var last_id = '';
                    last_id = data.result.data;
                    //点击提交按钮，提交需要更新的图片信息
                    $(".sub_attach_info").click(function(){
                        var name = '';
                        var sort = '';
                        name = $("#" + modalId + " #file_name").val();
                        sort = $("#" + modalId + " #sort").val();
                        if(name != '' && sort !='' && last_id != ''){
                            $.ajax({
                                type:'POST',
                                url:'/Project/SetAttach',
                                data:{id:last_id,name:name,sort:sort},
                                dataType:'json',
                                success:function(re){
                                    if(re.status == 1){
                                        last_id = '';
                                        BootstrapDialog.alert('设置成功', function(){}, '提示信息');
                                        //弹出提示成功信息后，重置表单
                                        $(':input',"#" + modalId + ' form')
                                            .not(':button, :submit, :reset, :hidden')
                                            .val('')
                                            .removeAttr('checked')
                                            .removeAttr('selected');
                                        //重置上传进度条的显示
                                        $("#" + modalId + ' .progress .progress-bar').css('width','0%');
                                    }
                                    if(re.status == 0){
                                        last_id = '';
                                        BootstrapDialog.alert(re.msg, function(){}, '提示信息');
                                    }
                                }
                            })
                        }
                    });
                } else {
                    BootstrapDialog.alert(data.result.message, function(){}, '提示信息');
                }
            },
            //显示上传进度
            progressall: function (e, data) {
                var progress = parseInt(data.loaded / data.total * 100, 10);
                $("#" + modalId + ' .progress .progress-bar').css(
                    'width',
                    progress + '%'
                );
            }
        }).on('fileuploadadd', function (e, data) {// 选择了图片时执行
            $("#" + modalId + ' .progress .progress-bar').css('width', '0%' );
        }).prop('disabled', !$.support.fileInput)
            .parent().addClass($.support.fileInput ? undefined : 'disabled');

        //显示弹出层
        $("#" + modalId).modal('show');

        //点击关闭按钮，删除追加到body的结构
        close_dialog(modalId);
    });


    /**
     * 查看项目的资料文件信息
     */
    $('.attachments_list').click(function(){
        //获取查看审核资料的类型以及项目ID
        var pid = <?php echo $_GET['id'] ?>;
        var type = $(this).attr('verify-type');

        //加载弹出层HTML结构，追加到body 标签
        var modalId = 'img_list_' + pid;
        $("<div></div>").attr("id", modalId)
            .addClass('modal fade')
            .html($('#img_list').html())
            .appendTo("body");
        //请求数据
        $.ajax({
            type:'POST',
            url:'/Project/GetAttachments',
            data:{pid:pid,type:type},
            dataType:'json',
            success:function(data){
                if(data.status == 1){
                    var list = '';
                    $.each(data.data,function(k,v){
                        var img_url = '';
                        img_url = "'" + v.url + "'";
                        var id = "'" + v.id + "'";
                        list += '<tr id="list_tr_img_'+ v.id +'">'+
                        '<td>' + v.id + '</td>' +
                        '<td>' + v.name + '</td>">'+
                        '<td>' + v.display_order +'</td>' +
                        '<td><button type="button" class="btn btn-primary btn-xs" onclick="javascript:viewImg(' + v.id + ')" >预览</button>&nbsp;&nbsp;<button type="button" class="btn blue edit_attach btn-xs" data-item="<?php echo $_GET['id']?>" onclick="javascript:edit_attach('+ v.id + ')">修改</button>&nbsp;&nbsp;<button type="button" class="btn btn-primary btn-xs" onclick="javascript:deleteImg(\''+v.id+'\',\''+modalId+'\')" >删除</button></td>' +
                        '</tr>'
                        });
                        $('#' + modalId + ' #img_table tbody').html(list);
                }
                if(data.status == 0){
                    $('#' + modalId + ' #img_table tbody').html('<tr><td colspan="4"><div class="alert alert-danger" role="alert"><strong>没有获取到数据信息!</strong></div></td></tr>');
                }
            }
        });

        //设置表格隔行换色
        $("#" +　modalId　+ "#img_table tbody tr:odd").addClass("danger");
        $("#" + modalId + "#img_table tbody tr:even").addClass("warning");
        $("#" + modalId +"#img_table tbody tr").hover(function(){
            $(this).addClass("success");
        },function(){
            $(this).removeClass("success");
        });

        //显示弹出层
        $("#" + modalId).modal('show');

        //点击关闭按钮，删除追加到body的结构
        close_dialog(modalId);
    });


    /**
     * 重新上传
     */
    function edit_attach(id){
        //设置上传接口地址和参数
        var uploadUrl = uploadItemImgUrl + '?id=' + id + '&ajax=edit';
        var modalId = 're-upload-' + id;
        //上传弹出层 追加到 body里
        if($("#" + modalId).length <= 0) {
            $("<div></div>").attr("id", modalId)
                .addClass('modal fade')
                .html($('#re_upload_img').html())
                .appendTo("body");
        }

        //显示之前的资料图片信息
        $.ajax({
            type:'POST',
            url:'/Project/getAttachImg',
            data:{id:id},
            dataType:'json',
            success:function(re){
                if(re.status == 1){
                    //设置表单input 编辑数据
                    $("#" + modalId + " #file_name").attr('value',re.data.name);
                    $("#" + modalId + " #sort").attr('value',re.data.display_order);
                    //显示之前上传的图片
                    $("#" + modalId + ' .show-conver').html($("<img/>").attr("src", re.data.url));
                    $("#" + modalId + ' .show-conver img').css('width','540px','height','600px');
                }
            }
        });

        //上传图片操作
        $('.btn-fileinput').fileupload({
            url: uploadUrl,
            dataType: 'json',
            maxFileSize: 2000000, // 2 MB
            done: function (e, data) {
                if(data.result.error == '0') {
                    //上传成功 替换显示图片
                    $("#" + modalId + ' .show-conver img').attr("src", data.result.url);
                    $("#" + modalId + ' .show-conver img').css('width','540px','height','600px');
                } else {
                    BootstrapDialog.alert(data.result.message, function(){}, '提示信息');
                }
            },
            progressall: function (e, data) {
                var progress = parseInt(data.loaded / data.total * 100, 10);
                $("#" + modalId + ' .progress .progress-bar').css(
                    'width',
                    progress + '%'
                );
            }
        }).on('fileuploadadd', function (e, data) {// 选择了图片时执行
            $("#" + modalId + ' .progress .progress-bar').css('width', '0%' );
        }).prop('disabled', !$.support.fileInput)
            .parent().addClass($.support.fileInput ? undefined : 'disabled');

        $("#" + modalId).modal('show');

        //如果有更新图片资料，则进行设置
        $(".edit_upload").click(function(){
            var name = $("#" + modalId + " #file_name").val();
            var sort = $("#" + modalId + " #sort").val();
            $.ajax({
                type:'POST',
                url:'/Project/SetAttach',
                data:{id:id,name:name,sort:sort},
                dataType:'json',
                success:function(re){
                    if(re.status == 1){
                        BootstrapDialog.alert('设置成功', function(){}, '提示信息');
                        //重置上传进度条的显示
                        $("#" + modalId + ' .progress .progress-bar').css('width','0%');
                    }
                    if(re.status == 0){
                        BootstrapDialog.alert(re.msg, function(){}, '提示信息');
                    }
                }
            })
        });
        //点击关闭按钮，删除追加到body的结构
        close_dialog(modalId);
    }


    /**
     * 预览图片
     * @param id
     */
    function viewImg(id){
        //获取图片信息
        var img = '';
        var modalId = "img-dialog-html" + id;
        $("<div></div>").attr("id",modalId)
            .addClass('modal fade')
            .html($('#img-dialog-html').html())
            .appendTo("body");

        $.ajax({
            type:'POST',
            url:'/Project/GetAttachImg',
            data:{id:id},
            dataType:'json',
            success:function(re){
                if(re.status == 1){
                    img = '<img src=' + re.data.url + ' border=0 style="width:540px" />';
                    $("#" + modalId + " .modal-body").html(img);
                }
            }
        });
        $("#" + modalId).modal('show');

        //点击关闭按钮，删除追加到body的结构
        close_dialog(modalId);
    }

    /**
     * 修改审核状态
     * @param pid
     * @param type
     */
    function update(pid,type){
        //ajax修改审核状态
        $.ajax({
            type:'POST',
            url:'/Project/setVerifyInfo',
            data:{pid:pid,type:type},
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
</script>