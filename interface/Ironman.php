<?php
include "IHero.php";
class Ironman implements IHero {

    public function move() {
        echo "Dush Dush Dush.... <br/>";
    }

    public function showSuperPower() {
        echo "(left hand show a beam light ...)";
    }

}
?>