<?php 

$this->pageTitle = '项目首页';

$this->breadcrumbs=array(
	'项目管理'=>array('admin'),
	'项目首页',
);

$this->menu=array(
	array('label'=>'项目列表', 'url'=>array('index')),
	array('label'=>'创建新项目', 'url'=>array('create')),
);

?>