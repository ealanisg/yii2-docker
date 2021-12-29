<?php

$params = require(__DIR__ . '/params.php');

$config = [
  'id' => 'basic',
  'name' => 'BASIC',
  'language' => 'es',
  'basePath' => dirname(realpath(__DIR__ . '/..')),
  'bootstrap' => ['log', 'app\components\Aliases'],
  'aliases' => [
    '@bower' => '@vendor/bower-asset',
    '@npm'   => '@vendor/npm-asset',
  ],
  'components' => [
    'request' => [
      // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
      'cookieValidationKey' => 'lylCBFkHfXGFxGVAqWzrPqRTH0yXY7ta',
    ],
    // you can set your theme here - template comes with: 'light' and 'dark'
    'view' => [
      'theme' => [
        'pathMap' => ['@app/views' => '@vendor/hail812/yii2-adminlte3/src/views']
      ],
    ],
    'assetManager' => [
      'bundles' => [
        // we will use bootstrap css from our theme
        'yii\bootstrap\BootstrapAsset' => [
          'css' => [], // do not use yii default one
        ],
      ],
    ],
    'cache' => [
      'class' => 'yii\caching\FileCache',
    ],
    'urlManager' => [
      'class' => 'yii\web\UrlManager',
      'enablePrettyUrl' => true,
      'showScriptName' => false,
      'rules' => [
        '<alias:\w+>' => 'site/<alias>',
        '<controller:\w+>/<id:\d+>' => '<controller>/view',
        '<controller:\w+>/<action:\[\w\-]+>/<id:\d+>' => '<controller>/<action>',
        '<controller:\w+>/<action:\[\w\-]+>' => '<controller>/<action>',
      ],
    ],
    'user' => [
      'identityClass' => 'app\models\UserIdentity',
      'enableAutoLogin' => true,
    ],
    'session' => [
      'class' => 'yii\web\Session',
      'savePath' => '@app/runtime/session'
    ],
    'authManager' => [
      'class' => 'yii\rbac\DbManager',
      'cache' => 'cache',
    ],
    'errorHandler' => [
      'errorAction' => 'site/error',
    ],
    'mailer' => [
      'class' => 'yii\swiftmailer\Mailer',
      // send all mails to a file by default.
      // You have to set 'useFileTransport' to false and configure a transport for the mailer to send real emails.
      'useFileTransport' => true,
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
    'i18n' => [
      'translations' => [
        'app*' => [
          'class' => 'yii\i18n\PhpMessageSource',
          'basePath' => '@app/translations',
          'sourceLanguage' => 'en',
        ],
        'yii' => [
          'class' => 'yii\i18n\PhpMessageSource',
          'basePath' => '@app/translations',
          'sourceLanguage' => 'en'
        ],
      ],
    ],
    'db' => require(__DIR__ . '/db.php'),
  ],
  'params' => $params,
];

// configuration adjustments for 'dev' environment
$config['bootstrap'][] = 'debug';
$config['modules']['debug'] = ['class' => 'yii\debug\Module', 'allowedIPs' => ['*']];

$config['bootstrap'][] = 'gii';
$config['modules']['gii'] = [
  'class' => 'yii\gii\Module',
  'generators' => [ // here
    'crud' => [ // generator name
      'class' => 'yii\gii\generators\crud\Generator', // generator class
      'templates' => [ // setting for our templates
        'yii2-adminlte3' => '@vendor/hail812/yii2-adminlte3/src/gii/generators/crud/default' // template name => path to template
      ]
    ]
  ],
  'allowedIPs' => ['*'],
];

return $config;
