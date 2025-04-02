<?php
// if (isset($_GET['url'])) {
//     die($_GET['url']);
// } else {
//     die('false');
    
// }

// Get the requested URL
$request = $_GET['url'] ?? 'homepage';

// Remove trailing slash if exists
$request = rtrim($request, '/');

// Define your routes
$routes = [
    '' => 'pages/index.php',
    'homepage' => 'pages/index.php',
    'courses' => 'pages/courses.php',
    'manage' => 'pages/manageusers.php',
    // Add all your other pages here
];

// Check if the route exists
if (array_key_exists($request, $routes)) {
    include $routes[$request];
} else {
    // 404 page
    header("HTTP/1.0 404 Not Found");
    include 'pages/404.php';
    exit();
}