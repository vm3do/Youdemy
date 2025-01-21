<?php

    require "/Course.php";

    class Video extends Course {

        private $content_type;
        private $content;

        public function __construct($title, $description, $teacher_id, $category_id, $tags, $content_type = "video", $content) {

            parent::__construct($title, $description, $teacher_id, $category_id, $tags);
            $this->content_type = $content_type;
            $this->content = $content;
        }

        public function addCourse(){
            try{

                $title = $this->title;
                $description = $this->description;
                $teacher_id = $this->teacher_id;
                $category_id = $this->category_id;
                $tags = $this->tags;
                $content_type = $this->content_type;
                $content = $this->content;

                if(empty($title) || empty($description) || empty($teacher_id) || empty($category_id) || empty($tags)){
                    return ["succes" => false, "All inputs are required !"];
                }

                $sql = "INSERT INTO courses(title , description, content_type, content, teacher_id, category_id)
                        VALUES (:title , :description, :content_type, :content, :teacher_id, :category_id)";

                $stmt = $this->pdo->prepare($sql);
                $return = $stmt->execute([
                    "title" => $title,
                    "description" => $description,
                    "content_type" => $content_type,
                    "content" => $content,
                    "teacher_id" => $teacher_id,
                    "category_id" => $category_id
                ]);
                
                if($return){
                    $id = $stmt->lastInsertedId();
                    $sql = "INSERT INTO course_tags(tag_id, course_id) VALUES (:t_id, :c_id)";
                    
                }






            } catch(PDOException $e){

                error_log("error uploading a video : " . $e->getMessage());
                return ["success" => false, "message" => "error creating the course"];

            }
        }

    }