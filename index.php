<?php 
class Animal{
    protected $name;
    protected $age;
    protected $color;

    function __construct($name, $age, $color){
        $this->name = $name;
        $this->age = $age;
        $this->color = $color;
    }

    function getInfo(){
        return "Name: " . $this->name . ", Age: " . $this->age . ", Color: " . $this->color;
    }

    protected function run(){
        return $this->name . " is running.";
    }

    function speed(){
        echo $this->run();
        echo "<br>";
        return $this->name . " is running at a speed of 20 km/h.";
    }
    function getName(){
        return $this->name;
    }
    function setName($name){
        $this->name = $name;
    }
}

?>
<h3>封裝</h3>
<?php
$dog = new Animal("Buddy", 3, "Brown");

//echo $dog->name;
echo $dog->getName();
echo "<br>";
echo $dog->getInfo();
echo "<br>";
//echo $dog->run();
echo "<br>";
echo $dog->speed();
echo "<br>";
$dog->setName('MAX');
echo $dog->getName();
echo "<br>";
echo "<hr>";
$cat = new Animal("Mini", 4, "Black");

//echo $dog->name;
echo $cat->getName();
echo "<br>";
echo $cat->getInfo();
echo "<br>";
//echo $cat->run();
echo "<br>";
echo $cat->speed();
echo "<br>";
$cat->setName('MAX');
echo $cat->getName();
echo "<br>";

?>
<h3>繼承</h3>
<?php
class Cat extends Animal{

    function sound(){
        return $this->name . " says Meow!";
    }

    protected function run(){
        return $this->name . " is running gracefully.";
    }

}
class Dog extends Animal{

    function sound(){
        return $this->name . " says woof!";
    }
    protected function run(){
        return $this->name . " is running energetically.";
    }

}


$cat = new Cat("Pinky", 4, "White");
$cat->getName();
echo "<br>";
echo $cat->getInfo();
echo "<br>";
echo $cat->speed();
echo "<br>";
echo $cat->sound();

$dog = new Dog("Rocky", 5, "Black");
$dog->getName();
echo "<br>";
echo $dog->getInfo();
echo "<br>";
echo $dog->speed();
echo "<br>";
echo $dog->sound();
?>

