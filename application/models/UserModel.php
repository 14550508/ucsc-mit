<?php 
class UserModel extends CI_Model {

	public function userInsertData($stp_fname, $stp_lname, $email, $password, $user_type, $stp_username)
	{
        $key_nanaid = md5(uniqid());
        $selp = 'zh_8cTpyV?W-P5W>~I*]33eF';        
        $postPassword = $password;
        $newPass= MD5($postPassword.$selp);
        
        	$dataInsert1 = array (			
	            'token'        => $key_nanaid,		
	            'stp_fname'    => $stp_fname,		
	            'stp_lname'    => $stp_lname,
	            'username'     => $stp_username,                
	            'email'        => $email,		
	            'password'     => $newPass,                
	            'user_type'    => $user_type,                
	            'account_type'        => 0,                
	            'status'              => 3,	
				'create_datetime'     => date('Y-m-d H:i:s'),
	            'sent_email'          => 1,
				'update_profile_info' => 0
            );
        
        $query = $this->db->insert('nana_users', $dataInsert1);
        $insert_uid = $this->db->insert_id();

	        if($query)
			{
	        	$dataInsert2 = array (				
					'ukey' => $key_nanaid,
					'ud_id' => $insert_uid			
					);			    
				    
				$query1 = $this->db->insert('nana_userdata', $dataInsert2);  
	        }

                   
            if($query1)
			{ 

                 $insert_post_data = array
                (
                'post_user_id'    => $insert_uid, 
                'post_text'       => '',
                'post_image'      => '2017_01_26_welcome.jpg',
                'post_profile_id' => 1,
                'post_status'     => 1
                );

                $inqu =  $this->db->insert('nana_post', $insert_post_data);	

				// send email 
				   //SMTP & mail configuration
					$config = array(
						'protocol'  => 'smtp',
						'smtp_host' => 'ssl://smtp.googlemail.com',
						'smtp_port' => 465,
						'smtp_user' => 'ct.ranatunga@gmail.com',
						'smtp_pass' => 'CHamma_1587',
						'mailtype'  => 'html',
						'charset'   => 'utf-8'
					);

                    $this->load->library('email', array('mailtype'=>'html'));
				    $this->email->initialize($config);
                    $this->email->from('info@selp.com');
                    $this->email->to($email);
                    $this->email->subject('Confirm you account');

                    $con_message="Hi ". $stp_fname."</br>";
                    $con_message .="<p>Firstly we would like to thank you for becoming a member of SELP. Your are nearly there to complete the sing up process. To complete the sign Up process click on the link below.</p>";
                     
                    $con_message .="<p> <a href='".base_url()."register/confirmEmail/$key_nanaid'>Click here </a>to conformation your account.</p>";
                    $con_message .="<p>If you can't click on the link try and copy it and past it into the address bar of your browser. When logging into your account use your email address of ".$email." as your user name</p>";

                    $con_message .="<br/><p> SELP Team.</p>";

	                $this->email->message($con_message);

	                $this->email->send();                                        
                 
                     $data = array(				
						'status'    => 1

						 );

			   echo json_encode($data);  
            } 
            else {                        
                $data = array(				
				'status'   => 0,
				'errorMsg'  => 'Data Base Errro!'
				 );

			    echo json_encode($data);       
                
            }    
	}

	public function validateLoginInfo($email, $password)
	{

        $selp = 'zh_8cTpyV?W-P5W>~I*]33eF';
		$newPassword = MD5($password.$selp);
		   
	    $this->db->where('email', $email);
	    $this->db->where('password', $newPassword);					
		$query = $this->db->get('nana_users');	
		$row = $query->row();

		if($query->num_rows() == 1)
		{				
			if($row->status == 1 || $row->status == 3)
			{
			     $email = $row->email;
			     if($row->username !==""){
                 	$username = $row->username;
			     }else {
			     	$usernameEmail =  substr($email, 0, strrpos($email, '@'));
			     	$usernameEmail = str_replace(' ', '_', $usernameEmail);
        			$usernameEmail = str_replace('.', '_', $usernameEmail);
			     	$data_up = array
					(
					'username' => $usernameEmail.$row->u_id.$row->stp_lname,
					
					);

					$where = "u_id = '".$row->u_id."'";
					$str = $this->db->update('nana_users', $data_up, $where);	
                   $username =  $usernameEmail.$row->u_id.$row->stp_lname;

			     }               	

                 if($row->user_type == 1){
                    $userTypeText = 'students';
                 }	
                 else if($row->user_type == 2){
                    $userTypeText = 'teachers';
                 }
                 else if($row->user_type == 3){                    
                    $userTypeText = 'parents';
                 }	
				$data = array
					(
					'sid'          => date('YmdHis').$row->u_id,
					'user_id'      => $row->u_id,
					'user_type'    => $row->user_type,
					'fname'        => $row->stp_fname,
					'lname'        => $row->stp_lname,
					'user_type'    => $row->user_type,
					'username'     => $username,
					'userTypeText' =>  $userTypeText,
					'email'        => $row->email,
					'update_profile_info' => $row->update_profile_info,
					'is_logged_in' => true
					);			
			
			        $this->session->set_userdata($data);

			        $data_up = array
					(
					'online_status' => '1',
					'last_login' => date('Y-m-d H:i:s')
					);

					$where = "u_id = '".$row->u_id."'";
					$str = $this->db->update('nana_users', $data_up, $where);							
							
				    //create log in history 							
				    $sidd = $this->session->userdata('sid');	

				    $data_sess = array 
				    (	
					'sid'        => $sidd,
					'userid'     => $row->u_id,		
					'login_date' => date('Y-m-d H:i:s'),		
					'logout_date'=> date('Y-m-d H:i:s'),                
					'ip_address' => $_SERVER['REMOTE_ADDR']            	
					);        
					$query = $this->db->insert('nana_user_login_history', $data_sess);	

				//user_type check	
				                   
                    $data  = array
                    (
                    'status' => 1,
                    'username' => $username,
                    'userType' => $row->user_type
                    );
                     echo json_encode($data);   

			}
			else if($row->status == 2)
			{
                 $data  = array
		        (
		        'status' => 0,
		        'errorMsg' => 'Your account has been locked. Please contact SELP administrator!'
		        );  
		         echo json_encode($data); 
			}
			else {
               $data  = array
		        (
		        'status' => 0,
		        'errorMsg' => 'undefine Error! Please try again'
		        );  
		         echo json_encode($data); 
			}

	    } 

		else 
		{


	      
	      $data  = array
	        (
	        'status' => 0,
	        'errorMsg' => 'Incorrect email or password',
	        'row' =>$query->num_rows()
	        );  
	         echo json_encode($data);   


		}
    }

    public function is_key_nana_validation($key_nanaid)
	{
		
		$this->db->where('token', $key_nanaid);
		$query = $this->db->get('nana_users');	
		
		if($query->num_rows() == 1)
		{
			return true;			
		}
		else 
		{		
			return false;			
		}
	}
	
	public function resetPassword()
	{

     	$email = $this->input->post('email');
        $this->db->select('*');
        $this->db->where('email', $email);
        $query = $this->db->get('nana_users');
        $row = $query->row();
        $now_row = $query->num_rows();

        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
		$password = substr( str_shuffle( $chars ), 0, 6 );
		$selp = 'zh_8cTpyV?W-P5W>~I*]33eF';
		$newPasswordReset= MD5($password.$selp);			    
                
            if($now_row == 1)
            { 
                $data_up = array
					(
					'password' => $newPasswordReset
					);

				$this->db->where('email', $email);
				$this->db->update('nana_users', $data_up);	
						
				$config = array(
					'protocol'  => 'smtp',
					'smtp_host' => 'ssl://smtp.googlemail.com',
					'smtp_port' => 465,
					'smtp_user' => 'ct.ranatunga@gmail.com',
					'smtp_pass' => 'CHamma_1587',
					'mailtype'  => 'html',
					'charset'   => 'utf-8'
				);
				$this->load->library('email', array('mailtype'=>'html'));	
				$this->email->initialize($config);				 
				$this->email->from('info@selp.com');
				$this->email->to($email);
				$this->email->subject('Reset Password');					 
				$con_message="Hello ". $row->stp_lname."</br>";         
				$con_message .="Your password has been reset successfully!";   
				$con_message .="<p>New Password: ".$password. " </p>";				         
				$con_message .="<br/><p> SELP Team.</p>";					 
				$this->email->message($con_message);         
				$this->email->send();  				          
                
				 $data  = array
		        (
		        'status' => 1,
		        'successMsg' => 'Your password has been reset successfully! Your new password has been sent to your primary email address.',	        
		        );

	             echo json_encode($data); 
         
             }
                
            else
            {                    
               $data  = array
		        (
		        'status' => 0,
		        'errorMsg' => 'Invalid email address'		        
		        );

	            echo json_encode($data);  

            }   
	}	

    public function logoutUser($lonin_user)
    {

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

    public function updatepassword($uId, $newPassword)
    {
		
		$selp = 'zh_8cTpyV?W-P5W>~I*]33eF';
		$newPasswordUpdate = MD5($newPassword.$selp);
		
		if($user_status)
		{			
			$data = array('password' => $newPasswordUpdate);
			$where = "u_id = '".$uId."'";
			$str = $this->db->update('nana_users', $data, $where);
			
			$data = array
			(				
				'status'   => 1,
				'successMsg'  => 'Your password has been successfully'
			);

			echo json_encode($data); 				
				
		}
        else
        {   
        	$data = array
			(				
				'status'   => 0,
				'errorMsg'  => 'Database Error please try agin!'
			);

			echo json_encode($data); 
				
				
		}		
	}

	public function profile($user_id, $username)
	{         
        $this->db->join('nana_userdata', 'nana_users.u_id = nana_userdata.ud_id');
        $this->db->where('username', $username);
        $query = $this->db->get('nana_users');
        $data = $query->result();
        $row =  $query->row();

        if($query->num_rows() > 0 ){   

        $this->db->select('stp_profile_pic');
        $this->db->where('ud_id' , $user_id);
        $queryProfile = $this->db->get('nana_userdata');
        $profinePic = $queryProfile->row();



        $this->db->where('id' , $row->stp_country);
        $querycountry = $this->db->get('nana_countries');
        $country = $querycountry->row();

        $this->db->where('id' , $row->stp_state);
        $querystate = $this->db->get('nana_states');
        $state = $querystate->row();


        $this->db->where('id' , $row->stp_town);
        $querytown = $this->db->get('nana_cities');
        $town = $querytown->row();
       
         if($querycountry->num_rows() == 1){

             $rew['countryName'] = $country->name;

         }else{

         	 $rew['countryName'] = "";
         }


         if($querystate->num_rows() == 1){

             $rew['stateName'] = $state->name;

         }else{

         	 $rew['stateName'] = "";
         }


         if($querytown->num_rows() == 1){

             $rew['townName'] = $town->name;



         }else{

         	 $rew['townName'] = "";
         }

        }else {
        
        redirect(base_url());
        
        }
        if($data)
   		{
   		  	
	            
	            if($user_id == $row->u_id){

	                 $rew['followers'] = 0;  //same user profile 
	                 
	            } 


	            else{
                    // login user follower 

	            	$this->db->where('follow_user_id' ,$user_id);
		        	$this->db->where('follow_profile_id',$row->u_id);
			        $queryfollowers = $this->db->get('nana_followers');
			        $loginuserFollower = $queryfollowers->num_rows();
			        $followRowUser = $queryfollowers->row();

			          if($loginuserFollower == 1)
			          {

			          	    if($followRowUser->follow_status == 1)
			          	    {
                              $rew['followers'] = 2;   // confirmed request
			          	    }
			          	    else
			          	    {
			          	      $rew['followers'] = 10;   // login user sent follower request pending
			          	    }
                          
                           
			          }
			          else{
                            // profile user send request check
                           	$this->db->where('follow_user_id' ,$row->u_id);
				        	$this->db->where('follow_profile_id',$user_id);
					        $queryfollowers = $this->db->get('nana_followers');
					        $profileUserFollower = $queryfollowers->num_rows();
					        $followRowprofile = $queryfollowers->row();

					        if($profileUserFollower == 1){

		                            if($followRowprofile->follow_status == 1){

		                              $rew['followers'] = 3;   // confirmed request
					          	    }
					          	    else{

					          	       $rew['followers'] = 20;   // profile user sent follower request	pending
					          	    }
					        } 

					        else
					        {
                                 $rew['followers'] = 30;

					        }
			          }

                       
	            }	

   		  	$rew['userData'] = $query->result();
   		  	$rew['profilePic'] = $profinePic->stp_profile_pic;

   		  	
   		  	return $rew;
        }
        else 
        { 
           redirect(base_url());
        }

	}



	public function loginUserProfile($user_id)
	{         
        $this->db->join('nana_userdata', 'nana_users.u_id = nana_userdata.ud_id');
        $this->db->where('nana_users.u_id' , $user_id);
        $query = $this->db->get('nana_users');
        $data = $query->result();
        $row =  $query->row();

        $this->db->select('stp_profile_pic');
        $this->db->where('ud_id' , $user_id);
        $queryProfile = $this->db->get('nana_userdata');
        $profinePic = $queryProfile->row();       



        if($data)
   		{
   		  	$rew['userData'] = $query->result();
   		  	$rew['profilePic'] = $profinePic->stp_profile_pic;
   		  	
   		  	return $rew;
        }
        else 
        {     
           redirect(base_url());
        }


	}



	public function uploadProfilePicDB($new_name, $user_id)
	{         
        
        $update_data = array('stp_profile_pic' => $new_name );

       if($new_name !=""){

       	   $this->db->where("ud_id", $user_id);
           $this->db->update("nana_userdata", $update_data);

          $data = array(				
						'status'           => 1,
						'newProfilePic'    =>  $new_name
						 );

		   echo json_encode($data); 

       }

       else{

       	  $data = array(				
						'status'           => 0,
						'message'    =>  'Please select image'
						 );

		   echo json_encode($data); 
       }
         
	}


	public function uploadCoverPicDB($new_name, $user_id)
	{         
        
        $update_data = array('cover_pic' => $new_name );

       if($new_name !=""){

       	   $this->db->where("ud_id", $user_id);
           $this->db->update("nana_userdata", $update_data);

          $data = array(				
						'status'           => 1,
						'newProfilePic'    =>  $new_name
						 );

		   echo json_encode($data); 

       }

       else{

       	  $data = array(				
						'status'           => 0,
						'message'    =>  'Please select image'
						 );

		   echo json_encode($data); 


       }
         
	}



	public function uploadProfileDB()
	{          
       $dataUserUpdate = array( 
       	'stp_fname'       => $this->input->post('stp_fname'),
        'stp_lname'       => $this->input->post('stp_lname'),
        'email'           => $this->input->post('email')
         );
        $this->db->where('u_id', $this->session->userdata('user_id'));
        $this->db->update('nana_users',  $dataUserUpdate);
        
        $dataUpdate = array(        
        'stp_mname'       => $this->input->post('stp_mname'),
        'stp_dob'         => $this->input->post('stp_dob'),        
        'stp_gender'      => $this->input->post('stp_gender'),
        'stp_mobile'      => $this->input->post('stp_mobile'),
        'stp_telephone'   => $this->input->post('stp_telephone'),
        'stp_school_name' => $this->input->post('stp_school_name'),
        'stp_college'     => $this->input->post('stp_college'),
        'stp_gender'      => $this->input->post('stp_gender'),
        's_next_exam'     => $this->input->post('s_next_exam'),
        'stp_aboutus'     => $this->input->post('stp_aboutus')

        );

		    if( $this->input->post('stp_country') > 0 || $this->input->post('stp_country') != "" ){
		        $dataUpdate['stp_country'] =  $this->input->post('stp_country');
		    }

		    if( $this->input->post('stp_town') > 0 || $this->input->post('stp_town') != "" ){
		        $dataUpdate['stp_town'] =  $this->input->post('stp_town');
		    }

		    if( $this->input->post('stp_state') > 0 || $this->input->post('stp_state') != "" ){
		        $dataUpdate['stp_state'] =  $this->input->post('stp_state');
		    }

        $this->db->where('ud_id', $this->session->userdata('user_id'));
        $this->db->update('nana_userdata',  $dataUpdate);



        $data = array
			(				
				'status'   => 1,
				'successMsg'  => 'Profile details has been updated successfully'
			);

			echo json_encode($data);
	}

    public function uploadPasswordDB($newPassword, $oldPassword)
    {   
    	$key_nanaid = md5(uniqid());
        $selp = 'zh_8cTpyV?W-P5W>~I*]33eF';        
        $postPassword = $newPassword;
        
        $newPass= MD5($postPassword.$selp);
        $checkPass= MD5($oldPassword.$selp);

        $this->db->where('u_id', $this->session->userdata('user_id'));
        $this->db->where('password', $checkPass);					
		$query = $this->db->get('nana_users');	
		
		if($query->num_rows() == 1){

			$data_up = array(
					     'password' => $newPass						 
					     );
			$where = "u_id = '".$this->session->userdata('user_id')."'";
			$str = $this->db->update('nana_users', $data_up, $where);


			 $data = array
			(				
				'status'   => 1,
				
			);

			echo json_encode($data);


		}
		else{

			 $data = array
			(				
				'status'   => 0,
				
			);

			echo json_encode($data);


		}   	
		
		
    }

       
   
}