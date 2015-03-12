<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'安宜投',
	"params"=>array("version"=>"201401091728"),
	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.classes.*',
		'application.components.*',
		'application.helpers.*',
	   	'application.views.commonfile.*',
		'application.extensions.yii-mail.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		/*
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'Enter Your Password Here',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		*/
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
                'loginUrl'=>array('reg/login'),
            ),
            'session'=>array(
                'class' => 'CHttpSession',
                'autoStart' => true,
                'cookieParams' => array('domain' => '.anyitou.com'),
            ),
/*           'urlManager'=>array(
              //'urlFormat'=>'path',
              'urlSuffix' => '.html',
              'showScriptName' => false,
              'caseSensitive'=>false,
              'rules'=>array(
              '<controller:\w+>/<id:\d+>'=>'<controller>/view',
              '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
              '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
             ),
            ),
            //mailer
	        'mailer' => array(
				'class' => 'application.extensions.mailer.EMailer',
				'pathViews' => 'application.views.email',
				'pathLayouts' => 'application.views.email.layouts'
			),
			'mailer'=>array(
	            'class'=>'application.extensions.MyEMailer',
	            'host' => '192.168.1.52',
	            'port' => 25,
				'userName'=>'notice',
				'password'=>'qrz2303',
        	),*/
        ),
        require_once("main_components.php")
    ),
);
