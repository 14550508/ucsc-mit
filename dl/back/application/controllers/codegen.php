<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Codegen extends CI_Controller 

{	
	public function index()
	{
		if($this->session->userdata('is_logged_in') == TRUE &&  $this->session->userdata('user_type') == 84)
		{		

			$this->load->model('students_model');		  
			$result = $this->students_model->sutdent_profile();
			$data['userdatas'] = $result['userdatas'];
			$data['users'] = $result['users'];
			
			
			$this->load->model('codegen_model');		  
			$resultEQ = $this->codegen_model->codegen_model();
			
			$this->load->view('codegen_model/index', $data);
		}
		else
		{		 
		  redirect(base_url().'users/index');
		}
	}
        
    
	
	public function confirmation()
	{
		if($this->session->userdata('is_logged_in') == TRUE &&  $this->session->userdata('user_type') == 1)
		{
			 $qz_id = $this->input->post('qz_id');
			 $qz_name = $this->input->post('qz_name');
			
			 
			 $this->load->model('students_model');		  
			 $result = $this->students_model->sutdent_profile();
			 $data['userdatas'] = $result['userdatas'];
			 $data['users'] = $result['users'];
			 
			
			 
			
			 
			 $data['qz_id'] = $qz_id;
			 $data['qz_name'] = $qz_name;
			 
			 $this->load->view('enrollments/confirmation',$data);
			 
		}
		
		 else
		{
		 
		  redirect(base_url().'users/index');
		}
			
	}
	
	
}

?>