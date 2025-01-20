<?php

    class Database {
        
        private static $instance = NULL;
        private $pdo;

        private function __construct()
        {
            $dsn = "mysql:host=localhost;dbname=youdemy";
            $user = "root";
            $pass = "";

            try{

                $this->pdo = new PDO($dsn, $user, $pass);
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            } catch(PDOException $e) {
                die("Error connecting : " . $e->getMessage());
            }
        }

    public static function getinstance(){

        if(self::$instance === NULL){
            return new Database();
        }
        return self::$instance;

    }

    public function getconn(){
        return $this->pdo;
    }
    

}