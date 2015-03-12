<?php

// This is the configuration for yiic console application.
// Any writable CConsoleApplication properties can be configured here.
	// application components
	return array(
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=anyitou',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
        ),
		/*'slave'=>array(
		    'class'=>'CDbConnection',
			'connectionString' => 'mysql:host=192.168.1.54;dbname=qian_db',
			'emulatePrepare' => true,
			'username' => 'qian',
			'password' => 'qrztest',
			'charset' => 'utf8',
        ),*/
			'slave'=>array(
			 'class'=>'CDbConnection',
					'connectionString' => 'mysql:host=localhost;dbname=anyitou',
					'emulatePrepare' => true,
					'username' => 'root',
					'password' => '',
					'charset' => 'utf8',
			),

        'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
                ),
            ),
        ),
       /* 'redis'=>array(
            'class'=>'application.extensions.MyRedis',
            'host' => '192.168.1.54',
            'port' => 6379,
            'password' => 'qrztest',
        ),*/
	);
