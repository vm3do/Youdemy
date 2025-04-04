<?php

    class Auth {

        static function checkRole($role){
            
            session_start();

            if(!isset($_SESSION['role'])){
                header("Location: login");
                exit();
            }

            if($_SESSION['role'] != $role){
                session_unset();
                session_destroy();
                header("Location: invalid");
                exit();
            }
        }
        static function redirect(){
            session_start();

            if(isset($_SESSION['role'])){
                if($_SESSION['role'] == "admin"){
                    header("Location: dashboard");
                    exit();
                }
                if($_SESSION['role'] == "teacher"){
                    header("Location: teacher/dashboard");
                    exit();
                }
            }
        }

        static function checkLogin(){ 
            session_start();
            if(isset($_SESSION['role'])){
                switch($_SESSION['role']){
                    case "admin":
                        header("Location: admin.php");
                        exit();
                        break;

                    case "teacher":
                        header("Location: teacher.php");
                        exit();
                        break;

                    case "student":
                        header("Location: index.php");
                        exit();
                        break;
                }
            }
    }
}