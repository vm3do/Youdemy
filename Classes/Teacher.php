<?php

    require_once __DIR__ . "/User.php";

    class Teacher extends User {

        public function __construct($name, $email, $pass, $role ){

            parent::__construct($name, $email, $pass, $role); ///////////////
            $this->status = "pending"; ////////

        }

        public function signup(){
            
            return parent::signup();
        
        }

        public static function activate($id){
            try{

                $db = Database::getinstance();
                $pdo = $db->getconn();

                $sql = "UPDATE users SET status = 'active' WHERE id = :id AND role = 'teacher'";
                $stmt = $pdo->prepare($sql);
                $stmt->execute(["id" => $id]);

                return true;


            } catch (PDOException $e) {
                error_log("error accepting the teacher :" . $e->getMessage());
                return false;
            }
        }

        public static function reject($id){
            try{

                $db = Database::getinstance();
                $pdo = $db->getconn();

                $sql = " DELETE FROM users WHERE id = :id ";
                $stmt = $pdo->prepare($sql);
                $stmt->execute(["id" => $id]);

                return true;

            } catch (PDOException $e) {
                error_log("error rejecting the teacher :" . $e->getMessage());
                return false;
            }
        }

        public function courseCount($id){

            try{

                $sql = " SELECT COUNT(*) as total_courses FROM courses WHERE teacher_id = :id ";
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute(["id" => $id]);

                return $stmt->fetch();


            } catch (PDOException $e) {
                error_log("error fetching the count :" . $e->getMessage());
                return false;
            }
        }

        public function getstudents($id){
            try{

                $sql = "SELECT COUNT(e.id) AS students FROM enrollments e
                        INNER JOIN courses c ON c.id = e.course_id
                        INNER JOIN users u ON u.id = c.teacher_id GROUP BY u.id
                        HAVING u.id = :id";
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute(["id" => $id]);

                return $stmt->fetch(PDO::FETCH_ASSOC);

            } catch (PDOException $e) {
                error_log("error fetching the students :" . $e->getMessage());
                return false;
            }
        }

        public function courses($id){
            try{

                $sql = "SELECT * FROM courses WHERE teacher_id = :id";
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute(["id" => $id]);

                return $stmt->fetchAll(PDO::FETCH_ASSOC);

            } catch (PDOException $e) {
                die("error fetching the courses :" . $e->getMessage());
                return false;
            }
        }
    }