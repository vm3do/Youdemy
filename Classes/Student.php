<?php

    require_once __DIR__ . "/User.php";

    class Student extends User {

        public function getEnrolled($id){
            try {
                
                $sql = "SELECT * FROM users u INNER JOIN enrollments e ON e.student_id = u.id
                                        INNER JOIN courses c ON c.id = e.course_id 
                                        WHERE u.id = :id" ;
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute(["id" => $id]);
                return $stmt->fetchAll(PDO::FETCH_ASSOC);

            } catch (PDOException $e) {
                die("error fetching enrolled courses . " . $e->getMessage());
                
            }
        }

    }