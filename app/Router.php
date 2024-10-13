<?php

namespace App;

use Exception;

class Router {
    private array $routes = [];

    public function __construct() {
        $this->loadRoutes();
        session_start(); // Démarrage de la session pour toute l'application
    }

    private function loadRoutes() {
        $controllers = [
            'App\Controllers\HomeController',
            'App\Controllers\ArticleController',
            // Ajoutez d'autres contrôleurs ici si nécessaire
        ];

        foreach ($controllers as $controllerClass) {
            $routes = $controllerClass::getRoutes();
            foreach ($routes as $path => $method) {
                $this->routes[$path] = [$controllerClass, $method];
            }
        }
    }

    public function handleRequest(string $requestUri, string $httpMethod = 'GET') {
        $parsedUrl = parse_url($requestUri);
        $path = rtrim($parsedUrl['path'] ?? '', '/');

        if ($path === '') {
            $path = '/';
        }

        foreach ($this->routes as $routePattern => $handler) {
            $regexPattern = $this->convertToRegex($routePattern);
            
            if (preg_match($regexPattern, $path, $matches)) {
                array_shift($matches);

                list($controllerClass, $method) = $handler;

                $controller = $this->createController($controllerClass);

                if (method_exists($controller, $method)) {
                    call_user_func_array([$controller, $method], $matches);
                    return;
                } else {
                    throw new Exception("Méthode $method non trouvée dans le contrôleur $controllerClass");
                }
            }
        }

        http_response_code(404);
        echo "404 - Route non trouvée";
    }

    private function convertToRegex(string $routePattern): string {
        $patterns = [
            '{id}' => '(\d+)',
            '{days}' => '(\d+)',
            '{action}' => '(\w+)',
            '{type}' => '([\w\-]+)'
        ];

        $escapedPattern = preg_quote($routePattern, '/');
        foreach ($patterns as $key => $regex) {
            $escapedPattern = str_replace(preg_quote($key, '/'), $regex, $escapedPattern);
        }

        return '/^' . $escapedPattern . '$/';
    }

    private function createController(string $controllerClass) {
        if (!class_exists($controllerClass)) {
            throw new Exception("Classe $controllerClass introuvable.");
        }
        return new $controllerClass();
    }
}