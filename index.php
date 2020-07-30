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

// echo $man->dob;
// echo "<br/>";
// $man->dob = "1987-06-02";
// echo $man->dob;
// echo "<br/>";

// echo $man->getDOB();
// echo $man->setDOB("1987-06-02");
// echo $man->getDOB();

$enginner = new Engineer("Elsen");

$enginner->showName();

?>