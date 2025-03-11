<?php

// require 'Router.php';

// $require_url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// $require_url = rtrim($require_url, '/');

// if ($require_url === ''){
//      $require_url == '/'; 
// }

// routing($require_url, $router);


// declare(strict_types=1);

// $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
// $path = rtrim($path, '/'); 

// switch ($path) {
//      case "":
//      case "/":
//           echo "Home page";
//           break;
//      case "/about":
//           echo "About page";
//           break;
//      default:
//           http_response_code(404);
//           echo "404 - Page Not Found";
// }


declare(strict_types=1);

require 'Router.php';

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$path = rtrim($path, '/');


$base_path = "/routing"; 
$path = str_replace($base_path, '', $path);

// Handle Routes
route($path, $routes);





?>