<?php
function my_autoloader($class) {
    include $class . '.php';
}
spl_autoload_register("my_autoloader");

// include "Animal.php";
// include "Rabbit.php";
// include "Tortoise.php";
// include "Person.php";
// include "Game.php";

$game = new Game();

$rabbit = new Rabbit("Roger");
$tortoise = new Tortoise("Michael");
$rabbit2 = new Rabbit("Andy");

$human = new Person("Bob");

$game->applyRace($rabbit);
$game->applyRace($tortoise);
$game->applyRace($rabbit2);
//$game->applyRace($human);

$game->hello();
$game->prepare();
$game->startrace();

?>