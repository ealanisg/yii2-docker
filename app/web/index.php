<?php

switch (strtolower($_SERVER['SERVER_NAME'])) {
  case "serverprod.com": // prod
    defined('YII_ENV') or define('YII_ENV', 'prod');
    break;

  case "serverqa.com": // qa
    defined('YII_DEBUG') or define('YII_DEBUG', true);
    defined('YII_ENV') or define('YII_ENV', 'test');
    break;

  default: // localhost
    defined('YII_ENV') or define('YII_ENV', 'dev');
    defined('YII_DEBUG') or define('YII_DEBUG', true);
    break;
}

$config = require(__DIR__ . '/_protected/config/' . YII_ENV . '/web.php');

require(__DIR__ . '/_protected/vendor/autoload.php');
require(__DIR__ . '/_protected/vendor/yiisoft/yii2/Yii.php');

(new yii\web\Application($config))->run();
