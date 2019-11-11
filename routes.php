<?php

use EstacionMeteorologica\Router;
use EstacionMeteorologica\Controller\Temperature;

$router = new Router();

$router->route('/', Router::GET_METHOD, function () {
	return "Estacion Meteorologica";
});

$router->route('/temperature', Router::GET_METHOD, function ($parametters) {
	return Temperature::getTemperature($parametters);
});

$router->resolveRoute($_SERVER);