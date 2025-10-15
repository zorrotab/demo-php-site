<?php

class Router {
    private $routes = [];

    public function __construct() {
        $this->routes = [
            'home' => 'pages/home.php',
            'welcome' => 'pages/welcome.php',
        ];
    }

    public function dispatch() {
        $request = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
        
        if (empty($request)) {
            $request = 'home';
        }

        if (array_key_exists($request, $this->routes)) {
            require $this->routes[$request];
        } else {
            http_response_code(404);
            echo "404 Not Found";
        }
    }
}
