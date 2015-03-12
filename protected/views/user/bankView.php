<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'银行管理'=>array('admin'),
	$model->name,
);

$this->menu=array(
	
	array('label'=>'管理列表', 'url'=>array('UserBankFunds')),
);
?>

<div class="portlet box blue" >
    <div class="portlet-title">
    	<div class="caption">银行信息</div>
    	<div class="tools">
    		<a href="javascript:;" class="collapse"></a>
    	</div>
    </div>
    <div class="portlet-body">
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		array(
			'name'=>'name',
			'value'=>$model->name,	
		),
        array(
            'name' => 'abbr',
            'value' => $model->abbr,
        ),
        array(
            'name' => 'used_recharge',
			'value' => $model->getUsedRecharge(),
			//'filter' => $model->usedRechargeAttrs,
        ),
        array(
        'name' => 'used_withdraw',
		'value' => $model->getUsedWithdraw(),
		//'filter' => $model->usedWithdrawAttrs,
        ),
        array(
            'name' => 'add_time',
            'value' => $model->add_time,
        ),
	
		
	),
)); ?>
	</div>
</div>



<!--<div class="portlet box blue" >
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
</div>-->

