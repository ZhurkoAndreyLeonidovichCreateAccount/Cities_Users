<?php

namespace System;

class Router {
	protected string $baseUrl;
	protected int $baseShift;
	public array $routes;
	

	public function __construct(string $baseUrl = ''){
		$this->baseUrl = $baseUrl;
		$this->baseShift = strlen($this->baseUrl);
	}

	public function addRoute(string $regExp, string $name, string $method = 'index', array $map = []) : void{
		$this->routes[] = [
			'path' => $regExp,
			'c' => $name,
			'm' => $method,
			'paramsMap' => $map
		];
	}

	public function resolvePath(string $url) : array{
		
		$relativeUrl = substr($url, $this->baseShift);
		$route = $this->findPath($relativeUrl);
		
		return [
			'controller' => $route['controller'],
			'method' => $route['method']
		];
	}

	protected function findPath(string $url) : array{
		//print_r($url);
		$activeRoute = null;
		
		foreach($this->routes as $route){
			$matches = [];

			if(preg_match($route['path'], $url, $matches)){				
				$activeRoute = $route;
			}
		}

		// if($activeRoute === null){
		// 	throw new Exc404('route not found');
		// }

		return $activeRoute;
	}
}