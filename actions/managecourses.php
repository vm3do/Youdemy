<?php

    require_once __DIR__ . "/../Config/Database.php";
    require_once __DIR__ . "/../Classes/Course.php";


    if(isset($_POST["delete"])){
        $id = $_POST["c_id"] ?? "";
        Course::deleteCourse($id);
    }

    $courses = Admin::getCourses();

