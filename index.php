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
    'login' => 'pages/login.php',
    'register' => 'pages/signup.php',
    'courses' => 'pages/courses.php',
    'course/details' => 'pages/coursedetails.php',
    'mycourses' => 'pages/mycourses.php',
    'course/enrolled' => 'pages/enrolledcourse.php',
    'teacher/dashboard' => 'pages/teacher.php',
    'course/edit' => 'pages/manageusers.php',
    'dashboard' => 'pages/admin.php',
    'manage/users' => 'pages/manageusers.php',
    'pending' => 'pages/manageteachers.php',
    'manage/courses' => 'pages/managecourses.php',
    'invalid' => 'pages/invalid.php',
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