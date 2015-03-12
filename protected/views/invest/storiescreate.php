<?php
/* @var $this ProjectController */

$this->pageTitle = '创建投资故事';

$this->breadcrumbs=array(
	'投资故事管理' => array('storieslist'),
	'创建投资故事',
);

$this->menu=array(
	array('label'=>'投资故事列表', 'url'=>array('storieslist')),
);
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl ."/plugins/kindeditor/kindeditor-all.js");
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl ."/plugins/kindeditor/lang/zh_CN.js");

echo $this->renderPartial('_storiesForm', array( 
					'model' => $model,
            ));

?>
