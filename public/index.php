<?php

// Define the base path for the application
define('BASEPATH', dirname(__DIR__));

// Handle the request
$requestUrl = isset($_GET['url']) ? $_GET['url'] : '/'; // Default to the homepage if no URL is provided

// Define an array to map URLs to corresponding views
$routes = [
    '/' => 'home.php',
    '/about' => 'chisiamo.php',
    '/articolo' => 'articolo.php',
    '/crea' => 'crea.php',
    '/listaArticoli' => 'listaArticoli.php',
    '/registrati' => 'registrati.php',
];

// Check if the requested URL exists in the routes array
if (array_key_exists($requestUrl, $routes)) {
    // Include the corresponding view file
    include BASEPATH . '/../views/' . $routes[$requestUrl];
} else {
    // Handle 404 Not Found error
    header('HTTP/1.0 404 Not Found');
    echo '404 Not Found';
}
