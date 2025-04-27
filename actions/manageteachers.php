<?php

    require_once __DIR__ . "/../Config/Database.php";
    require_once __DIR__ . "/../Classes/Admin.php";


    if($_SESSION["role"] === 'admin'){

        $admin = new Admin(null, null, null, "admin");

        if(isset($_POST["activate"])){
            $id = $_POST["teacher_id"] ?? "";
            Teacher::activate($id);
        }
    
        if(isset($_POST["reject"])){
            $id = $_POST["teacher_id"] ?? "";
            Teacher::reject($id);
        }
        
        $teachers = $admin->getPending() ?? [];

        

    }