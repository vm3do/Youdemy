<?php

require_once __DIR__ . "/../actions/auth.php";
require_once __DIR__ . "/../Classes/Auth.php";
require_once __DIR__ . "/../Classes/Course.php";
require_once __DIR__ . "/../Classes/File.php";
require_once __DIR__ . "/../Classes/Tag.php";
require_once __DIR__ . "/../Classes/Category.php";

Auth::checkRole("teacher");

$course = null;
$courseTags = [];
$tags = [];
$categories = [];
$error = ["success" => false, "message" => ""];
$success = ["success" => false, "message" => ""];

$course_id = $_POST["course_id"] ?? $_GET["course_id"] ?? null;

if (!$course_id) {
    header("Location: " . BASE_URL . "/teacher/dashboard");
    exit;
}

$course = Course::getCourse($course_id);

if (!$course || $course["teacher_id"] != $_SESSION["user_id"]) {
    header("Location: " . BASE_URL . "/teacher/dashboard");
    exit;
}

$courseTags = Course::getCourseTags($course_id);

$tagObj = new Tag();
$tags = $tagObj->getTags();

$categoryObj = new Category();
$categories = $categoryObj->getcategories();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["updateCourse"])) {
    $title = htmlspecialchars(trim($_POST["title"] ?? ""));
    $description = htmlspecialchars(trim($_POST["description"] ?? ""));
    $category_id = htmlspecialchars(trim($_POST["category"] ?? ""));
    $course_tags = $_POST["tags"] ?? [];
    $content_type = $_POST["contentType"] ?? $course["content_type"];
    
    $background = $course["background"];
    
    if (isset($_FILES["background"]) && $_FILES["background"]["error"] == 0) {
        $bgname = $_FILES["background"]["name"] ?? "";
        $bgtmp = $_FILES["background"]["tmp_name"] ?? "";
        $bgsize = $_FILES["background"]["size"] ?? "";
        $bgerror = $_FILES["background"]["error"] ?? "";
        
        $file = new File($bgname, $bgtmp, $bgsize, $bgerror);
        $bgreturn = $file->manageFile();
        
        if ($bgreturn["success"]) {
            $background = $bgreturn["filepath"];
        } else {
            $error = ["success" => false, "message" => $bgreturn["message"] ?? "Error uploading background image"];
        }
    }
    
    $content = $course["content"];
    
    if ($content_type == "video") {
        if (isset($_FILES["video"]) && $_FILES["video"]["error"] == 0) {
            $filename = $_FILES["video"]["name"] ?? "";
            $tmpPath = $_FILES["video"]["tmp_name"] ?? "";
            $size = $_FILES["video"]["size"] ?? "";
            $error = $_FILES["video"]["error"] ?? "";
            
            $file = new File($filename, $tmpPath, $size, $error);
            $return = $file->manageFile();
            
            if ($return["success"]) {
                $content = $return["filepath"];
            } else {
                $error = ["success" => false, "message" => $return["message"] ?? "Error uploading video"];
            }
        }
    } elseif ($content_type == "text") {
        $content = $_POST["text"] ?? $course["content"];
    }
    

    if (!$error["success"] && empty($error["message"])) {
        $updateResult = Course::updateCourse(
            $course_id, 
            $title, 
            $description, 
            $background, 
            $category_id, 
            $content_type, 
            $content
        );
        
        if ($updateResult["success"]) {

            $tagResult = Course::updateCourseTags($course_id, $course_tags);
            
            if ($tagResult["success"]) {
                $success = ["success" => true, "message" => "Course updated successfully!"];
                
                $course = Course::getCourse($course_id);
                $courseTags = Course::getCourseTags($course_id);
            } else {
                $error = $tagResult;
            }
        } else {
            $error = $updateResult;
        }
    }
} 