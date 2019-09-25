<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Students extends CI_Controller 

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
			$data['NApagetitle'] = 'My Home';
			$this->load->view('students/index', $data);
		}
		else
		{		 
		  redirect(base_url().'users/index');
		}
	}
        
    public function profile()
	{
		if($this->session->userdata('is_logged_in') == TRUE &&  $this->session->userdata('user_type') == 1)
		{
			 $this->load->model('students_model');		  
			 $result = $this->students_model->sutdent_profile();
			 $data['userdatas'] = $result['userdatas'];
			 $data['users'] = $result['users'];
			  $data['num_enrolls'] = $result['num_enrolls'];
			  $data['NApagetitle'] = 'My Profile';
			 $this->load->view('students/profile',$data);
		}
		
		 else
		{
		 
		  redirect(base_url().'users/index');
		}
			
	}
	
	public function editProfile()
	{
		if($this->session->userdata('is_logged_in') == TRUE &&  $this->session->userdata('user_type') == 1)
		{
			 $this->load->model('students_model');		  
			 $result = $this->students_model->sutdent_profile();
			 $data['userdatas'] = $result['userdatas'];
			 $data['users'] = $result['users'];
			  $data['num_enrolls'] = $result['num_enrolls'];
			 $data['successM']='';
			 $data['NApagetitle'] = 'Edit Profile';
			 $this->load->view('students/editProfile',$data);
		}
		
		 else
		{
		 
		  redirect(base_url().'users/index');
		}
			
	}
	
	public function editProfile_success()
	{
		if($this->session->userdata('is_logged_in') == TRUE &&  $this->session->userdata('user_type') == 1)
		{
			 $this->load->model('students_model');		  
			 $result = $this->students_model->sutdent_profile();
			 $data['userdatas'] = $result['userdatas'];
			 $data['users'] = $result['users'];
			  $data['num_enrolls'] = $result['num_enrolls'];
			 $data['successM']='Your profile information has been updated!';
			 $data['NApagetitle'] = 'My Profile';
			 $this->load->view('students/editProfile',$data);
		}
		
		 else
		{
		 
		  redirect(base_url().'users/index');
		}
			
	}
	
	public function profileEdit()
	{
      if($this->session->userdata('is_logged_in') == TRUE &&  $this->session->userdata('user_type') == 1)
		{
			 $this->load->model('students_model');		  
			 $this->students_model->profileEdit();
		}
		
		 else
		{
		 
		  redirect(base_url().'users/index');
		}  
     
        
     } 

	public function newPassword()
	{
      if($this->session->userdata('is_logged_in') == TRUE &&  $this->session->userdata('user_type') == 1)
		{
			 $this->load->model('students_model');		  
			 $this->students_model->newPassword();
		}
		
		 else
		{
		 
		  redirect(base_url().'users/index');
		}  
     
        
    } 
	public function todoList()
	{
		if($this->session->userdata('is_logged_in') == TRUE &&  $this->session->userdata('user_type') == 1)
		{
			$this->load->model('students_model');		  
			 $result = $this->students_model->sutdent_profile();
			 $data['userdatas'] = $result['userdatas'];
			 $data['users'] = $result['users'];
			  $data['num_enrolls'] = $result['num_enrolls'];
			  $data['NApagetitle'] = 'To Do List';
			 $this->load->view('students/todoList', $data);
		}
		
		 else
		{
		 
		  redirect(base_url().'users/index');
		}
			
	}
}

?>