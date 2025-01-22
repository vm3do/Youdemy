<?php

    require_once "../Config/Database.php";
    require_once "../Classes/Tag.php";
    require_once "../Classes/Video.php";
    require_once "../Classes/Text.php";
    require_once "../Classes/Category.php";

    if(isset($_POST["delete"])){
        $id = $_POST["course_id"] ?? "";
        Course::deleteCourse($id);
    }

    if($_SESSION["role"] === 'student'){
        $student = new Teacher(null, null, null, "teacher");
        $student = $_SESSION["user_id"];

        $tags = new Tag();
        $tags = $tags->getTags() ?? [];

        $category = new Category();
        $categories = $category->getcategories() ?? [];
        
    }