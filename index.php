<?php

$request = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

if ($request === '') {
    $request = 'home';
}

$page = __DIR__ . '/pages/' . $request . '.php';

if (file_exists($page)) {
    require $page;
} else {
    http_response_code(404);
    echo "404 Not Found";
}