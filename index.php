<?php
// index.php - The main entry point for the e-cargo application

// Current date and time in UTC
// Initialize timezone
date_default_timezone_set('UTC');
$currentDateTime = date('Y-m-d H:i:s');

// Routing logic
$requestUri = $_SERVER['REQUEST_URI'];
$parts = explode('/', trim($requestUri, '/'));
$route = $parts[0]; // Get the first part of the URI

switch ($route) {
    case 'home':
        echo "Welcome to the e-cargo application! Current Time: $currentDateTime";
        break;
    case 'about':
        echo "This is the about page. Current Time: $currentDateTime";
        break;
    case 'contact':
        echo "This is the contact page. Current Time: $currentDateTime";
        break;
    default:
        echo "404 Not Found. Current Time: $currentDateTime";
        break;
}