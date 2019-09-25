<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends CI_Controller {

	public function uploadImage(){   

		   if($this->session->userdata('is_logged_in') == TRUE   ) 
		   {
               $user_id =  $this->session->userdata('user_type');
		       $new_name = $user_id.time().$_FILES["file"]['name'];	    

	       	    $config['upload_path'] = './uploads/post/'; 
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
		          

		             $data = array(				
						'status'      => 0,
						'errorMsg'  =>  $this->data['error'],
						'fimeName'    =>   $new_name
						 );

			    		echo json_encode($data);  
	        	} 

		        else 
		        {
		            $data = array(				
						'status'      => 1,
						'successMsg'  => 'Image has been uploaded!',
						'fimeName'    =>   $new_name
						 );

			    	echo json_encode($data);    

		        }
     		} 
	}

	public function uploadImageDelete(){ 

            $image = $this->input->post('uploadfile');           
            unlink("./uploads/post/".$image);

            		 $data = array(				
						'status'      => 1,
						'successMsg'  =>  'Image has been deleted!'						
						 );

			    	echo json_encode($data);  
	}

	public function insertPost(){ 
        
        if($this->session->userdata('is_logged_in') == TRUE ) 
		{                     
           $this->load->model('postModel');
           $this->postModel->insertPostData();
        }

        else
        {
            $data = array(				
				'status'   => 0,
				'msg'  => 'Please Login!'
				 );

			echo json_encode($data); 
        }
         
	}

	


	public function getPostData(){ 
        
        if($this->session->userdata('is_logged_in') == TRUE ) 
		{                     
           
          
           $this->load->model('postModel');
           $this->postModel->getPostDataBD();
        }

        else
        {
            $data = array(				
				'status'   => 0,
				'msg'  => 'Please Login!'
				 );

			echo json_encode($data); 
        }
         
	}

	public function addComments()
	{ 
        
        if($this->session->userdata('is_logged_in') == TRUE ) 
		{  
           $this->load->model('postModel');
           $this->postModel->addCommentsDB();
        }

        else
        {
            $data = array(				
				'status'   => 0,
				'msg'  => 'Please Login!'
				 );

			echo json_encode($data); 
        }
         
	}
	public function totlaPostData()
	{
		 if($this->session->userdata('is_logged_in') == TRUE ) 
		{               
            
            $this->load->model('postModel');
            $this->postModel->totlaPostDataBD();
        }

	}


	public function getCommentsData()
	{ 
        
        if($this->session->userdata('is_logged_in') == TRUE ) 
		{               
            $post_id = $this->input->get('post_id');
            $limit = $this->input->get('limit');
            $this->load->model('postModel');
            $this->postModel->getCommentsDataBD($post_id, $limit);
        }

        else
        {
            $data = array(				
				'status'   => 0,
				'msg'  => 'Please Login!'
				 );

			echo json_encode($data); 
        }
         
	}


	public function deletePost(){ 
        
        if($this->session->userdata('is_logged_in') == TRUE ) 
		{                     
           $this->load->model('postModel');
           $this->postModel->deletePostDB();
        }

        else
        {
            $data = array(				
				'status'   => 0,
				'msg'  => 'Error!'
				 );

			echo json_encode($data); 
        }
         
	}


	public function editPostView(){ 
        
        if($this->session->userdata('is_logged_in') == TRUE ) 
		{                     
           $this->load->model('postModel');
           $this->postModel->editPostViewDB();
        }

        else
        {
            $data = array(				
				'status'   => 0,
				'msg'  => 'Error!'
				 );

			echo json_encode($data); 
        }
         
	}



	public function updatePost(){ 
        
        if($this->session->userdata('is_logged_in') == TRUE ) 
		{                     
           $this->load->model('postModel');
           $this->postModel->updatePostDB();
        }

        else
        {
            $data = array(				
				'status'   => 0,
				'msg'  => 'Error!'
				 );

			echo json_encode($data); 
        }
         
	}


	public function uploadProfilePic(){   

		   if($this->session->userdata('is_logged_in') == TRUE   ) 
		   {
               $user_id =  $this->session->userdata('user_id');
		       $new_name = $user_id.time().$_FILES["file"]['name'];	    

	       	    $config['upload_path'] = './uploads/profile_pic/'; 
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
		            $data = array(				
						'status'      => 1,
						'successMsg'  => 'Image has been uploaded!',
						'fimeName'    =>   $new_name
						 );

			    	echo json_encode($data);    

		        }
     		} 
	}
     

    public function updateProfilePic()
	{
	  if($this->session->userdata('is_logged_in') == TRUE   ) 
		   {
                 $user_id =  $this->session->userdata('user_id');
                 $new_name = $this->input->post('proedituploadfileId');

		            $this->load->model('userModel');
		            $this->userModel->uploadProfilePicDB($new_name, $user_id); 
    

     		} 
	    else 
	    {
           redirect(base_url().'userAuth/logout');
	    }
		 
	}  



	public function uploadCaverPic(){   

		   if($this->session->userdata('is_logged_in') == TRUE   ) 
		   {
               $user_id =  $this->session->userdata('user_id');
		       $new_name = $user_id.time().$_FILES["file"]['name'];	    

	       	    $config['upload_path'] = './uploads/caver_pic/'; 
		        $config['overwrite'] = 'TRUE';
		        $config['file_name'] = $new_name;
		        $config["allowed_types"] = 'jpg|jpeg|png|gif';
		        $config["max_size"] = '2048';
		        $config["max_width"] = '2048';
		        $config["max_height"] = '2048';

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
		            $data = array(				
						'status'      => 1,
						'successMsg'  => 'Image has been uploaded!',
						'fimeName'    =>   $new_name
						 );

			    	echo json_encode($data);    

		        }
     		} 
	}
     

    public function updateCaverPic()
	{
	  if($this->session->userdata('is_logged_in') == TRUE   ) 
		   {
                 $user_id =  $this->session->userdata('user_id');
                 $new_name = $this->input->post('caveredituploadfileId');

		            $this->load->model('userModel');
		            $this->userModel->uploadCoverPicDB($new_name, $user_id); 
    

     		} 
	    else 
	    {
           redirect(base_url().'userAuth/logout');
	    }
		 
	}  




	public function gettotalPost()
	{
	  if($this->session->userdata('is_logged_in') == TRUE ) 
		   {
                 $user_id =  $this->session->userdata('user_id');                

		            $this->load->model('postModel');
		            $this->postModel->gettotalPostDB($user_id);     

     		} 
	    else 
	    {
           redirect(base_url().'userAuth/logout');
	    }
		 
	}  

 public function deleteComments(){ 
        
        if($this->session->userdata('is_logged_in') == TRUE ) 
		{                     
           $this->load->model('postModel');
           $this->postModel->deleteCommentsDB();
        }

        else
        {
            $data = array(				
				'status'   => 0,
				'msg'  => 'Error!'
				 );

			echo json_encode($data); 
        }
         
	}

public function editGetComment(){ 
        
        if($this->session->userdata('is_logged_in') == TRUE ) 
		{                     
           $this->load->model('postModel');
           $this->postModel->editGetCommentDB();
        }

        else
        {
            $data = array(				
				'status'   => 0,
				'msg'  => 'Error!'
				 );

			echo json_encode($data); 
        }
         
	}


	public function addEditComments(){ 
        
        if($this->session->userdata('is_logged_in') == TRUE ) 
		{                     
           $this->load->model('postModel');
           $this->postModel->addEditCommentsDB();
        }

        else
        {
            $data = array(				
				'status'   => 0,
				'msg'  => 'Error!'
				 );

			echo json_encode($data); 
        }
         
	}



}

