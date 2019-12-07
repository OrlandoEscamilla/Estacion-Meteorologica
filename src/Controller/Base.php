<?php

namespace App\Controller;

use \Psr\Container\ContainerInterface as Container;

class Base
{
    protected $database;
    protected $logger;

    public function __construct(Container $container)
    {
        $this->database = $container->get('db');
        $this->logger = $container->get('logger');
    }
}