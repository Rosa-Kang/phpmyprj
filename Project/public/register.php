<?php

try {
    $controllerName = ucfirst($_GET['controller']) . 'Controller';
    include __DIR__ . '/../controllers/'. $controllerName .'.php';

    include __DIR__ . '/../includes/DatabaseConnection.php';
    include __DIR__ . '/../classes/DatabaseTable.php';

    $controller = new $controllerName($authorsTable);
    $jokesTable = new DatabaseTable($pdo, 'joke', 'id');
    $authorsTable = new DatabaseTable($pdo, 'author', 'id');

    $action = $_GET['action'] ?? 'home';

    if($action == strtolower($action)) {
        $page = $registerController -> $action();
    } else {
        http_response_code(301);
        header('location: index.php?action=' . strtolower($action));
    }

    $title = $page['title'];

    if(isset($page['variables'])) {
        $output = loadTemplate($page['template'],
        $page['variables']);
    } else {
        $output = loadTemplate($page['template']);
    }
} catch (PSOException $e) {
    $title = 'An error has been occurred.';

    $output = 'Database Error: '. $e-> getMessage() . ' Location:' . $e->getFile() . ':' . $e->getLine();
}

include __DIR__ . '/../templates/layout.html.php';