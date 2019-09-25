<?php

class Students_model extends CI_Model{
    
    public function sutdent_profile()
	
	{	
	 $userId = $this->session->userdata('user_id');
		
		$this->db->select('*');
		$this->db->where('ud_id', $userId);
        $query = $this->db->get("nana_userdata");        
        $res['userdatas'] = $query->result();
		
		$this->db->select('*');
		$this->db->where('u_id', $userId);
        $query1 = $this->db->get("nana_users");        
        $res['users'] = $query1->result();
		
		
		$todate = date('Y-m-d H:i:s');
		$this->db->select('*');
		$this->db->where('u_id', $userId);
		$this->db->where('end_date  >=', $userId);
        $query2 = $this->db->get("quiz_enroll");         
		$res['num_enrolls'] = $query2->num_rows();
       

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
			$updatestatus1 = $this->db->update('nana_userdata', $data1, $where1);
		
		
        
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
            'p_parent_type' => $this->input->post('p_parent_type'),
			'bgColor' => $this->input->post('bgColor')
			
             );
        
			
			
			$where = "ud_id = '".$user_idd."'";
			$updatestatus = $this->db->update('nana_userdata', $data, $where);
			
		
			
			
		redirect(base_url().'students/editProfile_success');	
	     
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
		$newpass = $this->db->update('nana_users', $datap, $wherep);
		}
		
		 $data = array (			
            'stp_fname' => $this->input->post('stp_fname'),		
            'stp_lname' => $this->input->post('stp_lname')	
            );
        
			
		$where = "u_id = '".$user_idd."'";
		$updatestatus = $this->db->update('nana_users', $data, $where);
			
		 redirect(base_url().'students/editProfile');	
	     
	}  
    
}

