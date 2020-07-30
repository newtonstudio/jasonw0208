<?php
class Animal {
    private $name = "";
    private $speed = 0;

    public function __construct($name){
        $this->name = $name;
    }

    public function getName(){
        return $this->name;
    }
    public function getSpeed(){
        return $this->speed;
    }

    public function greet() {
        echo "Hello Everyone, my name is ".$this->name."<br/>";
    }

    public function prepare(){
        $random = rand(1,10);
        $this->speed = $random;
    }
}
?>