<?php
require_once 'config/routes.php';

$request = $_SERVER['REQUEST_URI'];

// Fonction pour diriger vers le bon contrôleur en fonction de la route
function route($request) {
    switch ($request) {
        case '/':
            $controller = new HomeController();
            $controller->index();
            break;
        case '/tasks':
            $controller = new TaskController();
            $controller->index();
            break;
        case '/task/create':
            $controller = new TaskController();
            $controller->create();
            break;
        default:
            http_response_code(404);
            echo "404 - Page non trouvée";
            break;
    }
}

route($request);
