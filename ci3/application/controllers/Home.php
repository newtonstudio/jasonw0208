<?php
class Home extends CI_Controller {
    public function homepage(){

        $this->load->model("Album_model");
        $albumList = $this->Album_model->get_where();

        $data = [];
        $data['albumList'] = $albumList;

        $this->load->view("header");
        $this->load->view("homepage", $data);
        $this->load->view("footer");

    }

    public function detailpage(){

        $this->load->view("header");
        $this->load->view("detailpage");
        $this->load->view("footer");

    }

    public function test(){

        $this->load->model("Album_model");

        //test insert
        // $this->Album_model->insert([
        //     'title' => "Album A",
        //     'image_url' => NULL,
        //     'description' => "This is album A",
        //     'minutes' => "10 min",
        //     'created_date' => date("Y-m-d H:i:s"),
        // ]);
        
        //test update
        // $this->Album_model->update([
        //     'id' => 2
        // ], [
        //     'title' => "Album B",
        //     'modified_date' => date("Y-m-d H:i:s"),
        // ]);

        //test delete
        // $this->Album_model->delete([
        //     'id' => 3
        // ]);

        //test get_where
        // $datalist = $this->Album_model->get_where([
        //     'is_deleted' => 0,
        // ]);
        // print_r($datalist);

        //test getOne
        // $data = $this->Album_model->getOne([
        //      'is_deleted' => 0,
        // ]);
        // print_r($data);
    


    }
}
?>