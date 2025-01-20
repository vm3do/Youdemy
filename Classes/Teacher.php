<?php

    require_once __DIR__ . "/User.php";

    class Teacher extends User {

        public function __construct($name, $email, $pass, $role ){

            parent::__construct($name, $email, $pass, $role);
            $this->status = "pending";

        }

        public function signup(){
            
            return parent::signup();
        
        }

        static function activate($id){
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

        static function reject($id){
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
    }