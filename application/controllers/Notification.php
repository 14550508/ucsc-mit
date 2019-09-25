<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notification extends CI_Controller {

	function __construct() {

        parent::__construct();
        $this->load->model('notificationModel');
      
    }

	public function request(){

	  $user_id = $this->session->userdata('user_id'); 	  
	  $this->notificationModel->requestDB($user_id);        

	}

	public function notilist(){

	  $user_id = $this->session->userdata('user_id'); 	  
	  $this->notificationModel->listDB($user_id);        

	}

}

?>