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
            $sql = "SELECT * FROM courses c";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        }

        public function threeCourses(){
            $sql = "SELECT * FROM courses LIMIT 3";
            $sql = "SELECT c.*, u.name FROM courses c INNER JOIN users u ON c.teacher_id = u.id LIMIT 3";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        }

        public function topCourse(){

            try{
                $sql = "SELECT COUNT(e.course_id) AS enrolls, c.*, u.name FROM enrollments e
                        INNER JOIN courses c ON c.id = e.course_id INNER JOIN users u ON c.teacher_id = u.id
                        GROUP BY e.course_id ORDER BY e.course_id LIMIT 1";
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute();
                return $stmt->fetch(PDO::FETCH_ASSOC);
            } catch (PDOException $e){
                error_log("error fetching top courses : " . $e->getMessage());
                return false;
            }
        }

        public function topTeachers(){

            try{
                $sql = "SELECT COUNT(e.course_id) AS total_students ,c.title, u.name
                        FROM enrollments e INNER JOIN courses c ON c.id = e.course_id
                        INNER JOIN users u ON u.id = c.teacher_id GROUP BY u.id
                        ORDER BY total_students DESC LIMIT 3";

                $stmt = $this->pdo->prepare($sql);
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e){
                error_log("error fetching top courses : " . $e->getMessage());
                return false;
            }
        }



        public function removeUser($id){
            try {
                $sql = "DELETE FROM users WHERE id = :id";
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute(["id" => $id]);
                return true;
            } catch (PDOException $e) {
                error_log("error removing user ." . $e->getMessage());
                return false;
            }
        }

        public function manageStatus($id){
            try {
                $sql = "SELECT status FROM users WHERE id = :id";
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute(["id" => $id]);
                $return = $stmt->fetch(PDO::FETCH_ASSOC);
                if(empty($return)){
                    return false;
                }

                $status = $return["status"] == "active" ? "banned" : "active";
                $sql = "UPDATE users SET status = :status WHERE id = :id";
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute(["id" => $id, "status" => $status]);
                return true;
            } catch (PDOException $e) {
                error_log("error updating status ." . $e->getMessage());
                return false;
            }
        }


    }