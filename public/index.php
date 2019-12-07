<?php

use \Slim\App as App;

require '../vendor/autoload.php';
require '../src/settings.php';

$app = new App(['settings' => $settings]);

require '../src/dependencies.php';
require '../src/routes.php';

$app->run();