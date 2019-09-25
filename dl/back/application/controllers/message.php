<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Message extends CI_Controller {
    
        

	public function requesting_message_successfully()
	{
			
            $data ['message'] ='<p class="center">Thank you for requesting Quotes.</p><br/>
                                    You should receive an email within 48 hours with the details
                                    <br/>
                                    of the dentists who are ready to offer you at least 25% off
                                    <br/>
                                    your dental treatment.<br/><br/>
                                    if you do not receive this email, please donlt forger to check your junk box. Have a great day,
                                    <br/><br/>
                                    The SELP Team
                                    ';
            
			  $data['NApagetitle'] = 'Message Successfully';	
			$this->load->view('mesages_success', $data);
		
		
	}
        
        public function sign_up_message_successfully()
	{
			
            $data ['message'] ='<p class="center">Thank for you registration!</p><br/>
                                   
Verification email successfully sent. Please confirm your email address.
                                   
                                    
                                    ';
            
			  $data['NApagetitle'] = 'Message Successfully';	
			$this->load->view('messages/mesages_success', $data);
		
		
	}
        
         public function already_activated()
	{
			
            $data ['message'] ='<p class="center">Your account already activated</p><br/>
                                   

                                    ';
            
			  $data['NApagetitle'] = 'Message Successfully';	
			$this->load->view('message_successfully', $data);
		
		
	}
        
         public function activated_successfully()
	{
			
            $data ['message'] ='<p class="center">Your account has been activated successfully </p><br/>
                                   
please <a href="'.base_url().'site/practitioner_login" >click here </a> to login
                                    ';
            
			  $data['NApagetitle'] = 'Message Successfully';	
			$this->load->view('message_successfully', $data);
		
		
	}
        
        
         public function success_fp()
	{
			
            $data ['message'] ='<p class="center">Password Reset link has been sent your email account please check. </p><br/>';
            
			  $data['NApagetitle'] = 'Message Successfully';	
			$this->load->view('message_successfully', $data);
		
		
	}
        
        
         public function updatepassword_successfully()
	{
			
             $data ['message'] ='<p class="center">Your password has been updated successfully </p><br/>
                                   
please <a href="'.base_url().'site/practitioner_login" >click here </a> to login';
            
			  $data['NApagetitle'] = 'Message Successfully';	
			$this->load->view('message_successfully', $data);
		
		
	}
        
         public function mesages_success_invoice()
	{
			
            $data ['message'] ='<p class="center">Invoice has been sent successfully<br/>
                                   
 <a href="'.base_url().'site/my_bids" >Back to My bids </a></p>' ;
            
			  $data['NApagetitle'] = 'Message Successfully';	
			$this->load->view('message_successfully', $data);
		
		
	}
        
        
        
        
        public function mesages_success_contact()
	{
			
            $data ['message'] ='<p class="center">Thanks for contacting us, 
                we will reply to you as soon as possible..</p><br/>' ;
            
			  $data['NApagetitle'] = 'Message Successfully';	
			$this->load->view('message_successfully', $data);
		
		
	}
	
	
	
	public function message_error()
	{
		
	
			$data['NApagetitle'] = 'Error Message';		
								

			$data ['message'] ='Opps Errors please try agine!';
		
			
			
			$this->load->view('mesages_errors', $data);
			
		
		
	}
        
        public function message_error_cart_empty()
	{
		
	
			$data['NApagetitle'] = 'Error Message';		
								

			$data ['message'] ='Your cart is empty! <a href="'.base_url().'site/practitioner_profile"> Go back to my profile</a>';
		
			
			
			$this->load->view('mesages_errors', $data);
			
		
		
	}
        
        public function addtocart()
	{
		
	
			$data['NApagetitle'] = 'Error Message';		
								

			$data ['message'] ='This Item Already added';
		
			
			
			$this->load->view('mesages_errors', $data);
			
		
		
	}
        
       
        
        public function contact_us()
	{
		
	
			$data['NApagetitle'] = 'Contact Us'	;		
			$data['page_title'] = 'Contact Us'	;						

			
		
			
			
			$this->load->view('page/contact_us', $data);
			
		
		
	}
        
         public function about_us()
	{
		
	
			$data['NApagetitle'] = 'About Us'	;		
			$data['page_title'] = 'About Us'	;						

			
		
			
			
			$this->load->view('page/about_us', $data);
			
		
		
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
    
    
        
	public function success_payment()
	{
			
            $data ['message'] ='<p class="center">Your payment has been paid successfully! </p><br/>
                                   
			please <a href="'.base_url().'site/my_bids" >click here </a> 
                                    ';
            
			  $data['NApagetitle'] = 'Message Successfully';	
			$this->load->view('message_successfully', $data);
		
		
	}
	
	public function allReadyEnroll()
	{
			
            if($this->session->userdata('is_logged_in') == TRUE )
			{
		
		
			$this->load->model('students_model');		  
			$result = $this->students_model->sutdent_profile();
			$data['userdatas'] = $result['userdatas'];
			$data['users'] = $result['users'];
			
			
			$data['NApagetitle'] = 'Error Message';		
								

			$data ['message'] ='You already enrolled this quiz';
			$data ['url'] ='enroll/index';
			$data ['btn_name'] ='Enrollment list';
		
			
			
			$this->load->view('messages/mesages_errors', $data);
			}
			
			else {
			redirect(base_url().'users/index');
			
			}
		
	}
	
	
	public function topup_success()
	{
			
            if($this->session->userdata('is_logged_in') == TRUE )
			{
		
		
			$this->load->model('students_model');		  
			$result = $this->students_model->sutdent_profile();
			$data['userdatas'] = $result['userdatas'];
			$data['users'] = $result['users'];
			
			
			$data['NApagetitle'] = 'Success Message';		
								

			     $data['message'] ="You credit has been successfully added";
					$data['btn_name'] ="My Credits";
					$data['url'] ="credits/index";
					$this->load->view('messages/mesages_success_cz', $data);
		
			
			
			
			}
			
			else {
			redirect(base_url().'users/index');
			
			}
		
	}
	
	
	public function payment_success()
	{
			
            if($this->session->userdata('is_logged_in') == TRUE )
			{
		
		
			$this->load->model('students_model');		  
			$result = $this->students_model->sutdent_profile();
			$data['userdatas'] = $result['userdatas'];
			$data['users'] = $result['users'];
			
			
			$data['NApagetitle'] = 'Success Message';		
								

			   $data['message'] ="You payment has been successfully paid";
					$data['btn_name'] ="Enrollment List";
					$data['url'] ="enroll/index";
					$this->load->view('messages/mesages_success_cz', $data); 
					
		
			
			
			
			}
			
			else {
			redirect(base_url().'users/index');
			
			}
		
	}
	
	public function allReadyUsedEmail()
	{
			
            if($this->session->userdata('is_logged_in') !== TRUE )
			{
		
		
			$this->load->model('students_model');		  
			$result = $this->students_model->sutdent_profile();
			$data['userdatas'] = $result['userdatas'];
			$data['users'] = $result['users'];
			
			
			$data['NApagetitle'] = 'Error Message';		
								

			$data ['message'] ='The email address you entered is already in use';
			$data ['url'] ='users/registration';
			$data ['btn_name'] ='Try Again';
		
			
			
			$this->load->view('messages/mesages_errors', $data);
			}
			
			else {
			redirect(base_url().'users/index');
			
			}
		
	}
	
	
	
	
}
