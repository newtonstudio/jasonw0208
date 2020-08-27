<?php
class Api_event_manage extends CI_Controller {

    public function restore(){

        header('Content-Type: application/json; charset=utf-8');
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");


	    if(isset($_SERVER["CONTENT_TYPE"]) && strpos($_SERVER["CONTENT_TYPE"], "application/json") !== false) {
            $_POST = array_merge($_POST, (array) json_decode(trim(file_get_contents('php://input')), true));

            $name = $this->input->post("name", true);
            $password = $this->input->post("password", true);

            $this->load->model("Eventbackup_model");

            $eventData = $this->Eventbackup_model->getOne([
                'name' => $name,
                'password' => $password,
                'is_deleted' => 0,
            ]);

            if(!empty($eventData)) {

                echo json_encode([
                    'status' => "OK",
                    'result' => [
                        'eventList' => $eventData['eventList'],
                        'profile'   => $eventData['profile'],
                    ],
                ]);

            } else {

                echo json_encode([
                    'status' => "ERROR",
                    'result' => "Invalid Name or password",
                ]);

            }
                
        }

    }

    public function backup(){

        header('Content-Type: application/json; charset=utf-8');
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");


	    if(isset($_SERVER["CONTENT_TYPE"]) && strpos($_SERVER["CONTENT_TYPE"], "application/json") !== false) {
            $_POST = array_merge($_POST, (array) json_decode(trim(file_get_contents('php://input')), true));

            $eventList = $this->input->post("eventList", true);
            $profile = $this->input->post("profile", true);
            $name = $this->input->post("name", true);
            $password = $this->input->post("password", true);

            

            $this->load->model("Eventbackup_model");

            $eventData = $this->Eventbackup_model->getOne([
                'name' => $name,
                'password' => $password,
                'is_deleted' => 0,
            ]);

            if(!empty($eventData)) {

                $this->Eventbackup_model->update([
                    'id' => $eventData['id']
                ], [
                    'eventList' => $eventList,
                    'profile'   => $profile,
                    'modified_date' => date("Y-m-d H:i:s"),
                ]);

                $event_id = $eventData['id'];

            } else {

                $event_id = $this->Eventbackup_model->insert([
                    'name'      => $name,
                    'password'  => $password,
                    'eventList' => $eventList,
                    'profile'   => $profile,
                    'created_date' => date("Y-m-d H:i:s"),
                ]);

            }

            echo json_encode([
                'status' => "OK",
                'result' => $event_id,
            ]);

            
            
            
                
        }

        

    }

}
?>