<?php 
class Animal{
    public $name;
    public $age;
    public $color;

    function __construct($name, $age, $color){
        $this->name = $name;
        $this->age = $age;
        $this->color = $color;
    }

    function getInfo(){
        return "Name: " . $this->name . ", Age: " . $this->age . ", Color: " . $this->color;
    }

    function run(){
        return $this->name . " is running.";
    }

    function speed(){
        return $this->name . " is running at a speed of 20 km/h.";
    }
}

