<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teachers extends CI_Controller {

	function __construct() {
		parent::__construct();
		
        $this->load->model('QuizzesModel');       
        $this->load->model('userModel');       
        $this->load->model('UserProfileModel');       
	}	
	
	
	public function addNewQuizDB()
	{ 

		if($this->session->userdata('is_logged_in') == TRUE && $this->session->userdata('user_type') == 2 ) 
        {       
		   $user_id =  $this->session->userdata('user_id');
           $result =  $this->QuizzesModel->insertQuizData($user_id);
        }

        else
        {
            $data = array(              
                'status'   => 0,
                'msg'  => 'Access denied'
                 );
            echo json_encode($data); 
        }     
         
		 
	}



	public function profile($username)
	{
	 
		echo $user_id;
		 
	}
}