<?php
require_once('route.php');
require_once('Framework.php');

$framework = new Framework();
try {
	$framework->getPathsFromUri($route);
} catch (Exception $e) {
	die( $e->getMessage() );
}

//***** CARREGA CONTROLLERS DINAMICAMENTE ***** 
require_once('domain/controllers/' . $framework->getFileName() . '.php');

try {
	$framework->checkClass();
} catch (Exception $e) {
	die( $e->getMessage() );
}


try {
	$framework->checkMethod();
} catch (Exception $e) {
	die( $e->getMessage() );
}


$class = $framework->getFileName();
$method = $framework->getMethod();

$controller = new $class();

$param = $framework->getPathExplode()[4] ?? null;

if (is_null($param)) {
	$controller->$method();
} else {
	$controller->$method($param);
}