<?php

    require_once "../Config/Database.php";

class Tags {

    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    
    public function addTags($str_tags){

        $trim_tags = array_map('trim', explode(',', $str_tags));
        $lower_tags = array_map('strtolower', $trim_tags);
        $rm_empty = array_filter($lower_tags);
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


    public function deleteTag($id){
        try{

            $sql = "DELETE FROM tags WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(["id" => $id]);

        } catch(PDOException $e){

            error_log("error deleting tags : " . $e->getMessage());

        }
    }


    public function getTags(){
        try{
            $sql = "SELECT * FROM tags";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (PDOException $e){
            error_log("error fetching tags : " . $e->getMessage());
            return [];
        }
    }
}