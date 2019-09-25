<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registration extends CI_Controller 

{

	
	public function index()
	{
	if($this->session->userdata('is_logged_in') != TRUE ){	
	
	
	$data['NApagetitle'] = 'User Registration';		
             $this->load->view('registration', $data);
			 
			 }
			 
			 else {
			 
			 redirect(base_url().'students/index');
			 
			 }
	}
        
    public function check_email()
	{
	 $email = $this->input->post('email');
           
                
			//$data_success('message') ='New Branch Added Successfully!';
			  $this->db->select('*');
                         
                            $this->db->where('email', $email); 
          
		  
                        $query = $this->db->get('nana_users');
                        
                       if($query->num_rows() > 0) {
                           
                           
                          $valid = false;
							
							$message = 'The email address you entered is already in use';
							break;
                       }
                       else {
                           
                           
                            $valid = true;
                           
                       }
                       
                      echo json_encode(array(
							'valid' => $valid
											));
	}   
        
        
        
}

?>