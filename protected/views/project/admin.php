<?php 

$this->pageTitle = '项目列表';

$this->breadcrumbs=array(
	'项目管理'=>array('admin'),
	'项目列表',
);

$this->menu=array(
	array('label'=>'项目首页', 'url'=>array('index')),
	array('label'=>'创建新项目', 'url'=>array('create')),
);

?>

<?php /*$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
	'dataProvider'=>$model->search(),
	
	'filter'=>$model,
	'columns'=>array(
		array(
            'name' => 'id',
            'value' => '$data->id',
    	    'headerHtmlOptions' => array('style' => 'width:60px;'),
        ),
			
		array(
			'name' => 'item_title',
			'value' => '$data->item_title',
			'headerHtmlOptions' => array('style' => 'width:60px;'),
		),
		array(
			'name'=>'guarantee_type',	
			'value'=>'$data->guarantee_type',
			'headerHtmlOptions' => array('style' => 'width:60px;'),
		),
		array(
			'name'=>'scale',
			'value'=>'$data->scale',
			//'type' => 'raw',
			//'value' => 'CHtml::link(CHtml::encode($data->scale."%"))',
			'headerHtmlOptions' => array('style' => 'width:60px;'),
		),
			
		array(
			'name' => 'company_id',
			//'value' => '$data->company->name',
			'type' => 'raw',
			'value' => 'CHtml::link(CHtml::encode($data->company->name), array("company/view","id"=>$data->company_id), array("target" => "_blank"))',
			'headerHtmlOptions' => array('style' => 'width:60px;'),
		),
		
		array(
			'name' => 'financing_amount',
			'value' => '$data->financing_amount',
			'headerHtmlOptions' => array('style' => 'width:60px;'),
		),
		array(
			'name' => 'over_amount',
			'value' => '$data->over_amount',
			'headerHtmlOptions' => array('style' => 'width:60px;'),
		),
		array(
			'name' => 'invest_status',
			'value' => '$data->getInvestStatuses()',
			'filter' => $model->investStatusArrs,
			'headerHtmlOptions' => array('style' => 'width:60px;'),
		),
		
		array(
			'name'=>'addtime',
			'value'=>'$data->addtime',
			'headerHtmlOptions' => array('style' => 'width:60px;'),		
		),

	array(
		'class'=>'CButtonColumn',
		'header'=>'操作',
		'template' => '{view}{update}',
		'buttons' => array(
				'view' => array(
						'label'=>'查看',
						'url'=>'Yii::app()->controller->createUrl("view",array("id"=>$data->primaryKey))',
						'options'=>array('style'=>'cursor:pointer;', 'target' => '_blank', 'class' => ''),
				),
				'update' => array(
						'label'=>'编辑',
						'url'=>'Yii::app()->controller->createUrl("update",array("id"=>$data->primaryKey))',
						'options'=>array('style'=>'cursor:pointer;', 'target' => '_blank', 'class' => ''),
				),
				'records' => array(
						'label'=>'投资记录',
						'url'=>'Yii::app()->controller->createUrl("/invest/records",array("id"=>$data->primaryKey))',
						'options'=>array('style'=>'cursor:pointer;', 'target' => '_blank', 'class' => ''),
				),	
		),
),

)));*/
?>
<div class="table-toolbar">
	<div class="btn-group">
		<button id="sample_editable_1_new" class="btn green search-button" data-target="#search-dialog" >高级搜索</button>
	</div>
</div>
<div class="dataTables_wrapper form-inline">
	<table class="table table-striped table-hover table-bordered dataTable" id="sample_editable_1" aria-describedby="sample_editable_1_info">
	<thead>
		<tr role="row">
			<th>id</th>
			<th><?php echo $model->getAttributeLabel('item_title'); ?></th>
			<th><?php echo $model->getAttributeLabel('company_id'); ?></th>
			<th><?php echo $model->getAttributeLabel('financing_amount'); ?></th>
			<th><?php echo $model->getAttributeLabel('over_amount'); ?></th>
			<th><?php echo $model->getAttributeLabel('scale'); ?></th>
			<th><?php echo $model->getAttributeLabel('invest_status'); ?></th>
			<th><?php echo $model->getAttributeLabel('addtime'); ?></th>
			<th>操作</th>
		</tr>
	</thead>
	<tbody role="alert" aria-live="polite" aria-relevant="all">
	<?php foreach($projectArrs as $row): ?>
		<tr class="odd" >
			<td><?php echo $row['id'];?></td>
			<td><?php echo $row['item_title'];?></td>
			<td><a href="/company/view?id=<?php echo $row['company_id'] ?>" target="_blank"><?php echo $companyRecords[$row['company_id']]->name;?></td>
			<td><?php echo $row['financing_amount'].'元'?></td>
			<td><?php echo $row['over_amount'].'元'?></td>
			<td><?php echo $row['scale'].'%'?></td>
			<td><?php echo $model->getInvestStatus($row['invest_status'])?></td>
			<td><?php echo $row['addtime']?></td>
			<td>
                <?php if($row['category']=='chedai') : ?>
			        <a class="btn btn-primary" target="_blank" href="<?php echo $this->createUrl('chedaiUpdate',array('id'=>$row['id']));?>">编辑</a>
			    <?php elseif($row['category']=='fangdai') : ?>
			        <a class="btn btn-primary" target="_blank" href="<?php echo $this->createUrl('updateFangdai',array('id'=>$row['id']));?>">编辑</a>
			    <?php else : ?>
			        <a class="btn btn-primary" target="_blank" href="<?php echo $this->createUrl('update',array('id'=>$row['id']));?>">编辑</a>
			    <?php endif; ?>
			    <a class="btn btn-primary" target="_blank"   target="_blank" href="<?php echo $this->createUrl('view', array('id' => $row['id']));?>">查看</a>
			    <?php if($row['isrecommend']=='1'): ?>
				   <button class='btn btn-primary isrecommend' value="<?php echo $row['isrecommend']?>" name="<?php echo $row['id']?>">不推荐</button>
				<?php else : ?>
                   <button class='btn btn-primary isrecommend'  value="<?php echo $row['isrecommend']?>" name="<?php echo $row['id']?>">推荐</button>
				<?php endif; ?>
			    <div class="btn-group">
                    <button class="btn default dropdown-toggle" type="button" data-toggle="dropdown">更多 <i class="fa fa-angle-down"></i></button>
                    <div class="dropdown-backdrop"></div>
                    <ul class="dropdown-menu pull-right" role="menu">
                        <li><a class="cover-btn" href="javascript:viod(0);" data-item="<?php echo $row['id']?>" data-imgurl="<?php echo $row['item_pic']?>">封面</a></li>
                        <li><a class="" href="<?php echo $this->createUrl('/invest/records', array('item_id' => $row['id']))?>" target="_blank">投资记录</a></li>
                    </ul>
                </div>
				<ul class="list-unstyled" style="display:none;" >
					<li>
				    <?php if($row['category']=='chedai') : ?>
				        <a class="btn btn-primary btn-xs" target="_blank" href="<?php echo $this->createUrl('chedaiUpdate',array('id'=>$row['id']));?>">编辑</a>
				    <?php else : ?>
				        <a class="btn btn-primary btn-xs" target="_blank" href="<?php echo $this->createUrl('update',array('id'=>$row['id']));?>">编辑</a>
				    <?php endif; ?>
					</li>
					<li>
					<?php if($row['category']=='chedai') : ?>
				        <a class="btn btn-primary btn-xs" target="_blank"   target="_blank" href="<?php echo $this->createUrl('chedaiView', array('id' => $row['id']));?>">查看</a>
				    <?php else : ?>
				        <a class="btn btn-primary btn-xs" target="_blank"   target="_blank" href="<?php echo $this->createUrl('view', array('id' => $row['id']));?>">查看</a>
				    <?php endif; ?>
					</li>
					<li><a class="btn btn-primary btn-xs cover-btn" href="javascript:viod(0);" data-item="<?php echo $row['id']?>" data-imgurl="<?php echo $row['item_pic']?>">封面</a></li>
					<li>
					<?php if($row['isrecommend']=='1'): ?>
					   <button class='btn btn-primary btn-xs isrecommend' value="<?php echo $row['isrecommend']?>" name="<?php echo $row['id']?>">不推荐</button>
					<?php else : ?>
                       <button class='btn btn-primary btn-xs isrecommend'  value="<?php echo $row['isrecommend']?>" name="<?php echo $row['id']?>">推荐</button>
					<?php endif; ?>
					</li>
					<li><a class="btn btn-primary btn-xs" href="<?php echo $this->createUrl('/invest/records', array('item_id' => $row['id']))?>" target="_blank">投资记录</a></li>
				</ul>
			</td>
		</tr>
    <?php endforeach; ?>
	</tbody>
	</table>
</div>
<div class="text-center" >
<?php 
	//application.extensions.widgets.CCLinkPager
	$this->widget('application.extensions.widgets.CCLinkPager',array('pages'=>$pages, 'header' => '', 'maxButtonCount' => '15', 
						'prevPageLabel' => '上一页', 'nextPageLabel' => '下一页', 'firstPageLabel' => '首页', 
						'lastPageLabel' => '尾页', 'htmlOptions' => array('class' => 'pagination')));
?>
</div>
<div id="cover-dialog-html" style="display:none;" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">封面图片</h4>
      </div>
      <div class="modal-body">
      	<div class="show-conver" ></div>
      	<div style="padding: 10px 0; " >
      		<span class="btn green fileinput-button">
			<i class="fa fa-plus"></i>
			<span>更改封面</span>
			<input type="file" name="imgFile" class="btn-fileinput" >
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
<div id="search-dialog" class="modal fade bs-example-modal-lg" >
  <div class="modal-dialog modal-wide">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">高级搜索</h4>
      </div>
      <div class="modal-body">
        <div class="modal-body">
            <div class="search-form" >
            <?php $this->renderPartial('_search',array(
            	'model'=>$model,
            ));?>
            </div>
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
<script type="text/javascript" src="/plugins/jquery-ui/jquery-ui-datepicker_zh_cn.js"></script>
<script type="text/javascript" >
var uploadItemImgUrl = '<?php echo Yii::app()->createUrl('upload/ItemCover'); ?>';
$(function() {
	$('.search-button').click(function(){
		$("#search-dialog").modal('show');
		$('._datePicker').datepicker({
			dateFormat: 'yy-mm-dd'
		});
	});
	
	$('.open-btn').click(function(){
		var self = $(this);
		var itemid = self.attr('data-item');
		var url = '/project/open';
		var data = {id: itemid}
		$.get(url, data, function(response){
			if(response.tatus == true) {
				var dlg = new BootstrapDialog({title: '开放投资', message: function(){return response.html;}});
				dlg.open();
			} else {
				BootstrapDialog.alert({title: '提示信息', message: "请求失败！", buttonLabel:'确定'});
			}
		}, "json");
	});
	$('.cover-btn').click(function(){
		var myself = $(this);
		var itemid = myself.attr('data-item');
		var imgurl = myself.attr('data-imgurl');
		var uploadUrl = uploadItemImgUrl + '?itemid=' +itemid;
		var modalId = 'item-cover-' + itemid;

		if($("#" + modalId).length <= 0) {
			$("<div></div>").attr("id", modalId)
					.addClass('modal fade')
					.html($('#cover-dialog-html').html())
					.appendTo("body");
		}
		if(imgurl != '') {
			$("#" + modalId + ' .show-conver').html($("<img/>").attr("src", imgurl));
		}

		$('.btn-fileinput').fileupload({
	        url: uploadUrl,
	        dataType: 'json',
	        maxFileSize: 2000000, // 2 MB
	        done: function (e, data) {
		        if(data.result.error == '0') {
			        $("#" + modalId + ' .show-conver img').attr("src", data.result.url);
			        myself.attr('data-imgurl', data.result.url);
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
	});
});
/*项目推荐*/
	$('.isrecommend').click(function(){
		var self = $(this);
		var isrecommend =self.val();
		var id =self.attr('name');
		if(confirm("确认更改")){
		$.ajax({
			type:'POST',
			url:'/project/recommend',
			data:{isrecommend:isrecommend,id:id},
			dataType:'json',
			success:function(data){	  
				if(data==1){
						self.attr("value","1");
						self.html("不推荐");
					    alert("设置成功");
					}
				if(data==0){
						self.attr("value","0");
						self.html("推荐");
						alert("设置成功");
					}
				}
			})
		}
		})	
</script>