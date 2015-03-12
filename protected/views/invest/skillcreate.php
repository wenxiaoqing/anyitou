<?php
/* @var $this ProjectController */

$this->pageTitle = '创建投资技巧';

$this->breadcrumbs=array(
	'投资技巧管理' => array('skilllist'),
	'创建投资技巧',
);

$this->menu=array(
	array('label'=>'投资技巧列表', 'url'=>array('skilllist')),
);
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl ."/plugins/kindeditor/kindeditor-all.js");
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl ."/plugins/kindeditor/lang/zh_CN.js");

echo $this->renderPartial('_skillForm', array( 
					'model' => $model,
            ));

?>
