<?php
/* @var $this ProjectController */

$this->pageTitle = '创建项目预告';

$this->breadcrumbs=array(
	'项目预告管理' => array('noticelist'),
	'创建项目预告',
);

$this->menu=array(
	array('label'=>'项目预告列表', 'url'=>array('noticelist')),
);
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl ."/plugins/kindeditor/kindeditor-all.js");
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl ."/plugins/kindeditor/lang/zh_CN.js");

echo $this->renderPartial('_noticeForm', array( 
					'model' => $model,
            ));

?>
