<?php
class Api_login_manage extends CI_Controller {

    public function flogin(){

        $this->load->library("fbclient");

        $token = $this->input->post("token", true);
        $fbData = $this->fbclient->connect($token);
        $status = "";
        $result = "";

        //valid id
        if(isset($fbData['id'])) {

            $this->load->model("User_model");

            $userData = $this->User_model->getOne([
                'type' => "fb",
                'social_id' => $fbData['id'],
            ]);
            if(!empty($userData)) {

            } else {

                $image = "http://graph.facebook.com/".$fbData['id']."/picture?type=square";

                $this->User_model->insert([
                    'type' => "fb",
                    'social_id' => $fbData['id'],
                    'fullname' => $fbData['name'],
                    'email' => $fbData['email'],
                    'image' => $image,
                ]);

                $status = "OK";

            }
        } else {

            $status = "ERROR";
            $result = "Access Token Invalid";

        }

        echo json_encode([
            'status' => $status,
            'result' => $result,
        ]);




    }

    public function glogin(){

		$this->load->library("googleclient");

		$token = $this->input->post("token", true);

		$userData = $this->googleclient->connect($token);

		if(!empty($userData)) {

			$id = $userData['sub'];
			$fullname = $userData['name'];
			$given_name = $userData['given_name'];
			$family_name = $userData['family_name'];
			$email = $userData['email'];
			$image = $userData['picture'];

		}

		$this->load->model("User_model");

		$userData = $this->User_model->getOne(array(
			'type' => "google",
			'social_id' => $id,
		));
		if(!empty($userData)) {

			$this->User_model->update(array(
				'id' => $userData['id']
			), array(
				'fullname' => $fullname,
				'givenname' => $given_name,
				'familyname' => $family_name,
				'image' => $image,
				'token' => $token,
			));
			$id = $userData['id'];

		} else {

			$id = $this->User_model->insert(array(
				'type' => "google",
				'social_id' => $id,
				'fullname' => $fullname,
				'givenname' => $given_name,
				'familyname' => $family_name,
				'email' => $email,
				'image' => $image,
				'token' => $token,
				'created_date' => date("Y-m-d H:i:s"),
			));

		}

		echo json_encode(array(
			'status' => "OK",
			'result' => $id,
		));




	}



}
?>