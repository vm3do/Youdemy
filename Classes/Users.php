<?php

    require_once __DIR__ . "/../Config/Database.php";

    class User {
        private $id;
        private $name;
        private $email;
        private $pass;
        private $role;
        private $pdo;

        public function __construct($pdo)
        {
            $this->pdo = $pdo;
        }

        public function signup($name, $email, $password, $role, $status = "active"){

                $sql = "SELECT * FROM users WHERE email = :email";
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute(["email"=> $email]);
                
                if($stmt->rowCount() > 0){
                    return ["message"=> "use a different email"];
                }

                $pass = password_hash($password, PASSWORD_DEFAULT);

                try{

                    $sql = "INSERT INTO users (name, email, password, role, status) VALUES (:name, :email, :pass, :role, :status)";
                    $stmt = $this->pdo->prepare($sql);
                    $stmt->execute([
                        "name" => $name,
                        "email" => $email,
                        "pass" => $pass,
                        "role" => $role,
                        "status" => $status,
                    ]);

                    return true;

                } catch(PDOException $e){
                    error_log("error signing up" . $e->getMessage());
                    return ["message"=> "could not sign up, please try again later"];
                }
        }

        public function login($email, $password){

            try {
                $sql = "SELECT * FROM users WHERE email = :email";
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute(["email" => $email]);
                if($stmt->rowCount() > 0){
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    if(password_verify($password, $row['password'])){
                        return ["verify" => true, "user_id" => $row['id'], "role" => $row['role'], "status" => $row['status']];
                    } else {
                        return ["verify" => false,"message" => "email or password incorrect !"];
                    }
                } else {
                    return ["verify" => false,"message" => "email or password incorrect !"];
                }
            } catch(PDOException $e){
                error_log($e->getMessage());
                return ["message" => "something went wrong, try again later"];
            }
        }
    }