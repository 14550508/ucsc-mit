<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller 

{

	
	public function index()
	{
	if($this->session->userdata('is_logged_in') != TRUE ){	
       $data['errorM'] = '';     
      $data['NApagetitle'] = 'Driving licence past papers sri lanka | SELP| User Login';
	   $this->load->view('login', $data);
	   
	   }
		 else 
		 {
		 
		 redirect(base_url().'enroll/index');
		 }
	   
	   
	}
	
	public function logInvalid()
	{
		if($this->session->userdata('is_logged_in') != TRUE )
		{	
		   $data['errorM'] = 'Invalid username or password!';  
		   $data['NApagetitle'] = 'User Login';   
		   $this->load->view('login', $data);
		}
	   
	    else 
		 {		 
			redirect(base_url().'users/createProfile');
		 }
	}
	
	public function blockuser()
	{
		if($this->session->userdata('is_logged_in') != TRUE )
		{
		   $data['errorM'] = 'Your Account has been suspended please contact administrator!';  
		   $data['NApagetitle'] = 'User Login';    
		   $this->load->view('login', $data);
		}
	   
	    else 
		{		 
			redirect(base_url().'users/createProfile');
		}
	}
	
	public function notactive()
	{
		if($this->session->userdata('is_logged_in') != TRUE )
		{
		   $data['errorM'] = 'Your account is not active';  
		   $data['NApagetitle'] = 'User Login';    
		   $this->load->view('login', $data);
		}
	   
	    else 
		{		 
			redirect(base_url().'users/createProfile');
		}
	}
        
        
   /* public function registration()
	{
		if($this->session->userdata('is_logged_in') != TRUE )
			{ 
				$data['NApagetitle'] = 'User Registration';  
				$this->load->view('registration', $data);
			}
			else 
			{
				redirect(base_url().'users/createProfile');
			}
	}
        
    public function registrationPro()
	{
            $key_nanaid = md5(uniqid());
			
			
			
			
            $this->load->model('users_model');
	 
            $name =  $this->input->post('firstName');
            $p_email = $this->input->post('email');
			$this->db->select('*');
			$this->db->where('email', $p_email);
			$queryemail_check = $this->db->get('nana_users');	
			$numrows = $queryemail_check->num_rows();
			

		 if($numrows == 0){
            if($p_email !=""){
                    $this->load->library('email', array('mailtype'=>'html'));

                    $this->email->from('selp@selp.com');
                    $this->email->to($this->input->post('email'));
                    $this->email->subject('Confirm you account');

                    $con_message="Hello ". $name."</br>";
                    $con_message .="<p>Firstly we would like to thank you for becoming a member of SELP. Your are nearly there to complete the sing up process. To complete the sign Up process click on the link below.</p>";
                     
                    $con_message .="<p> <a href='".base_url()."users/userEmaiVer/$key_nanaid'>Click here </a>to conformation your account.</p>";
                    $con_message .="<p>If you can't click on the link try and copy it and past it into the address bar of your browser. When logging into your account use your email address of ".$p_email." as your user name</p>";

                    $con_message .="<br/><p> SELP Team.</p>";

                $this->email->message($con_message);

                $this->email->send();                                        

                $this->users_model->registrationPro($key_nanaid);

                 }
                 
            else {
                redirect(base_url().'users/registration');
                
                 }
        
		}
		else {
		
		redirect(base_url().'message/allReadyUsedEmail');
		
		}
        }
        */
        
        public function userEmaiVer($key_nanaid){	   
		
            $this->load->model('users_model');  
	  	
            if($this->users_model->is_key_nana_validation($key_nanaid))               
                {
			
                $this->users_model->update_user_status($key_nanaid);
                
                }
           
                else {
                    redirect(base_url().'message/message_error');
                }
	  	  
	  }
          
        
        
        
    public function forgotPassward()
	{
		if($this->session->userdata('is_logged_in') != TRUE )
			{
			$data['NApagetitle'] = 'user Registration';	
               $this->load->view('registration');
			}
		else 
			{
				redirect(base_url().'users/createProfile');
			}
	}
        
        
    
	
	 public function profileCompleteness1()
	{	if($this->session->userdata('is_logged_in') != TRUE )
			{
			 $data['NApagetitle'] = 'profile Completeness';   
            $this->load->view('profileCompleteness_1', $data);
			}
		else 
			{
				redirect(base_url().'users/createProfile');
			}
	}
        
        
	 
	
	public function checkLogin()
	{
	
		if($this->session->userdata('is_logged_in') != TRUE )
			{
				 $username = $this->input->post('username');
				 $password = $this->input->post('password');

				 $this->load->model('users_model');  
				 $this->users_model->checkLogin($username, $password);
			}
		else 
			{
				redirect(base_url().'users/createProfile');
			}
	}
	
	public function createProfile()
	{
		
		if($this->session->userdata('update_profile_info') == 1)
		{
		
			if($this->session->userdata('user_type') == 1)
				{			  
				   redirect(base_url().'students/index');
				}
			
			else
				{			
				  redirect(base_url().'teachers/profile');
				}
	   }
	   else 
	   {
	   
			if($this->session->userdata('user_type') == 1)
				{				  
				  $data['NApagetitle'] = 'profile Completeness';  
				   $this->load->view('profileCompleteness_1', $data);
				}
			
			else
				{				
				  $data['NApagetitle'] = 'profile Completeness'; 
				  $this->load->view('profileCompleteness_2', $data);
				}
	   
	   }
	
	}
	
	public function profileUpdate()
	{
	     $user_idd = $this->session->userdata('user_id');
		 $this->load->model('users_model');  
		 $this->users_model->profileUpdate($user_idd);
	}
	
	public function logout(){
	
	
	    $lonin_user = $this->session->userdata('user_id');
		
		$data_up = array(
					     'online_status' => '0'
						 
					     );
					$where = "u_id = '".$lonin_user."'";
					$str = $this->db->update('nana_users', $data_up, $where);
		
		$data = array (	
            		
            'logout_date' =>date('Y-m-d H:i:s')               
                        	
            );
        
					$where = "sid = '".$this->session->userdata('sid')."'";
					
					$str = $this->db->update('nana_user_login_history', $data, $where);
	
		
		
		$this->session->sess_destroy();
		
		redirect(base_url());
	
	}
        
        
}

?>