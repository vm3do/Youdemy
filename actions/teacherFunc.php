<?php

    require_once "../Classes/File.php";

    require_once "../Config/Database.php";
    require_once "../Classes/Tag.php";
    require_once "../Classes/Video.php";
    require_once "../Classes/Category.php";

    $tag_msg = "";
    $cat_msg = "";

    if($_SESSION["role"] === 'teacher'){
        $teacher = new Teacher(null, null, null, "teacher");
        // $teachers = $admin->threePending() ?? [];
        // $users = $admin->threeUsers() ?? [];
        // $courses = $admin->threeCourses() ?? [];

        $tags = new Tag();
        $tags = $tags->getTags();

        $category = new Category();
        $categories = $category->getcategories() ?? [];
    }

    if(isset($_POST['addcourse'])){

        $title = $_POST["title"];
        $description = $_POST["description"];
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

            if($return["success"] == true){
                // $video = new Video($title, $description, $teacher_id, $category_id, $course_tags, "video", $return["filepath"]);
                $video = new Video("hhbhbj", "khjhbjh", "video", "jhbjhbjh", 2, 7, "video", "C:\xampp\htdocs\Youdemy\Classes/videos/video_67900d4c01c514.00364338.mp4");
                print_r($return["filepath"]);
                // $addError = $video->addCourse();
            } else {
                return["message"];
            }
        }

        // $tag_msg = $return["message"] ??;
    }

    

    if(isset($_POST["delete"])){
        $id = $_POST["user_id"] ?? "";
        $admin = new Admin(null, null, null, null);
        $admin->removeUser($id);
    }

