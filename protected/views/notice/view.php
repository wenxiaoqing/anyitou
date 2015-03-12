<?php
/* @var $this BorrowController */
/* @var $model Borrow */

$this->pageTitle = '查看公告';

$this->breadcrumbs=array(
	'公告管理' => array('list'),
	'查看公告',
);

$this->menu=array(
	array('label'=>'公告列表', 'url'=>array('list')),
	array('label'=>'编辑公告', 'url'=>array('update', 'id' => $notice['id'])),
	array('label'=>'创建公告', 'url'=>array('create')),
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
				<label for="item_title" class="col-sm-2 control-label"><?php echo $model->getAttributeLabel('class_id'); ?>：<span class="required">*</span></label>
				<div class="col-sm-8 control-info">
				<?php echo $model->getClassType($model->class_id); ?>
				</div>
				<div class="col-sm-2 control-info">&nbsp;</div>
			</div>
			<div class="form-group">
				<label for="item_title" class="col-sm-2 control-label"><?php echo $model->getAttributeLabel('content'); ?>：<span class="required">*</span></label>
				<div class="col-sm-8 control-info">
				<?php echo $model->content; ?>
				</div>
				<div class="col-sm-2 control-info">&nbsp;</div>
			</div>
			<div class="form-group">
				<label for="item_title" class="col-sm-2 control-label"><?php echo $model->getAttributeLabel('hits'); ?>：<span class="required">*</span></label>
				<div class="col-sm-8 control-info">
				<?php echo $model->hits; ?>
				</div>
				<div class="col-sm-2 control-info">&nbsp;</div>
			</div>
			<div class="form-group">
				<label for="item_title" class="col-sm-2 control-label"><?php echo $model->getAttributeLabel('add_date'); ?>：<span class="required">*</span></label>
				<div class="col-sm-8 control-info">
				<?php echo $model->add_date; ?>
				</div>
				<div class="col-sm-2 control-info">&nbsp;</div>
			</div>
			<div class="form-group">
				<label for="item_title" class="col-sm-2 control-label"><?php echo $model->getAttributeLabel('update_date'); ?>：<span class="required">*</span></label>
				<div class="col-sm-8 control-info">
				<?php echo $model->update_date; ?>
				</div>
				<div class="col-sm-2 control-info">&nbsp;</div>
			</div>
			<div class="form-group">
				<label for="item_title" class="col-sm-2 control-label"><?php echo $model->getAttributeLabel('is_recommend'); ?>：</label>
				<div class="col-sm-8 control-info">
				<?php echo $model->getRecommendType($model->is_recommend); ?>
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
