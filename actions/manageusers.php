<?php

    require_once "../Config/Database.php";
    require "../Classes/Tag.php";
    require "../Classes/Category.php";

    if($_SESSION["role"] === 'admin'){

        $admin = new Admin(null, null, null, "admin");

        if(isset($_POST["delete"])){
            $id = $_POST["user_id"] ?? "";
            $admin->removeUser($id);
        }
        
        $users = $admin->getUsers() ?? [];

    }