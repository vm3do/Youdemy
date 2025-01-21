<?php

require_once "C:/xampp/htdocs/Youdemy/Classes/User.php";

require_once __DIR__ . "/../Classes/Admin.php";
require_once __DIR__ . "/../Classes/Student.php";
require_once __DIR__ . "/../Classes/Teacher.php";

$error = "";

if(isset($_POST['signup'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    if($role === "student"){
        $student = new Student($name, $email, $password, $role);
        $return = $student->signup();
        if(isset($return['message'])){
            $error = $return['message'];
        } else {
            header("Location: login.php");
            exit();
        }
    } elseif($role === "teacher") {
        $teacher = new Teacher($name, $email, $password, $role);
        $return = $teacher->signup();
        if(isset($return['message'])){
            $error = $return['message'];
        } else {
            header("Location: login.php");
            exit();
        }
    }
}

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = new User( null, $email, $password, null);
    $return = $user->login();
    
    if(!isset($return['verify']) || !$return['verify']){
        $error = $return['message'] ?? "Error logging in";
    } else {
        session_start();
        $_SESSION['user_id'] = $return['user_id'];
        $_SESSION['status'] = $return['status'];
        $_SESSION['name'] = $return['name'];
        $_SESSION['role'] = $return['role'];

        switch($return['role']){
            case 'admin':
                header("Location: admin.php");
                break;
            case 'teacher':
                header("Location: teacher.php");
                break;
            case 'student':
                header("Location: courses.php");
                break;
        }
        exit();
    }
}