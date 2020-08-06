<?php

require "./vendor/autoload.php";

class Googleclient {

	public $client_id = "857120368705-nh0v4nhnqd631v6vi9vqso3volo557f8.apps.googleusercontent.com";	

	public function connect($token){

		$client = new Google_Client(['client_id' => $this->client_id]);  // Specify the CLIENT_ID of the app that accesses the backend
		$payload = $client->verifyIdToken($token);
		if ($payload) {

			return $payload;
		} else {
		  return array();
		}

	}

}
?>