<?php
// public/index.php

// Démarrer la session (optionnel)
session_start();

// Définir le chemin absolu de l'application
define('ROOT', dirname(__DIR__));

// Charger les classes automatiquement
spl_autoload_register(function ($class) {
    // Vérifier dans core/
    if (file_exists(ROOT . '/core/' . $class . '.php')) {
        require_once ROOT . '/core/' . $class . '.php';
    }
    // Vérifier dans app/controllers/
    elseif (file_exists(ROOT . '/app/controllers/' . $class . '.php')) {
        require_once ROOT . '/app/controllers/' . $class . '.php';
    }
    // Vérifier dans app/models/
    elseif (file_exists(ROOT . '/app/models/' . $class . '.php')) {
        require_once ROOT . '/app/models/' . $class . '.php';
    }
});

// Initialiser le routeur
$router = new Router();

// Définir les routes
$router->add('/', 'HomeController@index');
$router->add('/about', 'HomeController@about');

// Récupérer l'URI actuelle
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Définir la base path si le projet est dans un sous-dossier
$basePath = '/';
$uri = str_replace($basePath, '', $uri);

// Définir la route à dispatcher
$router->dispatch($uri);
