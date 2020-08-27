<?php
class Api_event_manage extends CI_Controller {

    public function backup(){

        echo json_encode([
            'status' => "OK",
            'result' => "1",
        ]);

    }

}
?>