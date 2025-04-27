<?php

    require_once __DIR__ .  "/../Config/Database.php";
    require __DIR__ .  "/../Classes/Tag.php";
    require __DIR__ .  "/../Classes/Category.php";

    if($_SESSION["role"] === 'admin'){

        $admin = new Admin(null, null, null, "admin");

        if(isset($_POST["delete"])){
            $id = $_POST["user_id"] ?? "";
            $admin->removeUser($id);
        }
        
        $users = $admin->getUsers() ?? [];

    }