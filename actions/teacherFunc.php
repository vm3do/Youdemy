<?php

    require_once "../Classes/File.php";

    require_once "../Config/Database.php";
    require_once "../Classes/Tag.php";
    require_once "../Classes/Video.php";
    require_once "../Classes/Text.php";
    require_once "../Classes/Category.php";

    $teacher = new Teacher(null, null, null, "teacher");

    if(isset($_POST["delete"])){
        $id = $_POST["course_id"] ?? "";
        Course::deleteCourse($id);
    }

    $bgreturn["success"] = "";
    $return["success"] = "";
    $addError["success"] = "";

    if(isset($_POST['addCourse'])){

        $title = htmlspecialchars(trim($_POST["title"] ?? ""));
        $description = htmlspecialchars(trim($_POST["description"] ?? ""));
        $teacher_id = htmlspecialchars(trim($_SESSION["user_id"] ?? ""));
        $category_id = htmlspecialchars(trim($_POST["category"] ?? ""));
        $course_tags = $_POST["tags"] ?? "";

        if(isset($_FILES["background"])){
            $bgname = $_FILES["background"]["name"] ?? "";
            $bgtmp = $_FILES["background"]["tmp_name"] ?? "";
            $bgsize = $_FILES["background"]["size"] ?? "";
            $bgerror = $_FILES["background"]["error"] ?? "";

            $file = new File($bgname, $bgtmp, $bgsize, $bgerror);
                $bgreturn = $file->manageFile();
                $bgreturn["message"] = $bgreturn["message"] ?? "";
                print_r($bgreturn["message"]);
            if($bgreturn["success"]){
                $background = htmlspecialchars($bgreturn["filepath"]) ?? "";
            } else {
                return $bgreturn["message"];
            }
        }

        if($_POST["contentType"] == "video"){
            $filename = $_FILES['video']['name'] ?? "";
            $tmpPath = $_FILES['video']['tmp_name'] ?? "";
            $size = $_FILES['video']['size'] ?? "";
            $error = $_FILES['video']['error'] ?? "";

            $file = new File($filename, $tmpPath, $size, $error);
            $return = $file->manageFile();

            if($return["success"]){
                $content = $return["filepath"];
                $video = new Video($title, $description, $background ?? "", $teacher_id,$course_tags, $category_id, "video", $content);
                $addError = $video->addCourse();
            } else {
                $return["message"];
            }
        } elseif($_POST["contentType"] == "text"){
            $content1 = $_POST["text"];

            $text = new Text($title, $description, $background ?? "", $teacher_id,$course_tags, $category_id, "text", $content1);
            $addError = $text->addCourse();
        }

    }

    if($_SESSION["role"] === 'teacher'){
        $teacher = new Teacher(null, null, null, "teacher");
        $teacher_id = ($_SESSION["user_id"]);

        $teacher->courseCount($teacher_id);

        $tags = new Tag();
        $tags = $tags->getTags() ?? [];

        $category = new Category();
        $categories = $category->getcategories() ?? [];

        $courses = $teacher->courses($teacher_id) ?? [];

        $coursesCount = $teacher->courseCount($teacher_id) ?? [];

        $students = $teacher->getstudents($teacher_id) ?? [];
    }


    