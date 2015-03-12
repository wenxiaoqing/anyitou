<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'用户管理'=>array('admin'),
	$model->user_name,
);

$this->menu=array(
	//array('label'=>'管理首页', 'url'=>array('index')),
	array('label'=>'创建用户', 'url'=>array('create')),
	array('label'=>'编辑用户信息', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'管理列表', 'url'=>array('admin')),
	array('label'=>'外呼记录', 'url'=>array('callRecord/admin')),
	array('label'=>'创建外呼记录', 'url'=>array('callRecord/create')),
);
?>

<div class="portlet box blue" >
    <div class="portlet-title">
    	<div class="caption">用户信息</div>
    	<div class="tools">
    		<a href="javascript:;" class="collapse"></a>
    	</div>
    </div>
    <div class="portlet-body">
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_name',
		'real_name',
		//'mobile',
	array(
			'name'=>'mobile',
			 'type' => 'raw',
           	 'value' =>$model->mobile."<button class=create-btn name=".$model->id.">创建外呼记录</button>",
		),
		'email',
		array(
			'name'=>'identity',
			'value'=>$model->detail->identity,	
		),
        array(
            'name' => 'base_status',
            'value' => $model->getBaseStatus(),
        ),
        array(
            'name' => 'mobile_status',
            'value' => $model->getMobileStatus(),
        ),
        array(
            'name' => 'real_status',
            'value' => $model->getRealStatus(),
        ),
        array(
            'name' => 'email_status',
            'value' => $model->getEmailStatus(),
        ),
	
		'reg_time',
        'last_login_time',
		'last_login_ip',
        'reg_ip',
		'is_verified',
		'auth_type',
		
	),
)); ?>
	</div>
</div>

<div class="portlet box blue" >
    <div class="portlet-title">
    	<div class="caption">资金账户信息</div>
    	<div class="tools">
    		<a href="javascript:;" class="collapse"></a>
    	</div>
    </div>
    <div class="portlet-body">
    <?php if($accountModel) :?>
    <?php $this->widget('zii.widgets.CDetailView', array(
    	'data'=> $accountModel,
    	'attributes'=>array(
            array(
    	        'name' => 'all_assets',
    	        'type' => 'raw',
    	        'value' => '<span>'.$accountModel->all_assets.'</span><span class="unit" >元</span>',
    	    ),
    	    array(
    	        'name' => 'use_money',
    	        'type' => 'raw',
    	        'value' => '<span>'.$accountModel->use_money.'</span><span class="unit" >元</span>',
    	    ),
    	    array(
    	        'name' => 'frozen_money',
    	        'type' => 'raw',
    	        'value' => '<span>'.$accountModel->frozen_money.'</span><span class="unit" >元</span>&nbsp;<span>'.($freezeStatusOfBonusAccount ? '<a href="javascript:void(0);">冻结中</a>' : '<a href="javascript:void(0);">正常</a>').'</span>',
    	    ),
    	    array(
    	        'name' => 'collected_interest',
    	        'type' => 'raw',
    	        'value' => '<span>'.$accountModel->collected_interest.'</span><span class="unit" >元</span>',
    	    ),
    	    array(
    	        'name' => 'all_income',
    	        'type' => 'raw',
    	        'value' => '<span>'.$accountModel->all_income.'</span><span class="unit" >元</span>',
    	    ),
    	    array(
    	        'name' => 'prize_num',
    	        'type' => 'raw',
    	        'value' => '<span>'.$accountModel->prize_num.'</span><span class="unit" >元</span>',
    	    ),
    		array(
                'name' => 'status',
                'value' => $accountModel->getStatus(),
            ),
    	),
    )); ?>
    <?php else: ?>
    <div class="alert alert-info">
		没有资金账户
	</div>
    <?php endif;?>
	</div>
</div>

<div class="portlet box blue" >
    <div class="portlet-title">
    	<div class="caption">资金托管账户信息</div>
    	<div class="tools">
    		<a href="javascript:;" class="collapse"></a>
    	</div>
    </div>
    <div class="portlet-body">
    <?php if($feaDataModel) :?>
    <?php $this->widget('zii.widgets.CDetailView', array(
    	'data'=> $feaDataModel,
    	'attributes'=>array(
    		'id',
    		'other_id',
    		'other_name',
            array(
                'name' => 'status',
                'value' => $feaDataModel->getStatus(),
            ),
    	),
    )); ?>
    <?php else: ?>
    <div class="alert alert-info">
		还没有开通资金托管账户
	</div>
	<?php endif;?>
	</div>
</div>

<div class="portlet box blue" >
    <div class="portlet-title">
    	<div class="caption">邀请信息</div>
    	<div class="tools">
    		<a href="javascript:;" class="collapse"></a>
    	</div>
    </div>
    <div class="portlet-body">
    	<div class="table-responsive">
    	<?php if($inviteModel): ?>
    	<?php $this->widget('zii.widgets.CDetailView', array(
        	'data'=>$inviteModel,
        	'attributes'=>array(
                'id',
                'recommend_id',
    	        array(
    	            'name' => 'recommend_user_name',
    	            'type' => 'raw',
    	            'value' => CHtml::link(CHtml::encode($inviteModel->recommend_user->user_name), array('/user/view', 'id' => $inviteModel->recommend_id)), //$inviteModel->recommend_user->user_name
    	        ),
                'recommend_user_name',
                array(
    	            'name' => 'prize',
    	            'type' => 'raw',
    	            'value' => '<span>'.$inviteModel->prize.'</span><span class="unit" >元</span>',
    	        ),
    	        array(
    	            'name' => 'income',
    	            'type' => 'raw',
    	            'value' => '<span>'.$inviteModel->income.'</span><span class="unit" >元</span>',
    	        ),
                'date_time',
    	        array(
                    'name' => 'recommend_type',
                    'value' => $inviteModel->getType(),
                ),
                array(
                    'name' => 'status',
                    'value' => $inviteModel->getStatus(),
                ),
                
        	),
        )); ?>
        <?php else: ?>
        <div class="alert alert-info">
    		没有信息
    	</div>
        <?php endif; ?>
    	</div>
    </div>
</div>

<!-- 查看外呼记录 -->
<div class="portlet box blue" >
    <div class="portlet-title">
    	<div class="caption">外呼记录</div>
    	<div class="tools">
    		<a href="javascript:;" class="collapse"></a>
    	</div>
    </div>
    <div class="portlet-body">
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'call-record-grid',
	'dataProvider'=>$callRecord->search(),
	'columns'=>array(
		'id',
		array(
			'name' => 'user_name',
			'type' => 'raw',
			'value' => '$data->user->user_name',
			),
		
		array(
		'name' => 'managerName',
		'type' => 'raw',
		'value' => '$data->manager_user->username',
		),
		'time',
	array(
		'name' => 'type',
		'value' => '$data->getTypeStatus()',
		'filter' =>$callRecord->typeStatusArrs,
		'headerHtmlOptions' => array('style' => 'width:100px;'),
		),
		'descript',
		
	array(
		'name' => 'satisfaction',
		'value' => '$data->getSatisfaction()',
		'filter' => $callRecord->satisfactionArrs,
		'headerHtmlOptions' => array('style' => 'width:100px;'),
		),
	array(
		'name' => 'channel_key',
		'type' => 'raw',
		'value' => '$data->user->channel_key?$data->user->channel_key:其他',
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
</div>  
    	
<!-- 创建外呼记录 -->
<div id="create-dialog-html" style="display:none;" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">创建外呼记录</h4>
      </div>
      <div class="modal-body">
      	<div class="show-conver" >
<div class="form form-horizontal">
      	<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'call-record-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="note">带<span class="required">*</span>号的为必填项.</p>
	<div class="form-group">
		<?php echo $form->labelEx($callRecord,'user_id',array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<?php echo $form->textField($callRecord, 'user_name', array('class' => 'form-control col-sm-4','readonly'=>'readonly')); ?>
		<?php echo $form->hiddenField($callRecord, 'user_id', array('class' => 'form-control col-sm-4')); ?>
		</div>
		<div class="col-sm-5 control-info">
		<?php echo $form->error($callRecord,'user_id');?><?php echo Yii::app()->user->getFlash('error')?>
		</div>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($callRecord,'type', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<?php echo $form->dropDownList($callRecord, 'type', $callRecord->typeStatusArrs,array('class' => 'form-control col-sm-4')); ?>
		</div>
		<div class="col-sm-5 control-info"><?php echo $form->error($callRecord,'type'); ?></div>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($callRecord,'descript', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<?php echo $form->textArea($callRecord, 'descript', array('class' => 'form-control col-sm-4')); ?>
		</div>
		<div class="col-sm-5 control-info"><?php echo $form->error($callRecord,'descript'); ?></div>
	</div>
	
	<div class="form-group">
		<?php echo $form->labelEx($callRecord,'satisfaction',array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-5">
		<?php echo $form->dropDownList($callRecord,'satisfaction',$callRecord->satisfactionArrs,array('class' => 'form-control col-sm-4 isrequired',)); ?>
		</div>
		<div class="col-sm-5 control-info">
		<?php echo $form->error($callRecord,'satisfaction'); ?>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-2"></div>
		<div class="col-sm-10">
			<?php echo CHtml::submitButton($callRecord->isNewRecord ? '创建呼叫记录' : '保存更改', array('class' => 'btn btn-large btn-primary', 'id' => 'submitBtn')); ?>
		</div>
	</div>
<?php $this->endWidget(); ?>
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
var info_protect_switch = <?php echo $this->info_protect_switch ? 'true' : 'false'; ?>;
if(info_protect_switch) {
	$(document).bind("contextmenu",function(){return false;});  
	$(document).bind("selectstart",function(){return false;});  
	$(document).keydown(function(){return key(arguments[0])}); 
}
$(function() {
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
</script>