<?php

    require_once "../Config/Database.php";
    require_once "../Classes/Tag.php";
    require_once "../Classes/Video.php";
    require_once "../Classes/Text.php";
    require_once "../Classes/Student.php";
    require_once "../Classes/Category.php";

    if(isset($_POST["enroll"])){
        $id = $_SESSION["user_id"] ?? "";
        $course = $_POST["course_id"] ?? "";

        Course::enroll($id, $course);
        header("Location: mycourses.php");
        exit();
    }

    if($_SESSION["role"] === 'student'){
        $student = new student(null, null, null, "student");
        $id = $_SESSION["user_id"];

        $enrolleds = $student->getEnrolled($id);

        $tags = new Tag();
        $tags = $tags->getTags() ?? [];

        $category = new Category();
        $categories = $category->getcategories() ?? [];

    }