<?php

class Invoices_model extends CI_Model{
    
    
    
   
	
	public function invs_model(){
        
			$userId = $this->session->userdata('user_id');
			
		
		
			$this->db->select('nana_quiz.qz_id, nana_quiz.qz_name, nana_invoice.inv_id, nana_invoice.inv_no, nana_invoice.qty, nana_invoice.unit_price,
			nana_invoice.sub_total,  nana_invoice.payment_type, 
			nana_invoice.payment_status, nana_invoice.inv_date, nana_quiz.qz_information, nana_quiz.qz_into_image');
			$this->db->join('nana_quiz', 'nana_invoice.qz_id = nana_quiz.qz_id');
			$this->db->where('nana_invoice.u_id', $userId);
			$this->db->select_sum('final_total', 'final_total');
			$this->db->group_by('nana_invoice.inv_no');
			$this->db->order_by('inv_date', 'DESC');
			$query = $this->db->get("nana_invoice");        
			$res['invoices'] = $query->result();
			$res['inv_rows'] = $query->num_rows();
		
		return $res;
		
        
    }
	
	
	
	
	
    
}

