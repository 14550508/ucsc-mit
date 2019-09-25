<?php

class Enroll_model extends CI_Model{
    
    
    
   
	
	public function enroll_quiz(){
        
			$userId = $this->session->userdata('user_id');
			$todate = date('Y-m-d H:i:s');
			$this->db->select('*');
			$this->db->where('u_id', $userId);
			//$this->db->where('end_date  >=', $todate);
			$query2 = $this->db->get("quiz_enroll");  
			$num_enrolls = $query2->num_rows();
			$row = $query2->row();
			
		if($num_enrolls > 0){
		
			$this->db->select('nana_quiz.qz_id, nana_quiz.qz_name, quiz_enroll.enroll_date, nana_quiz.total_points, quiz_enroll.attempts, nana_quiz.attempts_allowed, quiz_enroll.end_date,  nana_quiz.qz_information, nana_quiz.qz_into_image');
			$this->db->join('nana_quiz', 'quiz_enroll.qz_id = nana_quiz.qz_id');
			$this->db->where('quiz_enroll.u_id', $userId);
			//$this->db->where('quiz_enroll.end_date  >=', $todate);
			$query = $this->db->get("quiz_enroll");        
			$res['quiz_enrolls'] = $query->result();
			$res['enroll_rows'] = $query->num_rows();
		
		 return $res;
		} else {
		$res['enroll_rows'] = 0;
		$res['quiz_enrolls'] = 0;
		return $res;
		}
        
    }
	
	
	
	
	
    
}

