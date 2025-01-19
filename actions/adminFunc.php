<?php

    require_once "../Config/Database.php";
    require "../Classes/Tags.php";
    require "../Classes/Category.php";

    $db = new Database();
    $pdo = $db->conn();

    $tag_msg = "";
    $cat_msg = "";

    if(isset($_POST['add_tags'])){

        $Tags = new Tags($pdo);
        $return = $Tags->addTags($_POST['tags']) ;

        $tag_msg = $return["message"];
    }

    if(isset($_POST["del_tag"])){
        $id = $_POST["tag_id"] ?? "";
        $Tags = new Tags($pdo);
        $Tags->deleteTag($id);
    }

    if(isset($_POST['add_categories'])){
        
    }