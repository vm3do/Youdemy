<?php

    require_once __DIR__ . "/Users.php";

    class Teacher extends User {

        public function signup($name, $email, $password, $role, $status = "pending"){

            return parent::signup($name, $email, $password, $role, $status);
        
        }
    }