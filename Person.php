<?php
class Person {
    //private, public, protected
    protected $name = "Jason";
    public $dob = "1980-03-12";
    
    //constructor
    //建构子
    //every time you new the object, will call this function
    public function __construct($name){
        $this->name = $name;
        echo "I'm alive <br/>";
    }

    public function walk(){
        echo "walking....<br/>";
    }
    public function greet(){
        echo "Hello everyone, my name is ".$this->name."<br/>";
    }

    //destructor
    //解构子
    //everytime this object been destroyed， will call this function
    public function __destruct() {
        echo "I'm dying...<br/>";
    }

}
?>