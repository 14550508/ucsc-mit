<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Enroll extends CI_Controller 

{	
	public function index()
	{
		if($this->session->userdata('is_logged_in') == TRUE &&  $this->session->userdata('user_type') == 1)
		{		

			$this->load->model('students_model');		  
			$result = $this->students_model->sutdent_profile();
			$data['userdatas'] = $result['userdatas'];
			$data['users'] = $result['users'];
			
			$data['num_enrolls'] = $result['num_enrolls'];
			$this->load->model('enroll_model');		  
			$resultEQ = $this->enroll_model->enroll_quiz();
			$data['quiz_enrolls'] = $resultEQ['quiz_enrolls'];
			 $data['enroll_rows'] = $resultEQ['enroll_rows'];
			  $data['NApagetitle'] = 'Enrollment List';   
			$this->load->view('enrollments/index', $data);
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
			 $data['NApagetitle'] = 'Enrollment confirmation';   
			 $this->load->view('enrollments/confirmation',$data);
			 
		}
		
		 else
		{
		 
		  redirect(base_url().'users/index');
		}
			
	}
	
	
}

?>