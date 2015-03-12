<?php
/* @var $this BorrowController */
/* @var $model Borrow */

$this->pageTitle = '查看项目预告';

$this->breadcrumbs=array(
	'项目预告管理' => array('noticelist'),
	'查看项目预告',
);

$this->menu=array(
	array('label'=>'项目预告列表', 'url'=>array('noticelist')),
	//array('label'=>'编辑预告项目', 'url'=>array('noticeupdate', 'id' => $notice['id'])),
	array('label'=>'创建预告项目', 'url'=>array('noticecreate')),
);

?>

<div class="tabbable tabbable-custom tabbable-full-width" >
	<ul class="nav nav-tabs">
		<li class="active"><a href="#info" data-toggle="tab" >基本信息</a></li>
	</ul>
	<div class="tab-content" >
		<div class="tab-pane fade in active" id="info">
<?php

Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl ."/plugins/kindeditor/kindeditor-all.js");
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl ."/plugins/kindeditor/lang/zh_CN.js");

?>

<div class="form-horizontal" >
    <div class="panel panel-primary">
    	<div class="panel-heading">
    		<span>基本信息</span>
    	</div>
    	<div class="panel-body" >
			<div class="form-group">
				<label for="item_title" class="col-sm-2 control-label"><?php echo $model->getAttributeLabel('title'); ?>：<span class="required">*</span></label>
				<div class="col-sm-8 control-info">
				<?php echo $model->title; ?>
				</div>
				<div class="col-sm-2 control-info">&nbsp;</div>
			</div>
			<div class="form-group">
				<label for="item_title" class="col-sm-2 control-label"><?php echo $model->getAttributeLabel('desc'); ?>：</label>
				<div class="col-sm-8 control-info">
				<?php echo $model->desc; ?>
				</div>
				<div class="col-sm-2 control-info">&nbsp;</div>
			</div>
			<div class="form-group">
				<label for="item_title" class="col-sm-2 control-label"><?php echo $model->getAttributeLabel('guarantee'); ?>：<span class="required">*</span></label>
				<div class="col-sm-8 control-info">
				<?php echo $model->guarantee; ?>
				</div>
				<div class="col-sm-2 control-info">&nbsp;</div>
			</div>
			<div class="form-group">
				<label for="item_title" class="col-sm-2 control-label"><?php echo $model->getAttributeLabel('amount'); ?>：<span class="required">*</span></label>
				<div class="col-sm-8 control-info">
				<?php echo $model->amount; ?>
				</div>
				<div class="col-sm-2 control-info">&nbsp;</div>
			</div>
			<div class="form-group">
				<label for="item_title" class="col-sm-2 control-label"><?php echo $model->getAttributeLabel('rate'); ?>：<span class="required">*</span></label>
				<div class="col-sm-8 control-info">
				<?php echo $model->rate; ?>
				</div>
				<div class="col-sm-2 control-info">&nbsp;</div>
			</div>
			<div class="form-group">
				<label for="item_title" class="col-sm-2 control-label"><?php echo $model->getAttributeLabel('time_limit'); ?>：<span class="required">*</span></label>
				<div class="col-sm-8 control-info">
				<?php echo $model->time_limit; ?>
				</div>
				<div class="col-sm-2 control-info">&nbsp;</div>
			</div>
			<div class="form-group">
				<label for="item_title" class="col-sm-2 control-label"><?php echo $model->getAttributeLabel('finance_time'); ?>：<span class="required">*</span></label>
				<div class="col-sm-8 control-info">
				<?php echo date("Y-m-d H:i",$model->finance_time); ?>
				</div>
				<div class="col-sm-2 control-info">&nbsp;</div>
			</div>
			<div class="form-group">
				<label for="item_title" class="col-sm-2 control-label"><?php echo $model->getAttributeLabel('add_date'); ?>：</label>
				<div class="col-sm-8 control-info">
				<?php echo $model->add_date; ?>
				</div>
				<div class="col-sm-2 control-info">&nbsp;</div>
			</div>
			<div class="form-group">
				<label for="item_title" class="col-sm-2 control-label"><?php echo $model->getAttributeLabel('status'); ?>：<span class="required">*</span></label>
				<div class="col-sm-8 control-info">
				<?php if($model->status==1){ echo "显示";}else{echo "隐藏";}?>
				</div>
				<div class="col-sm-2 control-info">&nbsp;</div>
			</div>
	
</div>





		</div>
	</div>
</div>
