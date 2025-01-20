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
            $sql = "SELECT * FROM users WHERE role != 'admin' AND status != 'pending' LIMIT 3";
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

        public function removeUser($id){
            try {
                $sql = "DELETE FROM users WHERE id = :id";
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute(["id" => $id]);
            } catch (PDOException $e) {
                error_log("error removing user ." . $e->getMessage());
                return false;
            }
        }

        public function manageStatus($id){
            try {
                $sql = "UPDATE users SET status = active ? ban : active WHERE id = $id";
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute(["id" => $id]);
            } catch (PDOException $e) {
                error_log("error updating status ." . $e->getMessage());
                return false;
            }
        }


    }