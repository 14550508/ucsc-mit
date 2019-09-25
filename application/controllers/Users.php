<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    function __construct() {

        parent::__construct();
        $this->load->model('UserProfileModel');
        $this->load->model('gradeModel');
        $this->load->model('userModel');
    }

	
	public function index()
	{
	   if($this->session->userdata('is_logged_in') == TRUE)
	    {         
           
	    }
	    else 
	    {
           redirect(base_url().'userAuth/logout');
	    }		 
	}


	public function profile($username)
	{
	   if($this->session->userdata('is_logged_in') == TRUE )
	    {         
          $user_id = $this->session->userdata('user_id');
          
          $result =  $this->userModel->profile($user_id, $username); 
          $data['userData'] = $result['userData']; 
          $data['profilePic'] = $result['profilePic']; 
          $result1 =  $this->UserProfileModel->getRank($username); 
          $data['rank'] = $result1['rank']; 
          $data['points'] = $result1['points']; 
          $data['Tquiz'] = $result1['Tquiz']; 
          $data['Tfollowers'] = $result1['Tfollowers']; 
          $data['followers'] = $result['followers'];    
		 
          $this->load->view('users/head', $data);
          $this->load->view('users/header', $data);
      	  $this->load->view('users/sideBar');   
          $this->load->view('users/profile', $data);
          $this->load->view('users/footer', $data);
          $this->load->view('users/postEditModal', $data);
          $this->load->view('users/changeProfilePictureModal');
          $this->load->view('users/changeCaverPictureModal');
		  $this->load->view('users/viewAllCommentModal');
		  if($this->session->userdata('user_type') == 2){			  
			$this->load->view('quiz/newQuizModal');
			$this->load->view('quiz/quiz_js');
		  }
          $this->load->view('users/timeline_js');
          $this->load->view('users/notificationJs');
		  $this->load->view('users/requestNotifiJs');
		  
	      
	    }
	    else 
	    {
           redirect(base_url());
	    }
		 
	}
    
    public function about($username)
	{
	   if($this->session->userdata('is_logged_in') == TRUE)
	    {         
          $user_id = $this->session->userdata('user_id');
          $result =  $this->userModel->profile($user_id, $username); 
          $data['userData'] = $result['userData']; 
          $data['profilePic'] = $result['profilePic']; 
          $result1 =  $this->UserProfileModel->getRank($username); 
          $data['rank'] = $result1['rank']; 
          $data['points'] = $result1['points']; 
          $data['Tquiz'] = $result1['Tquiz']; 
          $data['Tfollowers'] = $result1['Tfollowers']; 
          $data['countryName'] = $result['countryName']; 
          $data['stateName'] = $result['stateName']; 
          $data['townName'] = $result['townName']; 
          $data['followers'] = $result['followers'];  
          $this->load->view('users/head', $data);
          $this->load->view('users/header', $data);
          $this->load->view('users/sideBar');  
          $this->load->view('users/about', $data);
          $this->load->view('users/footer', $data);
          $this->load->view('users/changeProfilePictureModal');
		  $this->load->view('users/changeCaverPictureModal');
		  if($this->session->userdata('user_type') == 2){			  
			$this->load->view('quiz/newQuizModal');
			$this->load->view('quiz/quiz_js');
		  }
          $this->load->view('users/aboutJs');
          $this->load->view('users/notificationJs');
          $this->load->view('users/requestNotifiJs');
	      
	    }

	    else 
	    {
           redirect(base_url());
	    }		 
	}


	public function uploadProfilePic()
	{
	  if($this->session->userdata('is_logged_in') == TRUE   ) 
		{
            $user_id =  $this->session->userdata('user_type');
		    $new_name = $user_id.time().$_FILES["file"]['name'];	    

	       	$config['upload_path'] = './uploads/\profile_pic/'; 
		    $config['overwrite'] = 'TRUE';
		    $config['file_name'] = $new_name;
		    $config["allowed_types"] = 'jpg|jpeg|png|gif';
		    $config["max_size"] = '1024';
		    $config["max_width"] = '1020';
		    $config["max_height"] = '680';

		    $this->load->library('upload', $config);
	            
		        if(!$this->upload->do_upload("file"))
		        {               
		            $this->data['error'] = $this->upload->display_errors();
		            print_r( $this->data['error']);

		             $data = array(				
						'status'      => 0,
						'successMsg'  =>  $this->data['error'],
						'fimeName'    =>   $new_name
						 );

			    		echo json_encode($data);  
	        	} 

		        else 
		        {
		            $this->userModel->uploadProfilePicDB($new_name, $user_id); 
    

		        }
     	} 
	    else 
	    {
           redirect(base_url().'userAuth/logout');
	    }
		 
	}


	public function uploadProfile()
	{
         
          $data['mesg'] = 'done';
           $data['status'] = 1;

         echo json_encode($data);
	}
	 
}