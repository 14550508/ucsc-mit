<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function checkUserDetails(){

		if($this->session->userdata('is_logged_in') == TRUE ){

			 $data = array(				
				'status'   => 500,
				'errorMsg'  => 'You are already logged!'
				 );

			    echo json_encode($data); 
	    
	    }else {
			$this->load->library('form_validation');

	        $stp_fname = $this->input->post('stp_fname');
		    $stp_lname = $this->input->post('stp_lname');
		    $email     = $this->input->post('email');
		    $stp_username  = $this->input->post('stp_username');
		    $password  = $this->input->post('password');
		    $user_type = $this->input->post('user_type');


		    $this->form_validation->set_rules('stp_fname', 'First Name', 'trim|required|min_length[3]|max_length[35]');
		    $this->form_validation->set_rules('stp_lname', 'Last Name', 'trim|required|min_length[3]|max_length[35]');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[nana_users.email]');
			$this->form_validation->set_rules('stp_username', 'Username', 'trim|required|is_unique[nana_users.username]');

	       if ($this->form_validation->run() == FALSE)
			{
				$status = 0;
				$stp_fname = form_error('stp_fname');
				$stp_lname = form_error('stp_lname');
				$email = form_error('email');
				$stp_username = form_error('stp_username');
				$password = form_error('password');

				$data = array(
					'stp_fname' => $stp_fname,
					'stp_lname' => $stp_lname,
					'stp_username' => $stp_username,
					'email'     => $email,
					'password'  => $password,
					'status'    => 0
					);

				echo json_encode($data);
			}

			else
			{	             
				$this->load->model('userModel');
				$this->userModel->userInsertData($stp_fname, $stp_lname, $email, $password, $user_type, $stp_username);	            

			}

	    }    

	}

	 public function confirmEmail($key_nanaid){	   
		
        if($this->session->userdata('is_logged_in') != TRUE )
        {    
            $this->load->model('userModel'); 	  	
	            if($this->users_model->is_key_nana_validation($key_nanaid))               
	            {			
	                $this->users_model->update_user_status($key_nanaid);                
	            }           
	            else 
	            {
	               echo 'Invalid token!';
	            }
	  	} 

	  }
  
	

    public function updatePassword()
    {              
       if($this->session->userdata('is_logged_in') == TRUE ) {
       	
	        $newPassword = $this->input->post('password');
	        $uId = $this->session->userdata('user_id');               
	        $this->load->model('userModel');
	        $this->userModel->updatePasswordDB($uId, $newPassword);
    	}
    }
    
        
    
	

	
	
		


}