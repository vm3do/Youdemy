<?php

$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' ? 'https://' : 'http://';
$domain = $_SERVER['HTTP_HOST'];
define('BASE_URL', $protocol . $domain);

$script_name = dirname($_SERVER['SCRIPT_NAME']);
$uri = $_SERVER['REQUEST_URI'];

// Remove script name from uri
$request = str_replace($script_name, '', $uri);

$request = rtrim($request, '/');

$request = $request ?: 'homepage';

// routes
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
    'course/edit' => 'pages/edit.php',
    'dashboard' => 'pages/admin.php',
    'manage/users' => 'pages/manageusers.php',
    'manage/pending' => 'pages/manageteachers.php',
    'manage/courses' => 'pages/managecourses.php',
    'invalid' => 'pages/invalid.php',
    'logout' => 'actions/logout.php',
];

if (array_key_exists($request, $routes)) {
    include $routes[$request];
} else {
    header("HTTP/1.0 404 Not Found");
    include 'pages/404.php';
    exit();
}

