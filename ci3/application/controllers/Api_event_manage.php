<?php
class Api_event_manage extends CI_Controller {

    public function backup(){

        header('Content-Type: application/json; charset=utf-8');
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");


	    if(isset($_SERVER["CONTENT_TYPE"]) && strpos($_SERVER["CONTENT_TYPE"], "application/json") !== false) {
            $_POST = array_merge($_POST, (array) json_decode(trim(file_get_contents('php://input')), true));

            $eventList = $this->input->post("eventList", true);
            $profile = $this->input->post("profile", true);

            $this->load->model("Eventbackup_model");

            $event_id = $this->Eventbackup_model->insert([
                'eventList' => $eventList,
                'profile'   => $profile,
                'created_date' => date("Y-m-d H:i:s"),
            ]);
            
            echo json_encode([
                'status' => "OK",
                'result' => $event_id,
            ]);
                
        }

        

    }

}
?>