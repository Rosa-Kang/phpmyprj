<?php
try {
	include __DIR__ . '/../includes/autoload.php';
	
	$route = ltrim(strtok($_SERVER['REQUEST_URI'], '?'), '/');

	$entryPoint = new \Hanbit\EntryPoint($route, $_SERVER['REQUEST_METHOD'], new \Ijdb\IjdbRoutes());
	$entryPoint->run();
}
catch (PDOException $e) {
	$title = 'An error has been occurred';

	$output = 'Database Error: ' . $e->getMessage() . ', Location: ' .
	$e->getFile() . ':' . $e->getLine();

	include  __DIR__ . '/../templates/layout.html.php';
}