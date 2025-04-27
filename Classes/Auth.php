<?php

    class Auth {

        static function checkRole($role){
            
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }

            if(!isset($_SESSION['role'])){
                header("Location: " . BASE_URL . "/login");
                exit();
            }

            if($_SESSION['role'] != $role){
                session_unset();
                session_destroy();
                header("Location: " . BASE_URL . "/invalid");
                exit();
            }
        }
        static function redirect(){
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }

            if(isset($_SESSION['role'])){
                if($_SESSION['role'] == "admin"){
                    header("Location: " . BASE_URL . "/dashboard");
                    exit();
                }
                if($_SESSION['role'] == "teacher"){
                    header("Location: " . BASE_URL . "/teacher/dashboard");
                    exit();
                }
            }
        }

        static function checkLogin(){ 
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            if(isset($_SESSION['role'])){
                switch($_SESSION['role']){
                    case "admin":
                        header("Location: " . BASE_URL . "/dashboard");
                        exit();
                        break;

                    case "teacher":
                        header("Location: " . BASE_URL . "/teacher/dashboard");
                        exit();
                        break;

                    case "student":
                        header("Location: " . BASE_URL . "/homepage");
                        exit();
                        break;
                }
            }
    }
}