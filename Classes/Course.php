<?php

    require_once __DIR__ .  "/../Config/Database.php";



    abstract class Course{

        protected $pdo;
        protected $title;
        protected $description;
        protected $background;
        protected $teacher_id;
        protected $tags;
        protected $category_id;

        public function __construct($title, $description, $background, $teacher_id, $tags, $category_id){
            $this->title = $title;
            $this->description = $description;
            $this->background = $background;
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
                    die("error removing course ." . $e->getMessage());
                    return false;
                }

        }

        public static function getCourses(){

            $instance = Database::getinstance();
            $pdo = $instance->getconn();

            try{
                $sql = "SELECT c.*, u.name, ca.name as category FROM courses c INNER JOIN users u ON u.id = c.teacher_id INNER JOIN categories ca ON ca.id = c.category_id";
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
                return $stmt->fetchAll();

            } catch(PDOException $e){
                die("error fetching courses : " . $e->getMessage());
                return false;
            }
        }

        public static function getCourse($id){
            $instance = Database::getinstance();
            $pdo = $instance->getconn();

            try{
                $sql = "SELECT c.*, u.name, ca.name as category FROM courses c INNER JOIN users u ON u.id = c.teacher_id INNER JOIN categories ca ON ca.id = c.category_id WHERE c.id = :id";
                $stmt = $pdo->prepare($sql);
                $stmt->execute(["id" => $id]);
                return $stmt->fetch();
            } catch(PDOException $e){
                die("Error fetching the course by id : " . $e->getMessage());
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

        public static function updateCourse($id, $title, $description, $background, $category_id, $content_type, $content) {
            $instance = Database::getinstance();
            $pdo = $instance->getconn();

            try {
                $sql = "UPDATE courses SET 
                        title = :title, 
                        description = :description, 
                        background = :background, 
                        category_id = :category_id, 
                        content_type = :content_type, 
                        content = :content 
                        WHERE id = :id";
                
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    "id" => $id,
                    "title" => $title,
                    "description" => $description,
                    "background" => $background,
                    "category_id" => $category_id,
                    "content_type" => $content_type,
                    "content" => $content
                ]);
                
                return ["success" => true, "message" => "Course updated successfully!"];
            } catch(PDOException $e) {
                error_log("Error updating course: " . $e->getMessage());
                return ["success" => false, "message" => "Error updating the course."];
            }
        }

        public static function updateCourseTags($course_id, $tags) {
            $instance = Database::getinstance();
            $pdo = $instance->getconn();

            try {
                // delete existing tags
                $sql = "DELETE FROM course_tags WHERE course_id = :course_id";
                $stmt = $pdo->prepare($sql);
                $stmt->execute(["course_id" => $course_id]);
                
                //  add new tags
                if (!empty($tags) && is_array($tags)) {
                    $sql = "INSERT INTO course_tags(tag_id, course_id) VALUES (:tag_id, :course_id)";
                    $stmt = $pdo->prepare($sql);
                    
                    foreach ($tags as $tag) {
                        if (is_int($tag) || is_numeric($tag)) {
                            $stmt->execute(["tag_id" => $tag, "course_id" => $course_id]);
                        } else {
                            error_log("Invalid tag ID: " . $tag);
                        }
                    }
                }
                
                return ["success" => true, "message" => "Course tags updated successfully!"];
            } catch(PDOException $e) {
                error_log("Error updating course tags: " . $e->getMessage());
                return ["success" => false, "message" => "Error updating course tags."];
            }
        }

        public static function getCourseTags($course_id) {
            $instance = Database::getinstance();
            $pdo = $instance->getconn();

            try {
                $sql = "SELECT tag_id FROM course_tags WHERE course_id = :course_id";
                $stmt = $pdo->prepare($sql);
                $stmt->execute(["course_id" => $course_id]);
                
                $tags = [];
                while ($row = $stmt->fetch()) {
                    $tags[] = $row['tag_id'];
                }
                
                return $tags;
            } catch(PDOException $e) {
                error_log("Error getting course tags: " . $e->getMessage());
                return [];
            }
        }

    }