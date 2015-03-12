<?php

return array(
	array('label' => '首页', 'url' => '/'),//site/index
	array('label' => '用户管理', //user/admin
		'items' => array(
			array('label' =>'用户列表', 'url' => '/user/admin'),
			array('label' =>'添加用户', 'url' => '/user/create'),
		),
		'visible'=> 'Yii::app()->user->checkAccess("user")',
	),
	array('label' => '项目管理', 'value' => '/project',
		'items' => array(
			array('label' =>'创建项目', 'url' => '/project/create'),
			array('label' =>'项目列表', 'url' => '/project/admin'),
		),
	),
	array('label' => '企业管理', 'value' => '/company/index',
		'items' => array(
			array('label' =>'企业列表', 'url' => '/company/admin'),
		),
	),
	array('label' => '担保机构管理', 'value' => '/guarantee/index',
		'items' => array(
			array('label' =>'担保机构列表', 'url' => '/guarantee/admin'),
			array('label' =>'添加担保机构', 'url' => '/guarantee/create'),
		),
	),
	array('label' => '系统管理', 
		'items' => array(
			array('label' =>'管理用户列表', 'url' => '/managerUser/admin'),
			array('label' =>'权限管理', 'url' => '/rights'),
		),
	),
	
);

