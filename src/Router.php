<?php

namespace EstacionMeteorologica;

use \Closure;

class Router
{
	const GET_METHOD = 'GET';
	const POST_METHOD = 'POST';

	private $postRoutes;
	private $getRoutes;

	function __construct() {
		$this->postRoutes = [];
		$this->getRoutes = [];
	}

	public function route($action, $method, Closure $callback)
	{
		$action = trim($action, '/');
		if ($method == Router::GET_METHOD) {
			$this->getRoutes[$action] = $callback;
		}
		if ($method == Router::POST_METHOD) {
			$this->postRoutes[$action] = $callback;
		}
	}

	private function dispatch($action, $method, $params)
	{
		$action = trim($action, '/');
		$callback = null;
		if ($method == Router::GET_METHOD) {
			$callback = $this->getRoutes[$action];
		}
		echo call_user_func($callback, $params);
	}

	public function resolveRoute($requestData)
	{
		$parametters = null;
		$route = null;
		$method = null;

		if ($requestData['REQUEST_METHOD'] == Router::GET_METHOD) {
			$method = Router::GET_METHOD;
			if (strpos($requestData['REQUEST_URI'], '?')) {
				$queryStringsChained = explode('&', $requestData['QUERY_STRING']);
				foreach ($queryStringsChained as $queryString) {
					$splitedQueryString = explode('=', $queryString);
					$parametters[$splitedQueryString[0]] = $splitedQueryString[1];				
				}
			}
		}
		$this->dispatch($requestData['PATH_INFO'], $method, $parametters);
	}
}