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
}
?>