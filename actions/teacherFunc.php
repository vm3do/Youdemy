<?php

    require_once "../Classes/File.php";

    require_once "../Config/Database.php";
    require_once "../Classes/Tag.php";
    require_once "../Classes/Video.php";
    require_once "../Classes/Text.php";
    require_once "../Classes/Category.php";

    $tag_msg = "";
    $cat_msg = "";

    if($_SESSION["role"] === 'teacher'){
        $teacher = new Teacher(null, null, null, "teacher");

        $tags = new Tag();
        $tags = $tags->getTags();

        $category = new Category();
        $categories = $category->getcategories() ?? [];
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

    

    if(isset($_POST["delete"])){
        $id = $_POST["user_id"] ?? "";
        $admin = new Admin(null, null, null, null);
        $admin->removeUser($id);
    }

