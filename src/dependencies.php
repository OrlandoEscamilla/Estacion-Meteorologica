<?php

use \Monolog\Logger;
use \Monolog\Handler\StreamHandler;

$container = $app->getContainer();

$container['logger'] = function ($c) {
    $settings = $c['settings']['logger'];
    $logger = new Logger($settings['name']);
    $file_hanlder = new StreamHandler($settings['file']);
    $logger->pushHandler($file_hanlder);
    return $logger;
};

$container['db'] = function ($c) {
    $settings = $c['settings']['db'];
    $pdo = new PDO(
        'mysql:host='.$settings['host'].';dbname='.$settings['dbname'],
        $settings['user'],
        $settings['pass']
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $pdo;
};