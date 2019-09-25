<?php 
class FollowModel extends CI_Model {

	public function followingDB($profileId, $logedUser){

		$this->db->where('follow_user_id',    $logedUser);
		$this->db->where('follow_profile_id', $profileId);
		$query = $this->db->get('nana_followers');
		$numRow = $query->num_rows();

	
		if( $numRow == 0  && $logedUser !="" && $profileId !="")
		{
			$data  = array(
				'follow_user_id'    => $logedUser,
				'follow_profile_id' => $profileId,
				'follow_status'     => 0, 
				);
			$str = $this->db->insert('nana_followers' , $data);

			$postedById = $this->session->userdata('user_id');
            $postedBy   = $this->session->userdata('fname').' '.$this->session->userdata('lname');

			$insertnotif_data = array
                    (
                      'reno_profile_id'   =>  $profileId,
                      'reno_user_id'    =>  $postedById,                     
                    );
                      
                $insertnotif =  $this->db->insert('nana_request_notification', $insertnotif_data); 

                $data = array(				
						'status'  => 1,
						);
		         echo json_encode($data); 
		}
		else
		{       $data = array(				
						'status'  => 0,
						);
		        echo json_encode($data);
		}
	}

	public function unfollowDB($profileId, $logedUser)
	{
		$this->db->where('follow_user_id', $profileId);
		$this->db->where('follow_profile_id', $logedUser);
		$query = $this->db->delete('nana_followers');

		$this->db->where('follow_user_id',  $logedUser);
		$this->db->where('follow_profile_id', $profileId );
		$query1 = $this->db->delete('nana_followers');


		$this->db->where('reno_user_id', $profileId );
		$this->db->where('reno_profile_id', $logedUser);
		$query2 = $this->db->delete('nana_request_notification');

		$this->db->where('reno_user_id', $logedUser);
		$this->db->where('reno_profile_id', $profileId );
		$query3 = $this->db->delete('nana_request_notification');

	      $data = array(				
				'status'  => 1,
				);
		    echo json_encode($data);  
		

	}


	public function confirmRequestDB($profileId, $logedUser)
	{
		$update = array(
			'follow_status' => 1, 
			);

		$this->db->where('follow_user_id', $profileId);
		$this->db->where('follow_profile_id', $logedUser);
		$query = $this->db->update('nana_followers', $update);

		$this->db->where('reno_user_id', $profileId);
		$this->db->where('reno_profile_id', $logedUser );
		$query1 = $this->db->delete('nana_request_notification');

		$this->db->where('reno_user_id', $logedUser);
		$this->db->where('reno_profile_id', $profileId );
		$query3 = $this->db->delete('nana_request_notification');

		$postedById = $this->session->userdata('user_id');
        $postedBy   = $this->session->userdata('fname').' '.$this->session->userdata('lname');

		$insertnotif_data = array
                    (
                      'notifi_link'    => 'notification/requestConfirm/?profileId='.$profileId.'userId='.$logedUser, 
                      'notifi_users'   =>  $profileId,
                      'notifi_mess'    =>  $postedBy.' accepted your request',
                      'notifi_status'  => 1,
                    );
                      
                $insertnotif =  $this->db->insert('nana_notification', $insertnotif_data);


		if($query)
		{   $data = array(				
				'status'  => 1,
				);
		    echo json_encode($data);  
		}
		else
		{  
		    $data = array(				
				'status'  => 0,
			);
	        echo json_encode($data);
		}

	}

	public function findDB($keyword){

		$this->db->select('CONCAT(stp_fname, " ", stp_lname) as text, u_id as id', FALSE);
		$this->db->like('stp_fname ', $keyword);
		$this->db->or_like('stp_lname ', $keyword);
		$this->db->where('status ', 1, 2);
    	$this->db->limit(5);			
		$query = $this->db->get('nana_users');                        
        $query->result();
         
        foreach ($query->result() as $quiz) 
        {
            $rows[] = $quiz;
        }
        
        echo  json_encode($rows); 
	}


	public function getUsernameDB($user_id){		
		
		$this->db->where('u_id', $user_id);
    	$query = $this->db->get('nana_users');                        
        $row = $query->row();

        if($query->num_rows() > 0){

        	if($row->username ==""){

        		$email = $row->email;

        		$usernamemake =  substr($email, 0, strrpos($email, '@'));
        		$usernamemake = str_replace(' ', '_', $usernamemake);
        		$usernamemake = str_replace('.', '_', $usernamemake);
			     	$data_up = array
					(
					'username' => $usernamemake.$row->u_id.$row->stp_lname,
					
					);

					$where = "u_id = '".$row->u_id."'";
					$str = $this->db->update('nana_users', $data_up, $where);

					$username = $usernamemake.$row->u_id.$row->stp_lname;
        	}

        	else{
              $username = $row->username;

        	}

       
         
        $data  = array(
        	'username' => $username,
        	'userType' => $row->user_type,
         );


        }

        else
        {

        	$data =0;
        }
       
        
        echo  json_encode($data); 
	}

  
	

}

?>