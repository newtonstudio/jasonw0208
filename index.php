<?php
include "Person.php";
include "Engineer.php";

$man = new Person("Adam");
// $man->walk();
// $man->greet();

// unset($man);
// $man2 = new Person("Michael");
// $man2->greet();

// $man3 = new Engineer("Tomson");
// $man3->greet();

echo $man->name;

?>