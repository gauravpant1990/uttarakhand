<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Uttarakhand Samaaj',
	'homeUrl'=>'',
	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.extensions.*',
		/*'ext.yii-mail.YiiMailMessage',
		'ext.yii-mail.YiiMail',*/
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		'Access',
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'admin',//'Enter Your Password Here',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1','192.168.1.*'),
		),		
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
			'class'=>'WebUser',
		),
		
		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'showScriptName'=>false,
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=uttarakh',
			'emulatePrepare' => true,
			'username' => 'root',//'uttarakh_root',
			'password' => 'myRoot',//'!Gsd31stY',
			'charset' => 'utf8',
		),
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
		'gclient_id' => '555613283129-6gnki4msiadk3ttrk68jdiqmsbqul16e.apps.googleusercontent.com',
		'gclient_secret' => 'xiAZpC2N-iGxS-PvfTKI8EBE',
		'gapplicatoin_name' => "Uttarakhand",
	),
	/**/
);
