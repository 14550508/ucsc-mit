<?php
class Admin_model extends CI_Model
{    
    
	
	public function checkLogin($username, $password)
	{
			$selp = 'zh_8cTpyV?W-P5W>~I*]33eF';
			$newPassword = MD5($password.$selp);
		   
		    $this->db->select('*');
	        $this->db->where('email', $username);
			$this->db->where('password', $newPassword);	
					
			$query = $this->db->get('nana_admin');	
			
		if($query->num_rows()== 1){
				
				$row = $query->row();
				
				if($row->status == 1)
					{
				
							$data = array
							(
								'sid'          => date('YmdHis').$row->u_id,
								'user_id'      => $row->u_id,
								'user_type'    => $row->user_type,
								'stp_fname'    => $row->stp_fname,
								'stp_lname'    => $row->stp_lname,
								'user_email'   => $row->email,
								'update_profile_info' => $row->update_profile_info,
								'is_logged_in' => true
							);			
			
							$this->session->set_userdata($data);
				
						
					 			
						if($row->user_type == 84)
							{
								$data_up = array
								(
									 'online_status' => '1',
									 'last_login' => date('Y-m-d H:i:s')
								);
								$where = "u_id = '".$row->u_id."'";
								$str = $this->db->update('nana_admin', $data_up, $where);
							
							
								//create log in histoer 
							
								$sidd = $this->session->userdata('sid');
		
		
							    $data = array (	
								'sid' => $sidd,
								'userid' => $row->u_id,		
								'login_date' => date('Y-m-d H:i:s'),		
								'logout_date' =>date('Y-m-d H:i:s'),                
								'ip_address' => $_SERVER['REMOTE_ADDR']            	
								);
        
							    $query = $this->db->insert('nana_admin_login_history', $data);
					
							    redirect(base_url().'admin_0572222845/index');
					
							}
						
						
							
						
							
									
										  
										  
										
							
							
					}
			else if($row->status == 0)
					{
					 redirect(base_url().'admin_0572222845/notactive');
					}
				else 
					{
					
					 redirect(base_url().'admin_0572222845/blockuser');
					 
					}
					
			}
				
		else 
			{	
			
			 redirect(base_url().'admin_0572222845/logInvalid');	
				
			}
		
	}
    public function profileUpdate($user_idd)
	{
			$this->db->select('*');
	        $this->db->where('u_id', $user_idd);			
				
			$query = $this->db->get('nana_admin');
			$row = $query->row();
			
		 $data = array (			
            'tp_title' => $this->input->post('tp_title'),		
            'stp_mname' => $this->input->post('stp_mname'),		
            'stp_dob' => $this->input->post('stp_dob'), 
			'stp_gender' => $this->input->post('stp_gender'),		
            'stp_telephone' => $this->input->post('stp_telephone'),		
            'stp_mobile' => $this->input->post('stp_mobile'), 
			'stp_relationship' => $this->input->post('stp_relationship'),		
            'stp_aboutus' => $this->input->post('stp_aboutus'),		
            'stp_profile_pic' => $this->input->post('stp_profile_pic'), 
			'stp_street_add1' => $this->input->post('stp_street_add1'),		
            'stp_street_add2' => $this->input->post('stp_street_add2'),		
            'stp_town' => $this->input->post('stp_town'), 
			'stp_district' => $this->input->post('stp_district'),		
            'stp_country' => $this->input->post('stp_country'),		
            'stp_NIC' => $this->input->post('stp_NIC'),
			'tp_working_place' => $this->input->post('tp_working_place'),		
            'tp_job_title' => $this->input->post('tp_job_title'),		
            'st_school_name' => $this->input->post('st_school_name'),	
			's_next_exam' => $this->input->post('s_next_exam'),		
            's_al_section' => $this->input->post('s_al_section'),		
            'p_parent_type' => $this->input->post('p_parent_type'),
			'create_datetime' => date('Y-m-d H:i:s'),
			'ud_id' => $user_idd
             );
        
			
		
            $where = "ukey = '".$row->token."'";
			$updateuser = $this->db->update('nana_admindata', $data, $where);
			
			 $data1 = array (			
            'update_profile_info' => 1,
			);
			
			$where1 = "u_id = '".$user_idd."'";
			$updatestatus = $this->db->update('nana_admin', $data1, $where1);
			
		if($this->session->userdata('user_type') == 84)
		{
		
		  redirect(base_url().'admin_0572222845/index');
		}
		
		else
		{
		
		 redirect(base_url().'users/index');
		}
	     
	}


		public function admin_profile()
	
	{	
	 $userId = $this->session->userdata('user_id');
		
		$this->db->select('*');
		$this->db->where('ud_id', $userId);
        $query = $this->db->get("nana_admindata");        
        $res['userdatas'] = $query->result();
		
		$this->db->select('*');
		$this->db->where('u_id', $userId);
        $query1 = $this->db->get("nana_admin");        
        $res['users'] = $query1->result();
       

        return $res;
		
     
    }
    
    public function sutdent_data(){
        
        $this->db->select('*');
        $query = $this->db->get("groupcategories");
        
        $res['category_list'] = $query->result();
        $res['row'] = $query->row();

        return $res;
        
    }
	
	public function profileEdit()
	{
	$user_idd = $this->session->userdata('user_id');
	if($_FILES['stp_profile_pic']['name'] !='')
		{
        
					$this->load->helper(array('form', 'url'));
					
					$rf = date("ymdHis");

					
					$upname = $rf.'_nana'.$_FILES['stp_profile_pic']['name'];
					

					
					$config['upload_path'] = './profiles';  
					$config['allowed_types'] = 'gif|jpg|png|JPG|GIF|PNG';
					$config['max_size'] = '500';
					$config['file_name'] = $upname;
					$config['resize'] =  array(
											 
											  'maintain_ratio'  =>  TRUE,
											  'width'           =>  200,
											  'height'          =>  200,
                  
											);
					$this->load->library('upload',$config);
					
					
					 if (!$this->upload->do_upload('stp_profile_pic')) 
					 {
						$error = array('error' => $this->upload->display_errors());
						return false;
					 } 
		$data1 = array (			 
		 'stp_profile_pic' => $upname,
		);
			$where1 = "ud_id = '".$user_idd."'";
			$updatestatus1 = $this->db->update('nana_admindata', $data1, $where1);
		
		
        
        } else {$upname ='';}	
	
	
		$user_idd = $this->session->userdata('user_id');
		 $data = array (			
            'tp_title' => $this->input->post('tp_title'),		
            'stp_mname' => $this->input->post('stp_mname'),		
            'stp_dob' => $this->input->post('stp_dob'), 
			'stp_gender' => $this->input->post('stp_gender'),		
            'stp_telephone' => $this->input->post('stp_telephone'),		
            'stp_mobile' => $this->input->post('stp_mobile'), 
			'stp_relationship' => $this->input->post('stp_relationship'),		
            'stp_aboutus' => $this->input->post('stp_aboutus'),		
            
			'stp_street_add1' => $this->input->post('stp_street_add1'),		
            'stp_street_add2' => $this->input->post('stp_street_add2'),		
            'stp_town' => $this->input->post('stp_town'), 
			'stp_district' => $this->input->post('stp_district'),		
            'stp_country' => $this->input->post('stp_country'),		
            'stp_NIC' => $this->input->post('stp_NIC'),
			'tp_working_place' => $this->input->post('tp_working_place'),		
            'tp_job_title' => $this->input->post('tp_job_title'),		
            'st_school_name' => $this->input->post('st_school_name'),	
			's_next_exam' => $this->input->post('s_next_exam'),		
            's_al_section' => $this->input->post('s_al_section'),		
            'p_parent_type' => $this->input->post('p_parent_type')
			
             );
        
			
			
			$where = "ud_id = '".$user_idd."'";
			$updatestatus = $this->db->update('nana_admindata', $data, $where);
			
		
			
			
		redirect(base_url().'admin_0572222845/editProfile_success');	
	     
	}

		public function newPassword()
	{
		$user_idd = $this->session->userdata('user_id');
		
		if($this->input->post('newPassword') !=''){
		
		$selp = 'zh_8cTpyV?W-P5W>~I*]33eF';        
        $postPassword = $this->input->post('newPassword');
        $newPass= MD5($postPassword.$selp);
			
		 $datap = array (		 
		 'password' => $newPass,
		);
		
		$wherep = "u_id = '".$user_idd."'";
		$newpass = $this->db->update('nana_admin', $datap, $wherep);
		}
		
		 $data = array (			
            'stp_fname' => $this->input->post(stp_fname),		
            'stp_lname' => $this->input->post('stp_lname')	
            );
        
			
		$where = "u_id = '".$user_idd."'";
		$updatestatus = $this->db->update('nana_admin', $data, $where);
			
		 redirect(base_url().'admin_0572222845editProfile');	
	     
	}

	public function codegen_model()
	{
		$user_type = $this->session->userdata('user_type');
		
		for( $i=1; $i<= 1000; $i++){
		echo $user_type;
		$random = substr( md5(rand()), 0, 16);
		
		$amount = 100;
		$data = array (			
            'code' => $random,		
            'amount' => $amount,		
            'status' => 0, 
			'user_id' => $user_type,	
			'date' => date('Y-m-d H:i:s')	
			);
			//$query = $this->db->insert('code_gen_nana', $data);
			echo '<br/>'.$random;
		}
	}
	
	public function codegen_model_status()
	
	{
		$user_type = $this->session->userdata('user_type');
		
		for( $i=1; $i<= 50; $i++){
		$data = array (			
          		
            'status' => 1
			);
			
			
			$this->db->where('id', $i);
			$this->db->where('status', 0);
			$this->db->update('code_gen_nana', $data);	
			
			echo 'Done id -'.$i;
			 $this->db->select('*');
			 $this->db->where('id', $i);
			  $this->db->where('status', 1);
              $query = $this->db->get("code_gen_nana");
        
        
				$row = $query->row();
		
		
			$data = array (	
			'code_id' => $row->id,
            'code' => $row->code,		
            'amount' => $row->amount,		
            'status' => 1, 
			'in_date' => date('Y-m-d H:i:s')	
			);
			$query = $this->db->insert('nana_live_codes', $data);
			
		}	
			
	}
	public function update_quiz_question()
	{
	
		//add new questions
			$this->db->select('*');
			$query = $this->db->get("nana_questions_bank_new");
			$new_questions = $query->result();
			
			foreach ($new_questions as $new_question)
			{
			
			$data_nq= array(
			
				'q_id' => $new_question->q_id,
				'question_category' => $new_question->question_category,	
				'name' => $new_question->name,		
				'questiontext' => $new_question->questiontext,		
				'qtype' => $new_question->qtype,		
				'tags' => $new_question->tags,		
				'status' => $new_question->status,		
				'create_datetime' => $new_question->create_datetime,		
				'update_datetime' => $new_question->update_datetime						
            			);
			
				$this->db->insert("nana_questions_bank", $data_nq);
			
			
			  $this->db->where('q_id', $new_question->q_id);
              $this->db->delete("nana_questions_bank_new");
			}
			
			echo 'Add New '.$query->num_rows().' Questions ';
		// add new questions answers
		
			$this->db->select('*');
			$queryqa = $this->db->get("nana_question_answers_new");
			$new_qas = $queryqa->result();
			
			foreach ($new_qas as $new_qa)
			{
			
			$data_qa= array(
			
				'q_id' => $new_qa->q_id,
				'answer_order' => $new_qa->answer_order,	
				'answer' => $new_qa->answer,		
				'fraction' => $new_qa->fraction,		
				'feedback' => $new_qa->feedback
				
				);
			
				$this->db->insert("nana_question_answers", $data_qa);
			
			
			  $this->db->where('q_id', $new_qa->q_id);
              $this->db->delete("nana_question_answers_new");
			}
			echo 'Add New '.$queryqa->num_rows().' Questions Answers ';
			
		// add new quiz questions 
			
			$this->db->select('*');
			$queryqq = $this->db->get("nana_quiz_question_new");
			$new_qqs = $queryqq->result();
			
			foreach ($new_qqs as $new_qq)
			{
			
			$data_qq= array(
			
				'qz_id' => $new_qq->qz_id,
				'q_id' => $new_qq->q_id,	
				'status' => $new_qq->status	
				
				);
			
				$this->db->insert("nana_quiz_question", $data_qq);
			
			
			  $this->db->where('q_id', $new_qq->q_id);
              $this->db->delete("nana_quiz_question_new");
			}
		
		echo 'Add New '.$queryqq->num_rows().' Quiz Questions ';
		
	}
	
	
	
     public function update_new_users()
	{
	
			$this->db->select('*');
			$query = $this->db->get("userpass");
			
			$this->db->order_by("id", "asc"); 
			$this->db->limit(1, 306);
			$new_users = $query->result();
			foreach ($new_users as $new_user)
			{
			
			$selp = 'zh_8cTpyV?W-P5W>~I*]33eF';
			$newPassword = MD5($new_user->password.$selp);
			
			
			
				$data = array (			
			            'token' => MD5('N'.$new_user->username),		
			            'stp_fname' =>'Temp',		
			            'stp_lname' => 'User',                
			            'email' => $new_user->username,		
			            'password' => $newPassword,                
			            'user_type' => 1,                
			            'account_type' => 4,                
			            'status' => 1,	
				    'create_datetime' => date('Y-m-d H:i:s'),
			            'sent_email' => 1,
				    'update_profile_info' => 22
			            );
			
				$this->db->insert("nana_users", $data);
				
				$data_ud = array (			
			            'ukey' => MD5('N'.$new_user->username)
			            );
			          $this->db->insert("nana_userdata", $data_ud);  
			}
	
	 redirect(base_url().'admin_0572222845/index');

	
	}
	
	public function update_user_enroll()
	{
	
			$this->db->select('*');
			$this->db->where('update_profile_info', 22);
			$query = $this->db->get("nana_users");
			$new_users_enrolls = $query->result();
			
			foreach ($new_users_enrolls as $new_users_enroll)
			{
			
					
					
				
				 $data1 = array (			
					          'qz_id' => 4,
						  'u_id' => $new_users_enroll->u_id,
						   'enroll_date' => date('Y-m-d H:i:s'),
						   'attempts' =>0,
						    'status' => 1
					             );
        
			
				$this->db->insert("quiz_enroll", $data1);
				
				 $data2 = array (			
					            
						
						 'qz_id' => 5,
						  'u_id' => $new_users_enroll->u_id,
						   'enroll_date' => date('Y-m-d H:i:s'),
						   'attempts' =>0,
						    'status' => 1
					             );
        
			
				$this->db->insert("quiz_enroll", $data2);
				
				 $data3 = array (			
					            
						
						 'qz_id' => 6,
						  'u_id' => $new_users_enroll->u_id,
						   'enroll_date' => date('Y-m-d H:i:s'),
						   'attempts' =>0,
						    'status' => 1
					             );
        
			
				$this->db->insert("quiz_enroll", $data3);
				
				
				 $data4 = array (			
					            
						
						 'qz_id' => 7,
						  'u_id' => $new_users_enroll->u_id,
						   'enroll_date' => date('Y-m-d H:i:s'),
						   'attempts' =>0,
						    'status' => 1
					             );
        
			
				$this->db->insert("quiz_enroll", $data4);
				
				$data5 = array (			
					            
						
						 'qz_id' => 8,
						  'u_id' => $new_users_enroll->u_id,
						   'enroll_date' => date('Y-m-d H:i:s'),
						   'attempts' =>0,
						    'status' => 1
					             );
        
			
				$this->db->insert("quiz_enroll", $data5);
				
				$data6 = array (			
					            
						
						 'qz_id' => 9,
						  'u_id' => $new_users_enroll->u_id,
						   'enroll_date' => date('Y-m-d H:i:s'),
						   'attempts' =>0,
						    'status' => 1
					             );
        
			
				$this->db->insert("quiz_enroll", $data6);
				
				
			$dataupd = array (
			'update_profile_info'=> 1
			);	
				 
			$this->db->where('token', $new_users_enroll->token);
			
			$query = $this->db->update("nana_users", $dataupd);
			
			
				
				
			}
	
	
	}
	
	
	
	public function update_user_uid()
	{
	
			$this->db->select('*');
			$query = $this->db->get("nana_users");
			$new_users = $query->result();
			
			foreach ($new_users as $new_user)
			{
			
			$dataupd = array (
			'ud_id'=> $new_user->u_id
			);	
				 
			$this->db->where('ukey', $new_user->token);
			
			$query = $this->db->update("nana_userdata", $dataupd);

			
			}
			
			 redirect(base_url().'admin_0572222845/index');
	}
	
	
	
		public function update_end_date()
	{
	
			$this->db->select('*');
			$query = $this->db->get("quiz_enroll");
			$new_enrolls  = $query->result();
			
			foreach ($new_enrolls as $new_enroll)
			{
			
			$dataupd = array (
			'end_date'=> '2015-08-30 00:00:00'
			);	
				 
			$this->db->where('end_date', '0000-00-00 00:00:00');
			
			$query = $this->db->update("quiz_enroll", $dataupd);

			
			}
			
			 redirect(base_url().'admin_0572222845/index');
	}
}
?>