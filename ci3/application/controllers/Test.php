<?php
class Test extends CI_Controller {

    public function testflow(){

        $this->load->library('unit_test');

        $this->load->model("Album_model");

        //TEST 1
        $result = $this->Album_model->addition(2, 2);
        $this->unit->run($result, "my string", "The addition of Album model is correct");

        //TEST 2
        $result = $this->Album_model->addition(3, 1);
        $this->unit->run($result, 4, "The addition of Album model is correct");

        //TEST 3
        $result = $this->Album_model->addition(2, 2);
        $this->unit->run($result, ["test"], "The addition of Album model is correct");


          echo $this->unit->report();



    }


}
?>