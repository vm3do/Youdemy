<?php

require_once "C:/xampp/htdocs/Youdemy/Classes/Users.php";

require_once __DIR__ . "/../Classes/Admin.php";
require_once __DIR__ . "/../Classes/Student.php";
require_once __DIR__ . "/../Classes/Teacher.php";

$db = new Database();
$pdo = $db->conn();

$error = "";

if(isset($_POST['signup'])){
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars(trim($_POST['email']));
    $password = ($_POST['password']);
    $role = htmlspecialchars(trim($_POST['role']));

    if(empty($name) || empty($email) || empty($password)) {
        $error = "All fields are required !";
    }

    elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $error = "Enter a valid email !";
    }

    elseif(strlen($password) < 6){
        $error = "password be at least 6 characters";
    } else {
        if($role === "student"){
            $student = new Student($pdo);
            $return = $student->signup($name, $email, $password, $role);
            if(isset($return['message'])){
                $error = $return['message'];
            } else {
                header("Location: login.php");
                exit();
            }
        } elseif($role === "teacher") {
            $teacher = new Teacher($pdo);
            $return = $teacher->signup($name, $email, $password, $role);
            if(isset($return['message'])){
                $error = $return['message'];
            } else {
                header("Location: login.php");
                exit();
            }
        }
    }
}

if(isset($_POST['login'])){
    $email = htmlspecialchars(trim($_POST['email']));
    $password = $_POST['password'];

    if(empty($email) || empty($password)){
        $error ="all fields are required";
    } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $error = "enter a valid email";
    } else {
        $user = new User($pdo);
        $return = $user->login($email, $password);
        if(!isset($return['verify']) || !$return['verify']){
            $error = $return['message'] ?? "error logging in";
        } else {
            session_start();
            $_SESSION['user_id'] = $return['id'];
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
                case 'admin':
                    header("Location: courses.php");
                    break;
            }
            exit();
        }
    }
}


// if($return['role'] == 'admin'){
//     $admin = new Admin($pdo);
//     session_start();
//     $_SESSION['admin_id'] = $return['user_id'];
//     $_SESSION['role'] = $return['role'];
//     $_SESSION['status'] = $return['status'];
//     $_SESSION['name'] = $return['name'];
//     header("Location: admin.php");
//     exit();
// }
// elseif($return['role'] == 'teacher'){
//     $teacher = new Teacher($pdo);
//     session_start();
//     $_SESSION['teacher_id'] = $return['user_id'];
//     $_SESSION['role'] = $return['role'];
//     $_SESSION['status'] = $return['status'];
//     $_SESSION['name'] = $return['name'];
//     header("Location: teacher.php");
//     exit();
// }
// if($return['role'] == 'student'){
//     $student = new Student($pdo);
//     session_start();
//     $_SESSION['student_id'] = $return['user_id'];
//     $_SESSION['role'] = $return['role'];
//     $_SESSION['status'] = $return['status'];
//     $_SESSION['name'] = $return['name'];
//     header("Location: courses.php");
//     exit();
// }