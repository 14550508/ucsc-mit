<?php
class Users_model extends CI_Model
{    
    public function registrationPro($key_nanaid) // data insert to database,
       {   
        
        $selp = 'zh_8cTpyV?W-P5W>~I*]33eF';        
        $postPassword = $this->input->post('password');
        $newPass= MD5($postPassword.$selp);
        
        $data = array (			
            'token' => $key_nanaid,		
            'stp_fname' => $this->input->post('stp_fname'),		
            'stp_lname' => $this->input->post('stp_lname'),                
            'email' => $this->input->post('email'),		
            'password' => $newPass,                
            'user_type' => $this->input->post('user_type'),                
            'account_type' => 0,                
            'status' => 0,	
			'create_datetime' => date('Y-m-d H:i:s'),
            'sent_email' => 1,
			'update_profile_info' => 0
            );
        
            $query = $this->db->insert('nana_users', $data);
                   
            if($query)
			{ 

				$data1 = array (	
				
				'ukey' => $key_nanaid,
				
				);
			
				$query1 = $this->db->insert('nana_userdata', $data1);
                       
                redirect(base_url().'message/sign_up_message_successfully');                    
                
            }                   
            else {                        
                redirect(base_url().'message/message_error');                   
                
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
	
	
	public function update_user_status($key_nanaid)
	{
	
	 if($key_nanaid !="")
	 {
		$this->db->where('token', $key_nanaid);
		$user_status = $this->db->get('nana_users');	
		
		if($user_status)
		{			
			$row = $user_status->row();
			if($row->status ==1)
			{
				
				redirect(base_url().'message/already_activated');
				}
				else{
                                        $data = array('status' => '1');
                                        $where = "token = '".$key_nanaid."'";
                                        $str = $this->db->update('nana_users', $data, $where);
                                            
                                        
                                        redirect(base_url().'users');
                                        
						
				}
				
			}
			else
			{
				return false;
				
			}
				
		}
		else 
		{  
		
		}		
				
		
	}
	
	public function checkLogin($username, $password)
	{
			$selp = 'zh_8cTpyV?W-P5W>~I*]33eF';
			$newPassword = MD5($password.$selp);
		   
		    $this->db->select('*');
	        $this->db->where('email', $username);
			$this->db->where('password', $newPassword);	
					
			$query = $this->db->get('nana_users');	
			
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
				
						if($row->update_profile_info  == 0) {
					 			
						if($row->user_type == 1 || $row->user_type == 2)
							{
								$data_up = array
								(
									 'online_status' => '1',
									 'last_login' => date('Y-m-d H:i:s')
								);
								$where = "u_id = '".$row->u_id."'";
								$str = $this->db->update('nana_users', $data_up, $where);
							
							
								//create log in histoer 
							
								$sidd = $this->session->userdata('sid');
		
		
							    $data = array (	
								'sid' => $sidd,
								'userid' => $row->u_id,		
								'login_date' => date('Y-m-d H:i:s'),		
								'logout_date' =>date('Y-m-d H:i:s'),                
								'ip_address' => $_SERVER['REMOTE_ADDR']            	
								);
        
							    $query = $this->db->insert('nana_user_login_history', $data);
					
							    redirect(base_url().'users/createProfile');
					
							}
						
						
						    else 
								{
									$this->load->view('user');
									
								}
							
							}
							else 
							
							{
							
									    if($this->session->userdata('user_type') == 1)
										{
										  
										   redirect(base_url().'users/index');
										}
										
										else
										{
										
										 redirect(base_url().'teachers/index');
										}
							
							}
					}
			else if($row->status == 0)
					{
					 redirect(base_url().'users/notactive');
					}
				else 
					{
					
					 redirect(base_url().'users/blockuser');
					 
					}
					
			}
				
		else 
			{	
			
			 redirect(base_url().'users/logInvalid');	
				
			}
		
	}
    public function profileUpdate($user_idd)
	{
			$this->db->select('*');
	        $this->db->where('u_id', $user_idd);			
				
			$query = $this->db->get('nana_users');
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
			$updateuser = $this->db->update('nana_userdata', $data, $where);
			
			 $data1 = array (			
            'update_profile_info' => 1,
			);
			
			$where1 = "u_id = '".$user_idd."'";
			$updatestatus = $this->db->update('nana_users', $data1, $where1);
			
		if($this->session->userdata('user_type') == 1)
		{
		
		  redirect(base_url().'users/index');
		}
		
		else
		{
		
		 
		}
	     
	}  
     
}
?>