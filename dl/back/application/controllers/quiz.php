<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Quiz extends CI_Controller 

{	
	public function index()
	{
           
		if($this->session->userdata('is_logged_in') == TRUE )
			{
		   $this->load->model('students_model');		  
			$result = $this->students_model->sutdent_profile();
			$data['userdatas'] = $result['userdatas'];
			$data['users'] = $result['users'];
			
			$data['NApagetitle'] = 'Quiz Category List';
			$this->load->model('quiz_model');		  
			$resultQ = $this->quiz_model->quiz_cats();
			$data['quiz_cats'] = $resultQ['quiz_cats'];
			$this->load->view('quiz/index', $data);
			}
			
		else {
		
			redirect(base_url().'users/index');
			}
	}
        
    public function quiz_list()
	{
		if($this->session->userdata('is_logged_in') == TRUE )
			{
			$qz_cat_id = $this->input->post('qz_cat_id');
			if($qz_cat_id !="")
			{
				
				$this->load->model('students_model');		  
				$result = $this->students_model->sutdent_profile();
				$data['userdatas'] = $result['userdatas'];
				$data['users'] = $result['users'];
				
				$this->load->model('quiz_model');		  
				$resultQL = $this->quiz_model->quiz_list($qz_cat_id);
				$data['quiz_lists'] = $resultQL['quiz_lists'];
				$data['NApagetitle'] = 'Quiz List';

				$this->load->view('quiz/quiz_list', $data);
			}
			
			else 
			{
			
			   redirect(base_url().'quiz/index');
			}
		}
		else {
		
			redirect(base_url().'users/index');
			}
	}
	
	
	public function quiz_detail()
	{
		if($this->session->userdata('is_logged_in') == TRUE )
			{
			$qz_id = $this->input->post('qz_id');
				
				if($qz_id !=""){
					$this->load->model('students_model');		  
					$result = $this->students_model->sutdent_profile();
					$data['userdatas'] = $result['userdatas'];
					$data['users'] = $result['users'];
					
					$this->load->model('quiz_model');		  
					$resultQD = $this->quiz_model->quiz_detail($qz_id);
					$data['quiz_details'] = $resultQD['quiz_details'];
					$data['NApagetitle'] = '';
					$this->load->view('quiz/quiz_detail', $data);
				}
				else {
				
					redirect(base_url().'quiz/index');
				
				}
			}
			else {
		
			redirect(base_url().'users/index');
			}
			
	}
	public function add_attempt()
	{
		if($this->session->userdata('is_logged_in') == TRUE &&  $this->session->userdata('user_type') == 1)
		{
			 $qz_id = $this->input->post('qz_id');
			 
			 			 
					$this->load->model('students_model');		  
					$result = $this->students_model->sutdent_profile();
					$data['userdatas'] = $result['userdatas'];
					$data['users'] = $result['users'];
					
					$this->load->model('quiz_model');		  
					$resultQA = $this->quiz_model->add_attempt($qz_id);
					$data['message'] = $resultQA['message'];
					$data['NApagetitle'] = 'Default Quiz';
					$data['qz_id'] = $qz_id;

					$this->load->view('quiz/default_quiz',$data);
			
			 
		}
		
		 else
		{
		 
		  redirect(base_url().'users/index');
		}
			
	}
        
    
        
    public function save_answers()
	{
		if($this->session->userdata('is_logged_in') == TRUE )
		{
		
			$qz_id = $this->input->post('qz_id');
			$attempt = $this->input->post('attempt');
			$userId = $this->session->userdata('user_id');
			
			$this->load->model('students_model');		  
			$result = $this->students_model->sutdent_profile();
			$data['userdatas'] = $result['userdatas'];
			$data['users'] = $result['users'];
		
            if($qz_id !="")
			{
				$this->load->model('quiz_model');	  
				$resultQSA = $this->quiz_model->save_answers($qz_id, $attempt, $userId);
				
				$data['qz_id'] = $qz_id;
				$data['attempt'] = $attempt;
				$data['userId'] = $userId;
				$data['NApagetitle'] = 'Save Quiz';
				
			$this->load->view('quiz/temp_quiz',$data);
				
			
			}
			
			else 
			{
			
				redirect(base_url().'quiz/index');
			
			}
		}
		else 
		{
			
			redirect(base_url().'users/index');
			
		}
			
	}
	
	
	public function submit_answers()
	{
	
		if($this->session->userdata('is_logged_in') == TRUE )
		{
		
			$qz_id = $this->input->post('qz_id');
			$attempt = $this->input->post('attempt');
			$userId = $this->session->userdata('user_id');
			
			$this->load->model('students_model');		  
			$result = $this->students_model->sutdent_profile();
			$data['userdatas'] = $result['userdatas'];
			$data['users'] = $result['users'];
		
            if($qz_id !="")
			{
				$this->load->model('quiz_model');	  
				$resultQSA = $this->quiz_model->submit_answers($qz_id, $attempt, $userId);
				
				$data['qz_id'] = $qz_id;
				$data['attempt'] = $attempt;
				$data['userId'] = $userId;
				$data['NApagetitle'] = 'Review Quiz';
				
			$this->load->view('quiz/review_quiz',$data);
				
			
			}
			
			else 
			{
			
				redirect(base_url().'quiz/index');
			
			}
		}
		else 
		{
			
			redirect(base_url().'users/index');
			
		}
			
	}
	
	public function dlp()
	{
		if($this->session->userdata('is_logged_in') == TRUE )
		{
			
				
				$this->load->model('students_model');		  
				$result = $this->students_model->sutdent_profile();
				$data['userdatas'] = $result['userdatas'];
				$data['users'] = $result['users'];
				
				$this->load->model('quiz_model');		  
				$resultQL = $this->quiz_model->quiz_list_dpl();
				$data['quiz_lists'] = $resultQL['quiz_lists'];
				$data['NApagetitle'] = 'Driving licence exam online';

				$this->load->view('quiz/quiz_list', $data);
			
			
			
		}
		else 
		{		
			redirect(base_url().'users/index');
		}
		
	}
	
	
	public function iq()
	{
		if($this->session->userdata('is_logged_in') == TRUE )
		{
			
				
				$this->load->model('students_model');		  
				$result = $this->students_model->sutdent_profile();
				$data['userdatas'] = $result['userdatas'];
				$data['users'] = $result['users'];
				
				$this->load->model('quiz_model');		  
				$resultQL = $this->quiz_model->quiz_list_iq();
				$data['quiz_lists'] = $resultQL['quiz_lists'];
				$data['NApagetitle'] = 'Intelligence Quotient | IQ Papaers';
				$this->load->view('quiz/quiz_list', $data);
			
			
			
		}
		else 
		{		
			redirect(base_url().'users/index');
		}
		
	}
	
	
	public function che()
	{
		if($this->session->userdata('is_logged_in') == TRUE )
		{
			
				
				$this->load->model('students_model');		  
				$result = $this->students_model->sutdent_profile();
				$data['userdatas'] = $result['userdatas'];
				$data['users'] = $result['users'];
				
				$this->load->model('quiz_model');		  
				$resultQL = $this->quiz_model->quiz_list_che();
				$data['quiz_lists'] = $resultQL['quiz_lists'];
					$data['NApagetitle'] = 'A/L Chemistry model papers';
				$this->load->view('quiz/quiz_list', $data);
			
			
			
		}
		else 
		{		
			redirect(base_url().'users/index');
		}
		
	}
	
	public function phy()
	{
		if($this->session->userdata('is_logged_in') == TRUE )
		{
			
				
				$this->load->model('students_model');		  
				$result = $this->students_model->sutdent_profile();
				$data['userdatas'] = $result['userdatas'];
				$data['users'] = $result['users'];
				
				$this->load->model('quiz_model');		  
				$resultQL = $this->quiz_model->quiz_list_phy();
				$data['quiz_lists'] = $resultQL['quiz_lists'];
				$data['NApagetitle'] = 'A/L Physics model papers';
				$this->load->view('quiz/quiz_list', $data);
			
			
			
		}
		else 
		{		
			redirect(base_url().'users/index');
		}
		
	}
	
	
	
	
	
}

?>