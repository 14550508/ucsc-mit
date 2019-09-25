<?php 
class NotificationModel extends CI_Model {

	public function requestDB($user_id){

		$this->db->join('nana_users', 'nana_request_notification.reno_user_id = nana_users.u_id');
		$this->db->join('nana_userdata', 'nana_users.u_id = nana_userdata.ud_id');
		$this->db->where('nana_request_notification.reno_profile_id', $user_id);
		$query = $this->db->get('nana_request_notification');
       
		if($query->num_rows() > 0){

			foreach ($query->result() as $row) 
	          {
	             $data[] = $row;
	          }

		}else{
             $data = 0;
		}

		echo json_encode($data); 


	}


	public function listDB($user_id){

		$this->db->join('nana_users', 'nana_notification.notifi_users = nana_users.u_id');
		$this->db->join('nana_userdata', 'nana_users.u_id = nana_userdata.ud_id');
		$this->db->where('nana_notification.notifi_users', $user_id);
		$query = $this->db->get('nana_notification');
       
		if($query->num_rows() > 0){

			foreach ($query->result() as $row) 
	          {
	             $data[] = $row;
	          }

		}else{
             $data = 0;
		}

		echo json_encode($data); 


	}



}

?>