<?php
/* @var $this PledgeProjectController */
/* @var $model PledgeProject */

$this->breadcrumbs=array(
	'Pledge Projects'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'投资记录', 'url'=>array('/pledge/investment/admin')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#pledge-project-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="tabbable tabbable-custom tabbable-full-width" >
	<ul class="nav nav-tabs">
		<li class="<?php if(Yii::app()->request->getParam('status') == 'all' || !isset($_GET['status']) ){ echo ' active'; } ?>"><a href="<?php echo Yii::app()->controller->createUrl("admin"); ?>" >全部</a></li>
		<li class="<?php if(Yii::app()->request->getParam('status') == '0'){ echo ' active'; } ?>"><a href="<?php echo Yii::app()->controller->createUrl("admin", array("status"=>0)); ?>" >待审核</a></li>
		<li class="<?php if(Yii::app()->request->getParam('status') == '1'){ echo ' active'; } ?>"><a href="<?php echo Yii::app()->controller->createUrl("admin", array("status"=>1)); ?>" >发布中</a></li>
		<li class="<?php if(Yii::app()->request->getParam('status') == '2'){ echo ' active'; } ?>"><a href="<?php echo Yii::app()->controller->createUrl("admin", array("status"=>2)); ?>" >还款中</a></li>
		<li class="<?php if(Yii::app()->request->getParam('status') == '3'){ echo ' active'; } ?>"><a href="<?php echo Yii::app()->controller->createUrl("admin", array("status"=>3)); ?>" >逾期</a></li>
		<li class="<?php if(Yii::app()->request->getParam('status') == '4'){ echo ' active'; } ?>"><a href="<?php echo Yii::app()->controller->createUrl("admin", array("status"=>4)); ?>" >完成</a></li>
	</ul>
	<div class="tab-content" >
		<div class="tab-pane fade in active" id="info">
            <?php echo CHtml::link('高级搜索','#',array('class'=>'search-button')); ?>
            <div class="search-form" style="display:none">
            <?php $this->renderPartial('_search',array(
            	'model'=>$model,
            )); ?>
            </div><!-- search-form -->
            <?php $this->widget('zii.widgets.grid.CGridView', array(
            	'id'=>'pledge-project-grid',
            	'dataProvider'=>$model->search(),
            	'filter'=>$model,
                'rowCssClassExpression'=>'"data_".$data->id." ".($row%2>0?"odd":"even")',
            	'columns'=>array(
            		array(
                        'name' => 'id',
                        'value' => '$data->id',
                        'headerHtmlOptions' => array('style' => 'width:80px;'),
                    ),
                    array(
                        'name' => 'number',
                        'value' => '$data->number',
                        'headerHtmlOptions' => array('style' => 'width:120px;'),
                    ),
            		array(
                        'name' => 'username',
                        'value' => '$data->user->user_name',
                        'headerHtmlOptions' => array('style' => 'width:120px;'),
                    ),
            		'status',
            		'loan_status',
            		'repayment_status',
            		'apply_amount',
                    'applytime',
            		'confirm_time',
            		'verifytime',
            		/*
            		'apr',
            		'repayment_time',
            		'transaction_amount',
            		'collection_days',
            		
            		'verify_remark',
            		*/
            		array(
            			'class'=>'CButtonColumn',
            			'header'=>'操作', 
            			'template' => '{view}&nbsp;&nbsp;{verify}',
            			'buttons' => array(   
            					'view' => array(
            							'label'=>'查看',
            							'url'=>'Yii::app()->controller->createUrl("view",array("id"=>$data->id))',  
            							'options'=>array('style'=>'cursor:pointer;', 'target' => '_blank', 'class' => 'btn btn-primary btn-xs'),
            		                    'imageUrl' => false 
            					),
            					'verify' => array(
            							'label'=>'审核',
            							'url'=>'"javascript:void(0);"',  
            							'options'=>array(
            								'class' => 'btn btn-primary btn-xs verify-btn',
            					        ),
            					),
            			),
            			'headerHtmlOptions' => array('style' => 'width:120px;'),
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
		</div>
	</div>
</div>
<script type="text/javascript" >
$(function() {
	$('.verify-btn').click(function(){
		var myself = $(this);
		var itemid = myself.attr('data-item');
		var imgurl = myself.attr('data-imgurl');
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
</script>