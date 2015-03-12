<?php
/* @var $this ProjectController */

$this->pageTitle = '创建融资案例';

$this->breadcrumbs=array(
	'融资案例管理' => array('caselist'),
	'创建融资案例',
);

$this->menu=array(
	array('label'=>'融资案例列表', 'url'=>array('caselist')),
);
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl ."/plugins/kindeditor/kindeditor-all.js");
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl ."/plugins/kindeditor/lang/zh_CN.js");

echo $this->renderPartial('_caseForm', array( 
					'model' => $model,
            ));

?>
