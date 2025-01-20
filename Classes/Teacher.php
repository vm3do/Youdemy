<?php

    require_once __DIR__ . "/User.php";

    class Teacher extends User {

        public function __construct($name, $email, $pass, $role ){

            parent::__construct($name, $email, $pass, $role);
            $this->status = "pending";

        }

        public function signup(){
            
            return parent::signup();
        
        }
    }