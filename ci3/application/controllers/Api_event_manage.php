<?php
class Api_event_manage extends CI_Controller {

    public function backup(){

        header('Content-Type: application/json; charset=utf-8');
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

        echo json_encode([
            'status' => "OK",
            'result' => "1",
        ]);

    }

}
?>