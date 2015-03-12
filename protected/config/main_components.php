<?php

	return array(
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=anyitou',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => 'password',
			'charset' => 'utf8',
        ),

         //'cache'=>array(
            // 'class'=>'CMemCache',
            // 'servers'=>array(
                // array('host'=>'188.188.2.8', 'port'=>11211, 'weight'=>60),
            // ),
        // ),
			//redis 配置
			'cache'=>array(
					'class'=>'ext.redis.CRedisCache',
					'servers'=>array(
						//array('host'=>'188.188.2.8','port'=>'6379'),
							 array('host'=>'localhost','port'=>'6379'),
					),
			),
		
		//缂撳瓨鏁版嵁搴撳彞鏌�		
		'manage_db'=>array(
				'class'=>'CDbConnection',
				'connectionString' => 'mysql:host=localhost;dbname=anyitou',
				'emulatePrepare' => true,
				'username' => 'root',
				'password' => 'password',
				'charset' => 'utf8',
				//'queryCacheID' => "manage_cache",
				//'queryCachingDuration' => 9999999,
				//'queryCachingDependency' => new CFileCacheDependency('protected/config/gen_config/update.dep'),
				//'queryCachingCount' => 1,
		),
		/*'manage_cache'=>array(
				'class'=>'CApcCache',
		),*/
        
			
			
		'mail'=>array(  
            'class' => 'application.extensions.yii-mail.YiiMail',  
            'viewPath' => 'application.views.mail',  
            'logging' => false,  
            'dryRun' => false,  
            'transportType'=>'smtp',     // case sensitive!  
            'transportOptions'=>array(  
                'host'=>'smtp.qiye.163.com',   // smtp服务器  
                'username'=>'service@anyitou.com',    // 验证用户  
                'password'=>'ayt_8888',   // 验证密码  
                'port'=>'994',           // 端口号默认25  
                'encryption'=>'ssl',   
                ),  
        ),
		'image'=>array(
          'class'=>'application.extensions.image.CImageComponent',
            // GD or ImageMagick
            'driver'=>'GD',
            // ImageMagick setup path
            'params'=>array('directory'=>'/opt/local/bin'),
        ),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning,trace',
				),
				/*日志*/
				/*array(
						'class'=>'CWebLogRoute',
						'levels'=>'trace',
						'categories'=>'system.db.*',
				),*/
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
        ),
		'C' => array(
			'class' => 'AytConfig',
		),
	);

