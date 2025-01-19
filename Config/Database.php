<?php

    class Database {
        
        private $dsn = "mysql:host=localhost,dbname=youdemy";
        private $user = "root";
        private $pass = "";

        public function conn(){
            try{
                $pdo = new PDO($this->dsn, $this->user, $this->pass);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $pdo;
            } catch(PDOException $e) {
                die("Error connecting : " . $e->getMessage());
            }
        }
    }