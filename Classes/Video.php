<?php

require_once "Course.php";

class Video extends Course {
    private $content_type;
    private $content;

    public function __construct($title, $description, $teacher_id, $category_id, $tags,$content_type = "video", $content) {
        parent::__construct($title, $description, $teacher_id, $category_id, $tags);
        $this->content_type = $content_type;
        $this->content = $content;
    }

    public function addCourse() {
        try {
            // Validate required fields
            if (empty($this->title) || empty($this->description) || empty($this->teacher_id)) {
                return ["success" => false, "message" => "All inputs are required!"];
            }

            // Insert the course into the database
            $sql = "INSERT INTO courses(title, description, content_type, content, teacher_id, category_id)
                    VALUES (:title, :description, :content_type, :content, :teacher_id, :category_id)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                "title" => $this->title,
                "description" => $this->description,
                "content_type" => $this->content_type,
                "content" => $this->content,
                "teacher_id" => $this->teacher_id,
                "category_id" => $this->category_id
            ]);

            // Get the last inserted course ID
            $course_id = $this->pdo->lastInsertId();

            // Insert tags into the course_tags table
            if (!empty($this->tags) && is_array($this->tags)) {
                $sql = "INSERT INTO course_tags(tag_id, course_id) VALUES (:tag_id, :course_id)";
                $stmt = $this->pdo->prepare($sql);

                foreach ($this->tags as $tag) {
                    // Ensure each tag is an integer
                    if (is_int($tag)) {
                        $stmt->execute(["tag_id" => $tag, "course_id" => $course_id]);
                    } else {
                        error_log("Invalid tag ID: " . $tag);
                    }
                }
            }

            // Return success message
            return ["success" => true, "message" => "Course added successfully!", "course_id" => $course_id];

        } catch (PDOException $e) {
            // Log the error and return an error message
            error_log("Error uploading a video: " . $e->getMessage());
            return ["success" => false, "message" => "Error creating the course."];
        }
    }
}