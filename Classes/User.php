<?php

    require_once __DIR__ . "/../Config/Database.php";

    class User {
        protected $name;
        protected $email;
        protected $pass;
        protected $role;
        protected $status;
        protected $pdo;


        public function __construct($name, $email, $pass, $role)
        {
            $this->name = $name;
            $this->email = $email;
            $this->pass = $pass;
            $this->role = $role;
            $this->status = "active";
            $instance = Database::getinstance();
            $this->pdo = $instance->getconn();
        }

        public function signup(){

            if(empty($this->name) || empty($this->email) || empty($this->pass)) {
                return ["message" => "All fields are required!"];
            }

            if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
                return ["message" => "Enter a valid email!"];
            }

            if(strlen($this->pass) < 6){
                return ["message" => "Password must be at least 6 characters"];
            }

            $sql = "SELECT * FROM users WHERE email = :email";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(["email"=> $this->email]);
            
            if($stmt->rowCount() > 0){
                return ["message"=> "Email already exists, please use a different email"];
            }

            $pass = password_hash($this->pass, PASSWORD_DEFAULT);

            try{
                $sql = "INSERT INTO users (name, email, password, role, status) VALUES (:name, :email, :pass, :role, :status)";
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute([
                    "name" => htmlspecialchars($this->name),
                    "email" => htmlspecialchars(trim($this->email)),
                    "pass" => password_hash($this->pass, PASSWORD_DEFAULT),
                    "role" => htmlspecialchars(trim($this->role)),
                    "status" => $this->status,
                ]);

                return true;

            } catch(PDOException $e){
                error_log("Error signing up: " . $e->getMessage());
                return ["message"=> "Could not sign up, please try again later"];
            }
        }

        public function login(){
            try {
                $sql = "SELECT * FROM users WHERE email = :email";
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute(["email" => $this->email]);
                if($stmt->rowCount() > 0){
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    if(password_verify($this->pass, $row['password'])){
                        return ["verify" => true, "user_id" => $row['id'], "role" => $row['role'], "status" => $row['status'], "name" => $row['name']];
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