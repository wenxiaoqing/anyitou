<?php
/* @var $this InvestController */

$this->breadcrumbs=array(
	'投资管理'=>array('/invest'),
	'投资记录',
);
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#user_invest-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="tabbable tabbable-custom tabbable-full-width" >
	<ul class="nav nav-tabs">
		<li class="<?php if(Yii::app()->request->getParam('type') == ''){ echo ' active'; } ?>"><a href="<?php echo $this->createUrl('/invest/records'); ?>" >全部投资</a></li>
	    <li class="<?php if(Yii::app()->request->getParam('type') == '1'){ echo ' active'; } ?>"><a href="<?php echo $this->createUrl('/invest/records', array('type' => '1')); ?>" >全部直投</a></li>
		<li class="<?php if(Yii::app()->request->getParam('type') == '2' ){ echo ' active'; } ?>"><a href="<?php echo $this->createUrl('/invest/records', array('type' => '2')); ?>" >债券转让</a></li>
	</ul>
	<div class="tab-content" >
    <?php echo CHtml::link('高级搜索','#',array('class'=>'search-button')); ?>
    <div class="search-form" style="display:none">
        <div class="wide form form-horizontal">
        <?php $form=$this->beginWidget('CActiveForm', array(
        	'action'=>Yii::app()->createUrl($this->route),
        	'method'=>'get',
        )); ?>
        	<div class="form-group">
        		<?php echo $form->labelEx($model,'item_title', array('class' => 'col-sm-2 control-label')); ?>
        		<div class="col-sm-5">
        		<?php echo $form->textField($model, 'item_title', array('class' => 'form-control col-sm-4')); ?>
        		</div>
        		<div class="col-sm-5 control-info"></div>
        	</div>
        	<div class="form-group">
        		<?php echo $form->labelEx($model,'username', array('class' => 'col-sm-2 control-label')); ?>
        		<div class="col-sm-5">
        		<?php echo $form->textField($model, 'username', array('class' => 'form-control col-sm-4')); ?>
        		</div>
        		<div class="col-sm-5 control-info"></div>
        	</div>
        	<div class="form-group">
        		<div class="col-sm-2"></div>
        		<div class="col-sm-10">
        			<?php echo CHtml::submitButton('搜索', array('class' => 'btn btn-large btn-primary', 'id' => 'submitBtn')); ?>
        		</div>
        	</div>
        <?php $this->endWidget(); ?>
        </div>
    </div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user_invest-grid',
	'dataProvider' => $model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
            'name' => 'id',
            'value' => '$data->id',
		    'headerHtmlOptions' => array('width' => '60px'),
        ),
        array(
            'name' => 'trade_no',
            'value' => '$data->trade_no',
		    'headerHtmlOptions' => array('width' => '60px'),
        ),
        array(
            'name' => 'username',
            'type' => 'raw',
			'value' => 'CHtml::link(CHtml::encode($data->user->user_name), array("/user/view", "id" => $data->user_id), array("target" => "_blank"))',
            'headerHtmlOptions' => array('width' => '60px'),
        ),
        array(
            'name' => 'realname',
            'value' => '$data->user->real_name',
            'headerHtmlOptions' => array('width' => '60px'),
        ),
        array(
            'name' => 'item_id',
            'value' => '$data->itemInfo->item_title',
            'type' => 'raw',
			'value' => 'CHtml::link(CHtml::encode($data->itemInfo->item_title), array("/invest/records", "item_id" => $data->item_id)).CHtml::link(CHtml::encode("[查看]"), array("/project/view", "id" => $data->item_id), array("target" => "_blank"))',
            'headerHtmlOptions' => array('width' => '220xp'),
        ),
		
        array(
            'name' => 'item_amount',
            'value' => 'UtilClass::formatMoney($data->item_amount)."元"',
            'headerHtmlOptions' => array('width' => '80px'),
            'htmlOptions' => array('style' => 'text-align:right;'),
        ),
        array(
            'name' => 'money',
            'value' => 'UtilClass::formatMoney($data->money)."元"',
            'headerHtmlOptions' => array('width' => '80px'),
            'htmlOptions' => array('style' => 'text-align:right;'),
        ),
        array(
            'name' => 'status',
            'type' => 'raw',
            'value' => '$data->getStatusLabel($data->status)',
            'filter' => $model->statusDict,
            'headerHtmlOptions' => array('width' => '80px'),
            'htmlOptions' => array('style' => 'text-align:center;'),
        ),
		array(
			'name' => 'debt_status',
			'value' => '$data->getDebtStatus($data->debt_status)',
			'filter' => $model->debtStatusAttrs,
			'headerHtmlOptions' => array('width' => '60px'),
		),
        array(
            'name' => 'has_reward',
            'value' => '$data->isHasReward($data->has_reward)',
            'filter' => $model->hasRewardDict,
            'headerHtmlOptions' => array('width' => '80px'),
            'htmlOptions' => array('style' => 'text-align:center;'),
        ),
        array(
            'name' => 'loans_flag',
            'value' => '$data->isLoaned($data->loans_flag)',
            'filter' => $model->loansFlagDict,
            'headerHtmlOptions' => array('width' => '80px'),
            'htmlOptions' => array('style' => 'text-align:center;'),
        ),
        array(
            'name' => 'invest_time',
            'value' => '$data->invest_time',
            'headerHtmlOptions' => array('width' => '120px'),
            'htmlOptions' => array('style' => 'text-align:center;'),
        ),
		
		/*array(
			'class'=>'CButtonColumn',
			'header' => '操作',
			'headerHtmlOptions' => array('width' => '120'),
		),*/
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

