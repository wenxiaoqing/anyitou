<?php
/* @var $this ProjectController */

$this->pageTitle = '创建公告';

$this->breadcrumbs=array(
	'公告管理' => array('list'),
	'创建公告',
);

$this->menu=array(
	array('label'=>'公告列表', 'url'=>array('list')),
);
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl ."/plugins/kindeditor/kindeditor-all.js");
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl ."/plugins/kindeditor/lang/zh_CN.js");

echo $this->renderPartial('_noticeForm', array( 
					'model' => $model,
            ));

?>
