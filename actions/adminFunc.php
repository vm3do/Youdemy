<?php

    require_once "../Config/Database.php";
    require "../Classes/Tag.php";
    require "../Classes/Category.php";

    $tag_msg = "";
    $cat_msg = "";

    if(isset($_POST['add_tags'])){

        $Tags = new Tag();
        $return = $Tags->addTags($_POST['tags']) ;

        $tag_msg = $return["message"];
    }

    if(isset($_POST["del_tag"])){
        $id = $_POST["tag_id"] ?? "";
        $Tags = new Tag($pdo);
        $Tags->deleteTag($id);
    }

    if(isset($_POST['add_cat'])){

        $Category = new Category($pdo);
        $return = $Category->addCategory($_POST['categories']) ;

        $cat_msg = $return["message"];
    }

    if(isset($_POST['del_cat'])){
        $id = $_POST["cat_id"] ?? "";
        $Category = new Category($pdo);
        $Category->deleteCat($id);
    }