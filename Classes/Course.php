<?php

    require_once "../Config/Database.php";



    abstract class Course{

        protected $pdo;
        protected $title;
        protected $description;
        // protected $background;
        protected $teacher_id;
        protected $tags;
        protected $category_id;

        public function __construct($title, $description, $teacher_id,$tags, $category_id){
            $this->title = $title;
            $this->description = $description;
            // $this->background = $background;
            $this->teacher_id = $teacher_id;
            $this->tags = $tags;
            $this->category_id = $category_id;

            $instance = Database::getinstance();
            $this->pdo = $instance->getconn();

        }

        public abstract function addCourse();
        

        public static function deleteCourse($id){

            $instance = Database::getinstance();
            $pdo = $instance->getconn();

                try {
                    $sql = "DELETE FROM courses WHERE id = :id";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute(["id" => $id]);
                    return true;
                } catch (PDOException $e) {
                    error_log("error removing course ." . $e->getMessage());
                    return false;
                }

        }

        public static function getCourses(){

            $instance = Database::getinstance();
            $pdo = $instance->getconn();

            try{
                $sql = "SELECT * FROM courses";
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
                return $stmt->fetchAll();

            } catch(PDOException $e){
                error_log("error fetching courses : " . $e->getMessage());
                return false;
            }
        }

        public static function getCourse($id){
            $instance = Database::getinstance();
            $pdo = $instance->getconn();

            try{
                $sql = "SELECT * FROM courses WHERE id = :id";
                $stmt = $pdo->prepare($sql);
                $stmt->execute(["id" => $id]);
                return $stmt->fetch();
            } catch(PDOException $e){
                error_log("Error fetching the course by id : " . $e->getMessage());
                return false;
            }
        }

        public static function enroll($id , $course){
            $instance = Database::getinstance();
            $pdo = $instance->getconn();

            try {
                $sql = "INSERT INTO enrollments(student_id, course_id) VALUES (:s_id, :c_id)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute(["s_id" => $id, "c_id" => $course]);
                return true;


            } catch(PDOException $e) {
                error_log("error enrolling : " . $e->getMessage());
                return false;
            }
        }



    }