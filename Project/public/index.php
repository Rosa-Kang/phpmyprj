<?php
try {
    include __DIR__. '../includes/autoload.php';

    $route = ltrim(strtok($_SERVER['REQUEST_URI'], '?'), '/');

    $entryPoint = new EntryPoint($route, new IjdbRoutes());
    $entryPoint -> run();

} catch(PDOException $e) {
    $title = 'An Error has been occurred';

    $output = 'Database error: ' . $e->getMessage() . ', Location:' . $e->getFile(). ':' . $e->getLine();
}

include __DIR__. '/../templates/layout.html.php';