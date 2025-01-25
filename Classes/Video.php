<?php

require_once "Course.php";

class Video extends Course {
    private $content_type;
    private $content;

    public function __construct($title, $description, $background, $teacher_id, $tags, $category_id, $content_type = "video", $content) {
        parent::__construct($title, $description, $background, $teacher_id, $tags, $category_id);
        $this->content_type = $content_type;
        $this->content = $content;
    }

    public function addCourse() {
        try {

            if (empty($this->title) || empty($this->description) || empty($this->teacher_id) || empty($this->tags) || empty($this->category_id) || empty($this->content)) {
                
                return ["success" => false, "message" => "All inputs are required!"];
            }

            $sql = "INSERT INTO courses(title, description, background, content_type, content, teacher_id, category_id)
                    VALUES (:title, :description, :background, :content_type, :content, :teacher_id, :category_id)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                "title" => $this->title,
                "description" => $this->description,
                "background" => $this->background,
                "content_type" => $this->content_type,
                "content" => $this->content,
                "teacher_id" => $this->teacher_id,
                "category_id" => $this->category_id,
            ]);

            $course_id = $this->pdo->lastInsertId();

            if (!empty($this->tags) && is_array($this->tags)) {
                $sql = "INSERT INTO course_tags(tag_id, course_id) VALUES (:tag_id, :course_id)";
                $stmt = $this->pdo->prepare($sql);

                foreach ($this->tags as $tag) {

                    if (is_int($tag)) {
                        $stmt->execute(["tag_id" => $tag, "course_id" => $course_id]);
                    } else {
                        error_log("Invalid tag ID: " . $tag);
                    }
                }
            }

            return ["success" => true, "message" => "course added successfully!"];

        } catch (PDOException $e) {

            error_log("Error uploading a video: " . $e->getMessage());
            return ["success" => false, "message" => "Error creating the course."];
        }
    }
}