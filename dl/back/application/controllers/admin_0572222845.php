<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_0572222845 extends CI_Controller 

{

	
	public function index()
	{
	if($this->session->userdata('is_logged_in') == TRUE &&  $this->session->userdata('user_type') == 84)
		{		
			
			
			 $this->load->model('admin_model');		  
			 $result = $this->admin_model->admin_profile();
			 $data['userdatas'] = $result['userdatas'];
			 $data['users'] = $result['users'];
			
			$this->load->view('admin_0572222845/index', $data);
		}
		else
		{		 
		  redirect(base_url().'admin_0572222845/login');
		}
	   
	   
	}
	
	public function login()
	{
	if($this->session->userdata('is_logged_in') !== TRUE)
		{		
			
			$data['errorM'] = '';  
			 
			
			$this->load->view('admin_0572222845/login', $data);
		}
		else
		{	
			$this->load->model('admin_model');		  
			 $result = $this->admin_model->admin_profile();
			 $data['userdatas'] = $result['userdatas'];
			 $data['users'] = $result['users'];
		  redirect(base_url().'admin_0572222845/index');
		}
	   
	   
	}
	
	public function logInvalid()
	{
		if($this->session->userdata('is_logged_in') != TRUE )
		{	
		   $data['errorM'] = 'Invalid Username or Password!';     
		   $this->load->view('admin_0572222845/login', $data);
		}
	   
	    else 
		 {		 
			redirect(base_url().'admin_0572222845/index');
		 }
	}
	
	public function blockuser()
	{
		if($this->session->userdata('is_logged_in') != TRUE )
		{
		   $data['errorM'] = 'Your Account has been suspended please check!';    
		   $this->load->view('admin_0572222845/login', $data);
		}
	   
	    else 
		{		 
			redirect(base_url().'admin_0572222845/index');
		}
	}
	
	public function notactive()
	{
		if($this->session->userdata('is_logged_in') != TRUE )
		{
		   $data['errorM'] = 'Your account is not active';    
		   $this->load->view('admin_0572222845/login', $data);
		}
	   
	    else 
		{		 
			redirect(base_url().'admin_0572222845/index');
		}
	}
        
        
    
        
    
	
	public function checkLogin()
	{
	
		if($this->session->userdata('is_logged_in') != TRUE )
			{
				 $username = $this->input->post('username');
				 $password = $this->input->post('password');

				 $this->load->model('admin_model');  
				 $this->admin_model->checkLogin($username, $password);
			}
		else 
			{
				redirect(base_url().'admin_0572222845/index');
			}
	}
	
	
	
	public function profileUpdate()
	{
	     $user_idd = $this->session->userdata('user_id');
		 $this->load->model('admin_model');  
		 $this->admin_model->profileUpdate($user_idd);
	}
	
	public function logout(){
	
	
	    $lonin_user = $this->session->userdata('user_id');
		
		$data_up = array(
					     'online_status' => '0'
						 
					     );
					$where = "u_id = '".$lonin_user."'";
					$str = $this->db->update('nana_admin', $data_up, $where);
		
		$data = array (	
            		
            'logout_date' =>date('Y-m-d H:i:s')               
                        	
            );
        
					$where = "sid = '".$this->session->userdata('sid')."'";
					
					$str = $this->db->update('nana_admin_login_history', $data, $where);
	
		
		
		$this->session->sess_destroy();
		
		redirect(base_url());
	
	}
	
	 public function profile()
	{
		if($this->session->userdata('is_logged_in') == TRUE &&  $this->session->userdata('user_type') == 84)
		{
			 $this->load->model('admin_model');		  
			 $result = $this->admin_model->admin_profile();
			 $data['userdatas'] = $result['userdatas'];
			 $data['users'] = $result['users'];
			 $this->load->view('admin_0572222845/profile',$data);
		}
		
		 else
		{
		 
		  redirect(base_url().'users/index');
		}
			
	}
	
	public function editProfile()
	{
		if($this->session->userdata('is_logged_in') == TRUE &&  $this->session->userdata('user_type') == 84)
		{
			 $this->load->model('admin_model');		  
			 $result = $this->admin_model->admin_profile();
			 $data['userdatas'] = $result['userdatas'];
			 $data['users'] = $result['users'];
			 $data['successM']='';
			 $this->load->view('admin_0572222845/editProfile',$data);
		}
		
		 else
		{
		 
		  redirect(base_url().'users/index');
		}
			
	}
	
	public function editProfile_success()
	{
		if($this->session->userdata('is_logged_in') == TRUE &&  $this->session->userdata('user_type') == 84)
		{
			 $this->load->model('admin_model');		  
			 $result = $this->admin_model->admin_profile();
			 $data['userdatas'] = $result['userdatas'];
			 $data['users'] = $result['users'];
			 $data['successM']='Your profile information has been updated!';
			 $this->load->view('admin_0572222845/editProfile',$data);
		}
		
		 else
		{
		 
		  redirect(base_url().'users/index');
		}
			
	}
	
	public function profileEdit()
	{
      if($this->session->userdata('is_logged_in') == TRUE &&  $this->session->userdata('user_type') == 84)
		{
			 $this->load->model('admin_model');		  
			 $this->admin_model->profileEdit();
		}
		
		 else
		{
		 
		  redirect(base_url().'users/index');
		}  
     
        
     } 

	public function newPassword()
	{
      if($this->session->userdata('is_logged_in') == TRUE &&  $this->session->userdata('user_type') == 84)
		{
			 $this->load->model('admin_model');		  
			 $this->admin_model->newPassword();
		}
		
		 else
		{
		 
		  redirect(base_url().'admin_0572222845/index');
		}  
     
        
    } 
	
	public function codegen()
	{
      if($this->session->userdata('is_logged_in') == TRUE &&  $this->session->userdata('user_type') == 84)
		{
			 $this->load->model('admin_model');		  
			 $this->admin_model->codegen_model();
		}
		
		 
		else
		{
		   redirect(base_url().'admin_0572222845/index');
		}  
     
        
    } 
	
	public function update_codegen()
	{
      if($this->session->userdata('is_logged_in') == TRUE &&  $this->session->userdata('user_type') == 84)
		{
			 $this->load->model('admin_model');		  
			 $this->admin_model->codegen_model_status();
		}
		
		 
		else
		{
		   redirect(base_url().'admin_0572222845/index');
		}  
     
        
    } 
	
	
	
	public function update_quiz_question()
	{
      if($this->session->userdata('is_logged_in') == TRUE &&  $this->session->userdata('user_type') == 84)
		{
			 $this->load->model('admin_model');		  
			 $this->admin_model->update_quiz_question();
		}
		
		 
		else
		{
		   redirect(base_url().'admin_0572222845/index');
		}  
     
        
    } 
    
    public function update_new_users()
	{
      if($this->session->userdata('is_logged_in') == TRUE &&  $this->session->userdata('user_type') == 84)
		{
			 $this->load->model('admin_model');		  
			 $this->admin_model->update_new_users();
			 
		}
		
		 
      else
		{
		   redirect(base_url().'admin_0572222845/index');
		}  
     
        
    	} 
        
    public function update_user_enroll()
	{
      if($this->session->userdata('is_logged_in') == TRUE &&  $this->session->userdata('user_type') == 84)
		{
			 $this->load->model('admin_model');		  
			 $this->admin_model->update_user_enroll();
			 
		}
		
		 
      else
		{
		   redirect(base_url().'admin_0572222845/index');
		}  
     
        
    	} 
    
    public function update_user_uid()
	{
      if($this->session->userdata('is_logged_in') == TRUE &&  $this->session->userdata('user_type') == 84)
		{
			 $this->load->model('admin_model');		  
			 $this->admin_model->update_user_uid();
			 
		}
		
		 
      else
		{
		   redirect(base_url().'admin_0572222845/index');
		}  
     
        
    	} 
    	
    	public function update_end_date()
	{
      if($this->session->userdata('is_logged_in') == TRUE &&  $this->session->userdata('user_type') == 84)
		{
			 $this->load->model('admin_model');		  
			 $this->admin_model->update_end_date();
			 
		}
		
		 
      else
		{
		   redirect(base_url().'admin_0572222845/index');
		}  
     
        
    	} 
        
        
}

?>