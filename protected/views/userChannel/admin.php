<?php
/* @var $this UserChannelController */
/* @var $model UserChannel */

$this->breadcrumbs=array(
	'关键词管理'=>array('admin'),
	'关键词列表',
);

$this->menu=array(
	array('label'=>'添加关键词', 'url'=>array('create')),
	array('label'=>'渠道列表','url'=>array('/userChannelType/admin')),
	array('label'=>'添加渠道','url'=>array('userChannelType/create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#user-channel-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>


<div class="search-form">
<a href='/userChannel/excelOutport'>导出数据</a><a href="javascript:void(0)"  class="search-form create-btn" style="float:right;">导入数据</a>
</div>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-channel-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
            'name' => 'id',
            'value' => '$data->id',
    	    'headerHtmlOptions' => array('style' => 'width:80px;'),
        ),
		array(
            'name' => 'type_id',
            'value' => '$data->type_id',
    	    'headerHtmlOptions' => array('style' => 'width:80px;'),
        ),
		array(
            'name' => 'plan',
			'type' => 'raw',
			'value' => '$data->plan',
        ),
		'group',
		'title',
		//'keyword',
		'add_time',
		//'status',
        array(
            'name' => 'status',
            'value' => '$data->getStatus()',
			'filter' => $model->statusAttrs,
    	    'headerHtmlOptions' => array('style' => 'width:80px;'),
            'htmlOptions' => array('style' => 'text-align:center;'),
        ),
			array(
					'class'=>'CButtonColumn',
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
<!-- 创建外呼记录 -->
<!--<div id="create-dialog-html" style="display:none;" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">导入渠道数据</h4>
      </div>
      <div class="modal-body">
      	<div class="show-conver" >
      	
      	
<div class="form form-horizontal">
	<div class="form-group">
		<div class="col-sm-5">
			<form action="/userChannel/excelUpload" method="post" enctype="multipart/form-data">
    			<input type="hidden" name="leadExcel" value="true">
      			 <input type="file" name="inputExcel"><br/>
      			 <input id="submit" type="submit" class="btn blue dropdown-toggle" value="导入">
			</form>
		</div>
	</div>
</div> 	


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
      </div>
    </div>
  </div>
  </div>
</div>
<script type="text/javascript">
$(function(){
	$('.create-btn').click(function(){
		var myself = $(this);
		var itemid = myself.attr('name');
		var modalId = 'item-' + itemid;

		if($("#" + modalId).length <= 0) {
			$("<div></div>").attr("id", modalId)
					.addClass('modal fade')
					.html($('#create-dialog-html').html())
					.appendTo("body");
		}
		$("#" + modalId).modal('show');
	});
});

</script>-->
<div id="cover-dialog-html" style="display:none;" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">导入数据</h4>
      </div>
      <div class="modal-body">
      	<div class="show-conver" ></div>
      	<div style="padding: 10px 0; " >
      		<span class="btn green fileinput-button">
			<i class="fa fa-plus"></i>
			<span>导入数据</span>
			<input type="file" name="inputExcel" class="btn-fileinput" >
			</span>
      	</div>
      	<div class="progress" >
            <div class="progress-bar progress-bar-success"></div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="/plugins/jquery-file-upload/js/vendor/jquery.ui.widget.js"></script>
<script type="text/javascript" src="/plugins/jquery-file-upload/js/jquery.iframe-transport.js"></script>
<script type="text/javascript" src="/plugins/jquery-file-upload/js/jquery.fileupload.js"></script>
<script type="text/javascript" >
var uploadItemImgUrl = '<?php echo Yii::app()->createUrl('userChannel/excelUpload'); ?>';
$(function() {
	$('.create-btn').click(function(){
		var myself = $(this);
		var itemid = myself.attr('data-item');
		var uploadUrl = uploadItemImgUrl;
		var modalId = 'item-cover-' + itemid;

		if($("#" + modalId).length <= 0) {
			$("<div></div>").attr("id", modalId)
					.addClass('modal fade')
					.html($('#cover-dialog-html').html())
					.appendTo("body");
		}
		
		
		$('.btn-fileinput').fileupload({
	        url: uploadUrl,
	        dataType: 'json',
	        maxFileSize: 2000000, // 2 MB
	        done: function (e,data){
		       if(data.result.code == '0'){
		    	   BootstrapDialog.alert(data.result.message);
		        } else {
		        	BootstrapDialog.alert(data.result.message);
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
	});
});
</script>
