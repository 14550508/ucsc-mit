<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsersAuth extends CI_Controller {

	public function logout()
	{
		$lonin_user = $this->session->userdata('user_id');		
		$this->load->model('userModel');
	    $this->userModel->logoutUser($lonin_user);
	}

	public function uploadProfile()
	{         
        if($this->session->userdata('is_logged_in') == TRUE   ) 
		{
           $this->load->model('userModel');
	       $this->userModel->uploadProfileDB();
	    }

		
		else 
	    {
           redirect(base_url().'userAuth/logout');
	    }
	}
        
    public function changePassword(){

    	$oldPassword = $this->input->post('oldPassword');
    	$newPassword = $this->input->post('newPassword');
    	$this->load->model('userModel');
	    $this->userModel->uploadPasswordDB($newPassword, $oldPassword);


    }       
        
}


