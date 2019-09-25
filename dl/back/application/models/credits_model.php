<?php

class Credits_model extends CI_Model{
    
    
    
   
	
	public function cdlist_model(){
        
			$userId = $this->session->userdata('user_id');
			
		
		
			$this->db->select('*');
			$this->db->where('u_id', $userId);
			$this->db->order_by('add_date', 'DESC');
			$query = $this->db->get("nana_user_credit");        
			$res['credits'] = $query->result();
			$res['cd_rows'] = $query->num_rows();
		
		return $res;
		
        
    }
	
	
	public function ucdlist_model(){
        
			$userId = $this->session->userdata('user_id');
			
		
		
			$this->db->select('*');
			$this->db->where('u_id', $userId);
			$this->db->order_by('date', 'DESC');
			$query = $this->db->get("nana_payment");        
			$res['ucredits'] = $query->result();
			$res['ucd_rows'] = $query->num_rows();
		
		return $res;
		
        
    }
	
	
	
	
	
    
}

