<?php
class Game {
    private $members = [];

    public function applyRace(Animal $animal) {
        $this->members[] = $animal;
    }

    public function hello() {

        foreach($this->members as $v) {
            $v->greet();
        }

    }

    public function prepare() {
        foreach($this->members as $v) {
            $v->prepare();
        }
    }

    public function startrace(){
        $raceArray = [];
        foreach($this->members as $v) {
            
            $name = $v->getName();
            $speed = $v->getSpeed();
            $raceArray[$name] = $speed;

        }
        arsort($raceArray);

        $i=0;
        foreach($raceArray as $k=>$v) {

            if($i==0) {
                echo "The champion is ".$k." with speed of ".$v."<br/>";
            } else {
                echo "The following is ".$k." with speed of ".$v."<br/>";
            }

            $i++;
        }


    }


}
?>