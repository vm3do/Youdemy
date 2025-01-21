<?php

    require "../Config/Database.php";



    abstract class Course{

        protected $pdo;
        protected $title;
        protected $description;
        protected $background;
        protected $teacher_id;
        protected $tags;
        protected $category_id;

        public function __construct($title, $description, $background, $teacher_id,$tags, $category_id){
            $this->title = $title;
            $this->description = $description;
            $this->background = $background;
            $this->teacher_id = $teacher_id;
            $this->tags = $tags;
            $this->category_id = $category_id;

            $instance = Database::getinstance();
            $this->pdo = $instance->getconn();

        }

        public function addCourse(){}
        

        public static function deleteCourse(){
            
        }



    }