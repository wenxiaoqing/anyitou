<?php

// This is the configuration for yiic console application.
// Any writable CConsoleApplication properties can be configured here.
return array(
	'basePath' => dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Console Application',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
        'application.components.*',
	),

    // application components
    'components'=>array_merge(
        array(
            'user'=>array(
                // enable cookie-based authentication
                'allowAutoLogin'=>true,
                'loginUrl'=>array('reg/login'),
            ),
            'errorHandler'=>array(
                // use 'site/error' action to display errors
                'errorAction'=>'site/error',
            ),
            'session'=>array(
                'class' => 'CHttpSession',
                'autoStart' => true,
            ),
            //mailer
	        /*'mailer' => array(
				'class' => 'application.extensions.mailer.EMailer',
				'pathViews' => 'application.views.email',
				'pathLayouts' => 'application.views.email.layouts'
			),*/
        ),
        require_once("console_components.php")
    ),
);
