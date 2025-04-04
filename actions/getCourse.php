<?php

    require_once __DIR__ . "/../Classes/Course.php";

    if(isset($_POST["course_id"])){
        $course = Course::getCourse($_POST["course_id"]) ?? "";
    }
    if(isset($_GET["id"])){
        $course = Course::getCourse($_GET["id"]) ?? "";
    }