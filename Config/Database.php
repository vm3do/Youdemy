<?php

    require_once  __DIR__ . '/../vendor/autoload.php';
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
    $dotenv->load();

    class Database {
        
        private static $instance = NULL;
        private $pdo;

        private function __construct()
        {
            $dsn = "mysql:host={$_ENV['DB_HOST']};dbname={$_ENV['DB_NAME']}";
            $user = $_ENV['DB_USER'];
            $pass = $_ENV['DB_PASS'];

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