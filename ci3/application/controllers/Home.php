<?php
class Home extends CI_Controller {

    private $data = [];

    public function testRecursive(){

        $this->load->model("Category_model");

        $result = $this->Category_model->recursiveOutput(0);

        echo json_encode($result);

        //$html = $this->Category_model->recursiveHTML($result, 0);
        //echo $html;

    }

    public function uploadSubmit(){

        if(isset($_FILES['myFile']) && $_FILES['myFile']['error'] == 0) {

            $result = move_uploaded_file($_FILES['myFile']['tmp_name'], "./uploads/".$_FILES['myFile']['name']);

            if($result) {
                echo "Success";
            } else {
                echo "failure";
            }

        }

    }

    public function homepage(){

        $this->load->model("Album_model");
        $albumList = $this->Album_model->get_where();
        $this->data['albumList'] = $albumList;
        $this->load->view("header");
        $this->load->view("homepage", $this->data);
        $this->load->view("footer");

    }

    public function detailpage($id=1, $slug="", $page=1){

        $this->load->model("Album_model");
        $detail = $this->Album_model->getOne([
            'id' => $id,
        ]);
        $this->data['detail'] = $detail;

        $item_per_page = 5;
        $start = ($page - 1) * $item_per_page; // 0,5,10

        $this->load->model("Saleslead_model");
        $leadList = $this->Saleslead_model->fetch([
            'album_id' => $id,
            'is_deleted' => 0,
        ], $start, $item_per_page);
        $this->data['leadList'] = $leadList;

        $total_rows = $this->Saleslead_model->total_record([
            'album_id' => $id,
            'is_deleted' => 0,
        ]);

        $this->load->library("mypagination");        
        $this->data['pagination'] = $this->mypagination->getPagination(base_url('album/'.$id.'/'.$detail['title']), $total_rows, $item_per_page);
        

        $this->load->view("header");
        $this->load->view("detailpage", $this->data);
        $this->load->view("footer");

    }

    public function detailpage_submit(){

        $album_id = $this->input->post("album_id", true);
        $name = $this->input->post('name',true);
        $email = $this->input->post('email',true);
        $mobile = $this->input->post('mobile',true);

        $this->load->model("Saleslead_model");

        $this->Saleslead_model->insert([
            'album_id' => $album_id,
            'name'     => $name,
            'email'    => $email,
            'mobile'   => $mobile,
            'created_date' => date('Y-m-d H:i:s'),
        ]);

        $this->load->library("emailer");
        $this->emailer->sendmail("newtonstudio@gmail.com", "Jason Tian", "Someone apply your album", "Hi Administrator, <br/> Please check it out, someone has applied your album <br/><br/>Send from W0208");


        redirect(base_url('thanks'));

    }

    public function thanks(){
        $this->load->view("header");
        $this->load->view("thanks");
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