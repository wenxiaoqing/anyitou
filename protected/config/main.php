<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'安宜投',
	"params"=>array("version"=>"201401091728"),
	'language'=>'zh_cn',
	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.classes.*',
		'application.components.*',
		'application.helpers.*',
	   	'application.views.commonfile.*',
		'application.modules.rights.*', 
        'application.modules.rights.components.*', 
		'ext.YiiRedis.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'1',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		'rights'=>array(
            'superuserName'=>'super_admin',//自己用户表里面的用户，这个作为超级用户
            'userClass'=>'ManagerUser',//自己用户表对应的用户模型类
            'authenticatedName'=>'Authenticated',
            'userIdColumn'=>'id',//自己用户表对应的id栏
            'userNameColumn'=>'username',//自己用户表对应的栏
            'enableBizRule'=>true,
            'enableBizRuleData'=>false,
            'displayDescription'=>true,
            'flashSuccessKey'=>'RightsSuccess',
            'flashErrorKey'=>'RightsError',
            'baseUrl'=>'/rights',
            'layout'=>'rights.views.layouts.main',
            'appLayout'=>'application.views.layouts.main',
            'cssFile'=>'rights.css',
            'install'=>false,//第一次安装需要为true，安装成功以后记得改成false
            'debug'=>false,
         ),
		 'cms','account','lotterydraw',
		
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array("version"=>"2013090613"),
	// application components
    'components'=>array_merge(
        array(
            'user'=>array(
                // enable cookie-based authentication
                'class'=>'WebUser',
                'allowAutoLogin'=>true,
                'loginUrl'=>array('site/login'),
            ),
            'session'=>array(
                'class' => 'CHttpSession',
                'autoStart' => true,
                'cookieParams' => array('domain' => '.anyitou.com'),
            ),
			'authManager'=>array( 
				'class'=>'RDbAuthManager', // Provides support authorization item sorting. 
				'assignmentTable' => 'manager_authassignment',
				'itemTable' => 'manager_authitem',
				'itemChildTable' => 'manager_authitemchild',
				'rightsTable' => 'manager_rights',
				'defaultRoles'=>array('Guest'),
			 ), 

           'urlManager'=>array(
				'urlFormat'=>'path',
				//'urlSuffix' => '.html',
				'showScriptName' => false,
				//'caseSensitive'=>false,
				'rules'=>array(
					'<module:\w+>/<controller:\w+>/<action:\w+>' => '<module>/<controller>/<action>',
					'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
				),
            ),
            'errorHandler' => array(
				'errorAction' => 'site/error',
			),
        ),
        require_once("main_components.php")
    ),
);
