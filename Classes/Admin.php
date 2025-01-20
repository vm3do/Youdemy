<?php

    require_once __DIR__ . "/User.php";

    class Admin extends User {

        

        public function getPending(){
            $sql = "SELECT * FROM users WHERE role = 'teacher' AND status = 'pending' ";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        }

        public function threePending(){
            $sql = "SELECT * FROM users WHERE role = 'teacher' AND status = 'pending' LIMIT 3 ";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        }

        public function getUsers(){
            $sql = "SELECT * FROM users WHERE role != 'admin'";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        }

        public function threeUsers(){
            $sql = "SELECT * FROM users WHERE role != 'admin' LIMIT 3";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        }

        public function getCourses(){
            $sql = "SELECT * FROM courses";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        }

        public function threeCourses(){
            $sql = "SELECT * FROM courses LIMIT 3";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        }


    }