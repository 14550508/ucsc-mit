<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	
	public function checkLoginInfo()
	{
	      
	   if($this->session->userdata('is_logged_in') == TRUE ){

			 $data = array(				
				'status'   => 500,
				'errorMsg'  => 'You are already logged!'
				 );

			    echo json_encode($data); 
	    
	    }
	    else {
        
	    $email     = $this->input->post('email');
	    $password  = $this->input->post('password');
	    	
             
		$this->load->model('userModel');
		$this->userModel->validateLoginInfo($email, $password);
            
       }
		

	}

	public function forgotPassward()
	{
		if($this->session->userdata('is_logged_in') != TRUE )
		{
            $this->load->model('userModel');
       	    $this->userModel->resetPassword();
		}
		else 
		{
			redirect(base_url());
		}


	}
   
}
