<?php
require 'configuration/routes.php';
$url=parse_url($_SERVER['REQUEST_URI'])['path'];
function abort($code=404){
	http_response_code(404);
	require "view/{$code}.php" ;
	die;
}
function routeToController($url,$routes){
	if(array_key_exists($url, $routes)){
	require $routes[$url];
	}else{
		abort();
	}
}
routeToController($url,$routes);
?>
