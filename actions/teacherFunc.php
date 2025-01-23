<?php

    require_once "../Classes/File.php";

    require_once "../Config/Database.php";
    require_once "../Classes/Tag.php";
    require_once "../Classes/Video.php";
    require_once "../Classes/Text.php";
    require_once "../Classes/Category.php";

    if(isset($_POST["delete"])){
        $id = $_POST["course_id"] ?? "";
        Course::deleteCourse($id);
    }

    if($_SESSION["role"] === 'teacher'){
        $teacher = new Teacher(null, null, null, "teacher");
        $teacher_id = htmlspecialchars($_SESSION["user_id"]);

        $teacher->courseCount($teacher_id);

        $tags = new Tag();
        $tags = $tags->getTags() ?? [];

        $category = new Category();
        $categories = $category->getcategories() ?? [];

        $courses = Course::getCourses() ?? [];

        $students = $teacher->getstudents($teacher_id);
    }

    if(isset($_POST['addCourse'])){

        $title = $_POST["title"] ?? "";
        $description = $_POST["description"] ?? "";
        $teacher_id = $_SESSION["user_id"];
        $category_id = $_POST["category"] ?? "";
        $course_tags = $_POST["tags"] ?? "";

        if($_POST["contentType"] == "video"){
            $filename = $_FILES['video']['name'];
            $tmpPath = $_FILES['video']['tmp_name'];
            $size = $_FILES['video']['size'];
            $error = $_FILES['video']['error'];

            $file = new File($filename, $tmpPath, $size, $error);
            $return = $file->manageFile();
            $return["message"] = $return["message"] ?? "";
            print_r($return["message"]);

            if($return["success"] == true){
                $content = $return["filepath"];
                $video = new Video($title, $description, $teacher_id,$course_tags, $category_id, "video", $content);
                $addError = $video->addCourse();
            } else {
                return["message"];
            }
        } elseif($_POST["contentType"] == "text"){
            $content = $_POST["text"];
            $text = new Text($title, $description, $teacher_id,$course_tags, $category_id, "text", $content);
            $addError = $text->addCourse();
        }

    }
