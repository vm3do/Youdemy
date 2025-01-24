<?php

    require_once "../Config/Database.php";
    require_once "../Classes/Course.php";


    if(isset($_POST["delete"])){
        $id = $_POST["c_id"] ?? "";
        Course::deleteCourse($id);
    }

    $courses = Admin::getCourses();

