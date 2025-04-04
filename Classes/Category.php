<?php

    require_once __DIR__ .  "/../Config/Database.php";

class Category {

    private $pdo;

    public function __construct()
    {
        $instance = Database::getinstance();
        $this->pdo = $instance->getconn();
    }


    public function addCategory($str_cat){

        $trim_cat = array_map('trim', explode(',', $str_cat));
        $lower_cat = array_map('ucwords', $trim_cat);
        $rm_empty = array_filter($lower_cat);
        $category = array_unique($rm_empty);

        if(empty($category)){
            return ["verify" => false, "message" => "there should be at least one valid cat"];
        }

        try{
            $sql = "INSERT INTO categories (name) VALUES (:category)";
            $stmt = $this->pdo->prepare($sql);
            foreach($category as $cat){
                $stmt->execute(["category" => $cat]);
            }
            return ["verify" => true, "message" => "category added succesfully"];
        } catch(PDOException $e){
            error_log("error adding category " . $e->getMessage());
            return ["verify" => false,"message" => "category not added, category may already exist"];
        }
    }


    public function deleteCat($id){
        try{

            $sql = "DELETE FROM categories WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(["id" => $id]);

        } catch(PDOException $e){

            error_log("error deleting category : " . $e->getMessage());

        }
    }


    public function getcategories(){
        try{
            $sql = "SELECT (SELECT COUNT(c.id) FROM categories c) AS total_cats, c.* FROM categories c";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (PDOException $e){
            error_log("error fetching category : " . $e->getMessage());
            return [];
        }
    }
}