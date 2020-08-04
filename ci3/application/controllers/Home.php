<?php
class Home extends CI_Controller {

    private $data = [];

    public function homepage(){

        $this->load->model("Album_model");
        $albumList = $this->Album_model->get_where();
        $this->data['albumList'] = $albumList;
        $this->load->view("header");
        $this->load->view("homepage", $this->data);
        $this->load->view("footer");

    }

    public function detailpage($id=1){

        $this->load->model("Album_model");
        $detail = $this->Album_model->getOne([
            'id' => $id,
        ]);
        $this->data['detail'] = $detail;
        $this->load->view("header");
        $this->load->view("detailpage", $this->data);
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
        $data = $this->Album_model->getOne([
             'is_deleted' => 0,
             'id' => 2,
        ]);
        print_r($data);
    


    }
}
?>