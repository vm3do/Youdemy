<?php 

    class Car{

        private $name;
        private $speed;

        public function __construct($name, $speed)
        {
            $this->name = $name;
            $this->speed = $speed;
        }

        public function getName(){
            return $this->name;
        }

        public function getSpeed(){
            return $this->speed;
        }

        public function setName($name){
            $this->name = $name;
        }

        public function setSpeed($speed){
            $this->speed = $speed;
        }

    }


