<?php
include "IHero.php";
include "IMalaysia.php";

class Kacangman implements IHero, IMalaysia {

    public function move() {
        echo "walk like a kacang.... <br/>";
    }

    public function showSuperPower() {
        echo "(throw a lot of kacang at floor ...)";
    }

    public function speakMalay(){
        echo "Saya Malaysian";
    }

    public function knowHowToSayLah() {
        echo "Bro, dont like this lah...";
    }

}
?>