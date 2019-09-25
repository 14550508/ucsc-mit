<?php

class Quiz_model extends CI_Model{
    
    public function addQuiz(){
        
        
        $data = array(
            'c_id' => $this->input->post('qcourse'),
            'qz_name' => $this->input->post('ccode'),
            'qz_information' => $this->input->post('qintroduction'),
            'attempts_allowed' => $this->input->post('qattempts'),
            'security_key' => $this->input->post('cskey'),
            'shuffle_questions' => $this->input->post('qshuffle'),
            'start_quiz' => $this->input->post('qopen'),
            'end_quiz' => $this->input->post('qclose'),
        );
        
        $query = $this->db->insert('quiz',$data);
        if($query){
            return true;
        } else {
            return false;
        }
    }
    
    public function quiz_cats(){
        
        $this->db->select('*');
		$this->db->where('status', 1);
        $query = $this->db->get("nana_quiz_category");
        
        $res['quiz_cats'] = $query->result();
        $res['row'] = $query->row();

        return $res;
        
    }
	
	public function quiz_list($qz_cat_id){
        
        $userId = $this->session->userdata('user_id');
		$todate = date('Y-m-d H:i:s');
	
		    $this->db->select('*');
			$this->db->where('status', 1);
			$this->db->where('qu_cat_id', $qz_cat_id);
			$query = $this->db->get("nana_quiz");
			
			$res['quiz_lists'] = $query->result();
			$res['row'] = $query->row();
		
		
		
		

        return $res;
        
    }
	
	
	
	public function quiz_detail($qz_id){
        
        $this->db->select('*');
		$this->db->where('status', 1);
		$this->db->where('qz_id', $qz_id);
        $query = $this->db->get("nana_quiz");
        
        $res['quiz_details'] = $query->result();
        $res['row'] = $query->row();

        return $res;
        
    }
	
	public function add_attempt($qz_id){
	
        $userId = $this->session->userdata('user_id');
		$todate = date('Y-m-d H:i:s');
		
        $this->db->select('*');
		$this->db->where('status', 1);
		$this->db->where('u_id', $userId);
		//$this->db->where('end_date  >=', $todate);
		$this->db->where('qz_id', $qz_id);		
        $query = $this->db->get("quiz_enroll");
		$row = $query->row();
		$num_rows = $query->num_rows();
		
		$this->db->select('*');
		$this->db->where('up_id', $userId);
		$this->db->where('qz_attempt', $row->attempts);
		$this->db->where('qz_id', $qz_id);		
        $queryph = $this->db->get("nana_point_history");
		$rowph = $queryph->row();

		if($row->attempts == 0) {
		
		$num_rowsph = 1;
		
		}
		
		else {
		
		$num_rowsph = $queryph->num_rows();
		
		
		}
		
		if($num_rows > 0 && $num_rowsph == 1){
		
			$data=array(
			'attempts' =>$row->attempts + 1
			);
			 $this->db->where('qz_id', $qz_id);
			 $this->db->where('u_id', $userId);
			 $query = $this->db->update("quiz_enroll", $data);
			 
			 $res['message'] = 'Update Done';
		  
		}
		
		else {
		
		 $res['message'] = 'Not Updated';
		 
		
		}

         return $res;
    }
	
	public function quiz_questions($qz_id)
	{
			$userId = $this->session->userdata('user_id');
			$this->db->select('
			nana_quiz.qz_name, 
			nana_questions_bank.name, 
			nana_questions_bank.questiontext,
			nana_questions_bank.qtype,
			nana_question_answers.answer_order,
			nana_question_answers.answer_order,
			nana_question_answers.answer, 
			nana_question_answers.fraction,
			nana_question_answers.feedback,
			nana_question_categories.cat_name,
			nana_quiz.time, 
			nana_quiz.total_points
			');
			
			
			$this->db->join('nana_quiz', 'nana_quiz_question.qz_id = nana_quiz.qz_id');
			$this->db->join('nana_quiz_question', 'nana_questions_bank.q_id = nana_quiz_question.q_id');
			$this->db->join('nana_questions_bank', 'nana_question_answers.q_id = nana_questions_bank.q_id');
			$this->db->join('nana_questions_bank', ' nana_question_categories.qc_id = nana_questions_bank.question_category');
		    $this->db->where('nana_quiz.qz_id', $qz_id);
		    $query = $this->db->get("nana_quiz");  
      
			$res['quiz_questions'] = $query->result();
			$res['qq_rows'] = $query->num_rows();
			
			return $res;
	
	
	
	
	}
	
	public function save_answers($qz_id, $attempt, $userId)
	{
		
	    $count = count($this->input->post('q_id'));
		
		
        if($count > 0)
		{
            for( $i = 0; $i <= $count-1; $i++ )
			
			{
			
			$q_id =  $this->input->post('q_id')[$i];			
			$qa =  $this->input->post('qa_'.$this->input->post('q_id')[$i]);
			
				if($qa !="")
				{
				
					$this->db->select('*');
					$this->db->where('q_id', $q_id);
					$this->db->where('u_id', $userId);
					$this->db->where('qz_id', $qz_id);
					$this->db->where('attempts ', $attempt);
					$query = $this->db->get("nana_user_temp_answers");
					$num_rows = $query->num_rows();
					
					$this->db->select('*');
					$this->db->where('q_id', $q_id);
					$this->db->where('fraction', 1);
					$queryqa = $this->db->get(" nana_question_answers");
					$qa_row = $queryqa->row();
					
						if($qa == $qa_row->answer_order)
						{
						 $f = 1;
						}
						else 
						{
						$f =0;
						}
						
						
						if($num_rows > 0)
						{
							$data=array(
								'user_answer' =>$qa,
								'answer_date' => date('Y-m-d H:i:s'),
								'fraction' => $f
							);
							
							$this->db->where('q_id', $q_id);
							$this->db->where('u_id', $userId);
							$this->db->where('qz_id', $qz_id);
							$this->db->where('attempts ', $attempt);
							
								
							$query = $this->db->update("nana_user_temp_answers", $data);
						
						}
						else 
						{
									
							$data = array(
								'u_id' => $userId,
								'qz_id'=> $qz_id,
								'q_id' => $q_id,
								'attempts' => $attempt,
								'user_answer' => $qa,
								'correct_answer' => $qa_row->answer_order,
								'fraction' => $f,
								'answer_date' => date('Y-m-d H:i:s'),
							);
							
							$query = $this->db->insert('nana_user_temp_answers',$data);
							
						}
						
						
				}
				
			
			
			
			}
			
		}
	
	
	
	
	}
	
	
	public function submit_answers($qz_id, $attempt, $userId)
	{
		
	    $count = count($this->input->post('q_id'));
		$corrections =0;
		
		if($count > 0)
		{
            for( $i = 0; $i <= $count-1; $i++ )
			
			{
			
			$q_id =  $this->input->post('q_id')[$i];			
			$qa =  $this->input->post('qa_'.$q_id);
			
				if($qa !="")
				{
					$this->db->select('*');
					$this->db->where('q_id', $q_id);
					$this->db->where('fraction', 1);
					$queryqa = $this->db->get(" nana_question_answers");
					$qa_row = $queryqa->row();
					
					
				
					$this->db->where('q_id', $q_id);
					$this->db->where('u_id', $userId);
					$this->db->where('qz_id', $qz_id);
					$this->db->where('attempts', $attempt);
					$query = $this->db->delete("nana_user_temp_answers");
					
					$this->db->select('*');
					$this->db->where('q_id', $q_id);
					$this->db->where('u_id', $userId);
					$this->db->where('qz_id', $qz_id);
					$this->db->where('attempts', $attempt);
					$query6 = $this->db->get("nana_user_answers");
					$num_rows6 = $query6->num_rows();
						
						if($qa == $qa_row->answer_order)
						{
						
						$corrections += 1;
						
						 $f = 1;
						}
						else 
						{
						$f =0;
						}
						
						if($num_rows6 > 0)
						{
							$data=array(
								'user_answer' =>$qa,
								'answer_date' => date('Y-m-d H:i:s'),
								'fraction' => $f
							);
							
							$this->db->where('q_id', $q_id);
							$this->db->where('u_id', $userId);
							$this->db->where('qz_id', $qz_id);
							$this->db->where('attempts ', $attempt);
							
								
							$query = $this->db->update("nana_user_answers", $data);
						
						}
						
						else {
									
							$data = array(
								'u_id' => $userId,
								'qz_id'=> $qz_id,
								'q_id' => $q_id,
								'attempts' => $attempt,
								'user_answer' => $qa,
								'correct_answer' => $qa_row->answer_order,
								'fraction' => $f,
								'answer_date' => date('Y-m-d H:i:s'),
							);
							
							$query = $this->db->insert('nana_user_answers',$data);
							
						}
						
						
						
				}
				
				
			
			
			
			}
			
			
						
			// add points
			        $this->db->select('*');
					$this->db->where('qz_id', $qz_id);
					$query8 = $this->db->get("nana_quiz");
					$row8 = $query8->row();
					
					$this->db->select('*');
					$this->db->where('qz_id', $qz_id);
					$query9 = $this->db->get("nana_quiz_question");
					$num_rows9 = $query9->num_rows();
					
			$qz_points = $row8->total_points;
			
			$t_points1 = round(($corrections/$num_rows9)*$qz_points);
			if($attempt == 1) {
			$t_points = $t_points1;
			
			}else {
			
			$t_points = 0;
			}
			
			$datap = array(
							'up_id' => $userId,
							'qz_id' => $qz_id, 
							'qz_attempt' => $attempt,
							'corrections' => $corrections,
							'num_quetions' => $num_rows9,
							'points'=> $t_points,
							'reason' => $row8->qz_name,
							'add_date' => date('Y-m-d H:i:s'),
							
							);
							
							$queryp = $this->db->insert('nana_point_history',$datap);
			
			
			
			$this->db->select('*');
			$this->db->where('u_id', $userId);
			$querypt = $this->db->get("nana_points");  	
			$ptr = $querypt->row();
			$ptrow = $querypt->num_rows();
			
			
				if($ptrow > 0 )
				{
					$data=array(
							'points' => $ptr->points + $t_points,
								);
					 $this->db->where('u_id', $userId);
					 $queryUP = $this->db->update("nana_points", $data);
				
				}
				else 
				{
					$datap = array(
							'u_id' => $userId,
							'points'=> $t_points,
							'update_date' => date('Y-m-d H:i:s'),
							
							);
							
							$queryp = $this->db->insert('nana_points',$datap);
			
				
				
				}
			
		}
	
	
	 
	
	}
	
	public function quiz_list_dpl(){
        
        $userId = $this->session->userdata('user_id');
		$todate = date('Y-m-d H:i:s');
	
		    $this->db->select('*');
			$this->db->where('status', 1);
			$this->db->where('qu_cat_id', 4);
			$query = $this->db->get("nana_quiz");
			
			$res['quiz_lists'] = $query->result();
			$res['row'] = $query->row();
		
		
		
		

        return $res;
        
    }
	
	public function quiz_list_iq(){
        
        $userId = $this->session->userdata('user_id');
		$todate = date('Y-m-d H:i:s');
	
		    $this->db->select('*');
			$this->db->where('status', 1);
			$this->db->where('qu_cat_id', 3);
			$query = $this->db->get("nana_quiz");
			
			$res['quiz_lists'] = $query->result();
			$res['row'] = $query->row();
		
		
		
		

        return $res;
        
    }
	
	public function quiz_list_phy(){
        
        $userId = $this->session->userdata('user_id');
		$todate = date('Y-m-d H:i:s');
	
		    $this->db->select('*');
			$this->db->where('status', 1);
			$this->db->where('qu_cat_id', 1);
			$query = $this->db->get("nana_quiz");
			
			$res['quiz_lists'] = $query->result();
			$res['row'] = $query->row();
		
		
		
		

        return $res;
        
    }
	
	public function quiz_list_che(){
        
        $userId = $this->session->userdata('user_id');
		$todate = date('Y-m-d H:i:s');
	
		    $this->db->select('*');
			$this->db->where('status', 1);
			$this->db->where('qu_cat_id', 2);
			$query = $this->db->get("nana_quiz");
			
			$res['quiz_lists'] = $query->result();
			$res['row'] = $query->row();
		
		
		
		

        return $res;
        
    }
    
}