<?php

use frontend\repositories\PageRepository;
use frontend\services\PageService;

$params = array_merge(
	require __DIR__ . '/../../common/config/params.php',
	require __DIR__ . '/../../common/config/params-local.php',
	require __DIR__ . '/params.php',
	require __DIR__ . '/params-local.php'
);

return [
	'id' => 'app-frontend',
	'basePath' => dirname(__DIR__),
	'bootstrap' => ['log'],
	'language' => 'br-br',
	'controllerNamespace' => 'frontend\controllers',
	'components' => [
		'request' => [
			'csrfParam' => '_csrf-frontend',
		],
		'user' => [
			'identityClass' => 'common\models\User',
			'enableAutoLogin' => true,
			'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
		],
		'session' => [
			// this is the name of the session cookie used for login on the frontend
			'name' => 'advanced-frontend',
		],
		'log' => [
			'traceLevel' => YII_DEBUG ? 3 : 0,
			'targets' => [
				[
					'class' => 'yii\log\FileTarget',
					'levels' => ['error', 'warning'],
				],
			],
		],
		'errorHandler' => [
			'errorAction' => 'site/error',
		],

		'urlManager' => [
			'enablePrettyUrl' => true,
			'showScriptName' => false,
			'rules' => [
				'skill/<id:\d+>' => 'skill/view',
				'skill/delete/<id:\d+>' => 'skill/delete',
				'skill/update/<id:\d+>' => 'skill/update',
			],
		],
		'page' => [
			'class' => PageService::class,
			'repository' => new PageRepository(),
		],
		'db' => [
			'class' => '\yii\db\Connection',
			'dsn' => 'mysql:host=127.0.0.1;dbname=patterns',
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		],
	],
	'params' => $params,
];
