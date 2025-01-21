<?php

    require_once "../Config/Database.php";
    require "../Classes/Tag.php";
    require "../Classes/File.php";
    require "../Classes/Category.php";

    $tag_msg = "";
    $cat_msg = "";

    if(isset($_POST['addcourse'])){

        $title = $_POST["title"];
        $description = $_POST["description"];
        $teacher_id = $_SESSION["user_id"];
        $category_id = $_POST["cat_id"];
        $title = $_POST["title"];

        if(isset($_FILES["video"])){
            $filename = $_FILES['video']['name'];
            $tmpPath = $_FILES['video']['tmp_name'];
            $size = $_FILES['video']['size'];
            $error = $_FILES['video']['error'];

            $file = new File($filename, $tmpPath, $size, $error);
            $return = $file->manageFile();

            if($return["success"] == true){
                $video = new Video();
            }
        }

        $tag_msg = $return["message"];
    }

    if(isset($_POST["del_tag"])){
        $id = $_POST["tag_id"] ?? "";
        $Tags = new Tag();
        $Tags->deleteTag($id);
    }

    if(isset($_POST['add_cat'])){

        $Category = new Category();
        $return = $Category->addCategory($_POST['categories']) ;

        $cat_msg = $return["message"];
    }

    if(isset($_POST['del_cat'])){
        $id = $_POST["cat_id"] ?? "";
        $Category = new Category();
        $Category->deleteCat($id);
    }

    if(isset($_POST["activate"])){
        $id = $_POST["teacher_id"] ?? "";
        Teacher::activate($id);
    }

    if(isset($_POST["reject"])){
        $id = $_POST["teacher_id"] ?? "";
        Teacher::reject($id);
    }

    if(isset($_POST["ban"]) || isset($_POST["unban"])){
        $id = $_POST["user_id"] ?? "";
        $admin = new Admin(null, null, null, null);
        $admin->manageStatus($id);
    }

    if(isset($_POST["delete"])){
        $id = $_POST["user_id"] ?? "";
        $admin = new Admin(null, null, null, null);
        $admin->removeUser($id);
    }

    if($_SESSION["role"] === 'teacher'){
        $teacher = new Teacher(null, null, null, "teacher");
        // $teachers = $admin->threePending() ?? [];
        // $users = $admin->threeUsers() ?? [];
        // $courses = $admin->threeCourses() ?? [];

        $tags = new Tag();
        $tags = $tags->getTags();

        $category = new Category();
        $categories = $category->getcategories();
    }

