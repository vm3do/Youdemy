<?php

    require_once "../Config/Database.php";

class Tags {

    private $tags;
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function addTags($str_tags){

        $trim_tags = array_map('trim', explode(',', $str_tags));
        $rm_empty = array_filter($trim_tags);
        $tags = array_unique($rm_empty);

        if(empty($tags)){
            return ["verify" => false, "message" => "there should be at least one valid tag"];
        }

        try{
            $sql = "INSERT INTO tags(name) VALUES (:tag)";
            $stmt = $this->pdo->prepare($sql);
            foreach($tags as $tag){
                $stmt->execute(["tag" => $tag]);
            }
            return ["verify" => true, "message" => "Tags added succesfully"];
        } catch(PDOException $e){
            error_log("error adding tags " . $e->getMessage());
            return ["verify" => false,"message" => "Tags not added, Tags may already exist"];
        }
    }
}