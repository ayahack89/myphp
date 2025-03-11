<?php

$routes = [
    '/' => 'views/home.php',
    '/about' => 'views/about.php',
    '/contact' => 'views/profile.php'
];

function route($uri, $routes) {
    if (isset($routes[$uri])) {
        require $routes[$uri];
    } else {
        http_response_code(404);
        echo "404 - Page Not Found";
    }
}
?>