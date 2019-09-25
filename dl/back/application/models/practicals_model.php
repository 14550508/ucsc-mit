<?php

class Practicals_model extends CI_Model{
	
	
      public function soql()
       {
          
            $this->db->select('*');   
                      
            $query = $this->db->get('organic_questions');
            $row = $query->row();
            
            $ret['oqlist'] = $query->result();
            $ret['num_quiz'] = $query->num_rows();
          
            return $ret; 
            
            
        }
        
        public function oqal($oqid, $user_id){
            
            $this->db->select('*');   
            $this->db->where('q_id', $oqid); 
            $this->db->where('user_id', $user_id);
            $this->db->group_by("member_id");
            $query2 = $this->db->get('organic_user_group');
            $row = $query2->row();
          
            $this->db->select('*');   
            $this->db->where('q_id', $oqid);         
            $query = $this->db->get('organic_members');
            $row = $query->row();
            
            $ret['oqalist'] = $query->result();
            $ret['num_ans'] = $query->num_rows();
            
            $this->db->select('*');   
            $this->db->where('q_id', $oqid);    
            $this->db->order_by("sort", "asc");
            $query1 = $this->db->get('organic_groups');
            $row = $query1->row();
            
            $ret['oqqlist'] = $query1->result();
            $ret['num_quz'] = $query1->num_rows();
            
            $ret['ans_grp'] = $query2->result();
            $ret['num_ansg'] = $query2->num_rows();
            
            
            return $ret;
            
          
         
            
            
        }
        
        private function get_Group_answers($oqid, $user_id)
	{
           
            
            
            $this->db->select('*');   
            $this->db->where('q_id', $oqid); 
            $this->db->where('user_id', $user_id);
            $this->db->group_by("member_id");
            $query = $this->db->get('organic_user_groups');
            $row = $query1->row();
            
            $ret['ans_grp'] = $query->result();
            $ret['num_ansg'] = $query->num_rows();
            
            return $ret;
            
	}
        
        
        public function updateGroups($group_id)
	 {
	       $html = "";
                    $oqid = $this->session->userdata('q_id');
                    $user_id = $this->session->userdata('userid');
                    $this->db->select('organic_user_group.member_id, organic_members.member_image');                           
                    $this->db->join('organic_members', 'organic_user_group.member_id = organic_members.member_id');
                    $this->db->where('organic_user_group.q_id', $oqid);
                    $this->db->where('organic_user_group.group_id', $group_id);
                    $this->db->where('organic_user_group.user_id' , $user_id);		
                    $this->db->group_by('organic_user_group.member_id'); 
                    $query = $this->db->get('organic_user_group');		
                            	
                    $row = $query->row();           
                    $rows = $query->num_rows();	

                    if($rows >0)
                        {    
                  $html .= "<li><img src='".base_url()."img/organic/".$row->member_image."' rel='".$row->member_id."'></li>\n";  
                         
                        }
                
                return $html;
                
                
	}
        
        public function addAnswers($m_id, $g_id, $oqid)                
                {
                $user_id = $this->session->userdata('userid');   
                $this->db->select('*');
		$this->db->where('group_id', $g_id);
                $this->db->where('q_id', $oqid);
                $this->db->where('user_id', $user_id);
		$query = $this->db->get('organic_user_group');		
		$rows = $query->result();		
		$row = $query->row();
               
                    if($rows ==0)
                        {
                            $data = array (		
                                            'member_id' => $m_id	
                                            );    
                   
                            $this->db->where('group_id', $g_id);
                            $this->db->where('qid', $oqid);
                            $this->db->update('organic_user_group', $data, $where);
                        
                            
                        
                        }
                        else {
                            
                            $this->db->where('group_id' , $g_id);
                            $this->db->where('q_id' , $oqid);
                            $this->db->where('user_id' , $user_id);
                            $this->db->delete('organic_user_group'); 
                            
                            
                            $data = array (
                                'user_id' => $user_id,
                                'group_id' => $g_id,
                                'member_id' => $m_id,
                                'sort' => 'sort'+1,
                                'q_id' =>  $oqid
                                );
                            $query = $this->db->insert('organic_user_group', $data);  
                            
                        }
                        
                       
                        $this->db->select('*');   
			$this->db->where('q_id', $oqid);    
			$this->db->order_by("sort", "asc");
			$query1 = $this->db->get('organic_groups');
			$row = $query1->row();
			$groups = $query1->result();
			
                        
			if($groups)                 
			 {
                        $html = "";
                         				
			$html .= "<div class='row product-list' id='draggable_quz'>";
                        foreach($groups as $group)
                        {
                        $group_id = $group->group_id;

                         
			if($group->type==1){
                            
                        $html .= "<div class='col-md-3'>"; 	
			$html .= "<div id='".$group->group_id."' class='col-lg-3 group'>";
                        $html .= "<div class='title'>".$group->group_name."</div>";
			$html .= "<div id='added".$group->group_id."' class='add' style='display:none;' ><img src='".base_url()."img/organic/green.jpg' width='25' height='25'></div>";
			$html .= "<div id='removed".$group->group_id."' class='remove' style='display:none;' ><img src='".base_url()."img/organic/red.jpg' width='25' height='25'></div>";
			$html .= "<ul class='g1'>\n";
			$html .= $this->updateGroups($group_id);
			$html .= "</ul>\n";
			$html .= "</div>\n";
			$html .= "</div>";
                        
                        }
							
                        else if($group->type==0){
								
                            $html .= "<div class='col-md-3'>"; 	
							
                            $html .= "<div id='".$group->group_id."' class='col-lg-3 group'>";
										
                            $html .= "<div id='added".$group->group_id."' class='add' style='display:none;' ><img src='".base_url()."img/organic/green.jpg' width='25' height='25'></div>";
										
                            $html .= "<div id='removed".$group->group_id."' class='remove' style='display:none;' ><img src='".base_url()."img/organic/red.jpg' width='25' height='25'></div>";
										
                            $html .= "<ul class='g0'>\n";
										
                            $html .= $this->updateGroups($group->group_id);
										
                            $html .= "</ul><br/><br/><br/><br/>";
							
                            $html .= "<img class='group2' src='".base_url()."img/organic/arrow.png' width='200' height='15' >";
							
                            $html .= "</div>";	
                            
                        }
							
							
                        else if($group->type==2){
								
                            $html .= "<div class='col-md-3'>";	
							
                            $html .= "<div id='".$group->group_id."' class='col-lg-3 group'>";
										
                            $html .= "<div id='added".$group->group_id."' class='add' style='display:none;' ><img src='".base_url()."img/organic/green.jpg' width='25' height='25'></div>";
										
                            $html .= "<div id='removed".$group->group_id."' class='remove' style='display:none;' ><img src='".base_url()."img/organic/red.jpg' width='25' height='25'></div>";
										
                            $html .= "<ul class='g2'> \n";
										
                            $html .= $this->updateGroups($group_id);
										
                            $html .= "</ul><br/><br/><br/>";
							
                            $html .= "<img class='group2' src='".base_url()."img/organic/arrow1.png' width='200' height='15' >";
							
                            $html .= "</div>";
                            
                        }
							
														
							
                        else {
								
                            $html .= "<div class='col-md-3'>"; 
                            $html .= "<div id='".$group->group_id."' class='col-lg-3 group1'>";
                            $html .= "<ul>\n";	
                            $html .= "<img src='".base_url()."img/organic/".ucwords($group->group_name)."' />";
                            $html .= "</ul>";		
                            $html .= "</div>";
							
                            
                        }			
										
			
                      										
                      	 $html .= "</div>";	
                         $html .= "</div>";
                        
                        }
			 
                         echo  $html;
                         
                    }
							
					
                          
            
        }


        
        public function removeAnswers($m_id, $oqid)
	 {       
                $user_id = $this->session->userdata('userid');
               
            
                
                $this->db->where('member_id' , $m_id);
                 $this->db->where('q_id' , $oqid);
                $this->db->where('user_id' , $user_id);
                $this->db->delete('organic_user_group'); 
             
               
                $this->getMembers_reload($oqid, $user_id);
         }
         
         
        public function getMembers_reload($oqid, $user_id)
	{
            $this->db->select('*');   
            $this->db->where('q_id', $oqid);         
            $query = $this->db->get('organic_members');
            $row = $query->row();
            
            $members = $query->result();
            $num_ans = $query->num_rows();
                $html = "";
		if($members)
			{
			foreach($members as $member)
				{
				$html .= "<div class='col-lg-6 draggable_ans' id='mem".$member->member_id."'>\n";
				$html .= "<img src='".base_url()."img/organic/".$member->member_image."' rel='".$member->member_image."'>\n";
				$html .= "<b>".ucwords($member->member_name)."</b>\n";
				$html .= "</div>";	
				}
			}
			else{
				$html .= "";	
                        }				
								
								
			echo  $html;
	}
                                        
                                        
       public function checkAnswers($oqid, $user_id) 
       {
           
            $this->db->select('*');   
            $this->db->where('q_id', $oqid); 
            $this->db->where('user_id', $user_id); 
            $query = $this->db->get('organic_user_group');
            $row = $query->row();            
            $ret['checkAnss'] = $query->result();
            $ret['checkas_num'] = $query->num_rows();
            return $ret;
            
            foreach($checkAnss as $checkAns)
                   {
                      $this->db->select('*');   
                      $this->db->where('q_id', $oqid); 
                      $this->db->where('qno', $checkAns->group_id); 
                      $query1 = $this->db->get('organic_anwers');
                      $row1 = $query1->row(); 
                      
                  }                              
           
           
           
       }
       
       public function restAnswers($oqid, $user_id) 
       {
          
             $this->db->where('q_id' , $oqid);
             $this->db->where('user_id' ,$user_id);
             $this->db->delete('organic_user_group'); 
             
             $this->db->select('*');   
            $this->db->where('q_id', $oqid); 
            $this->db->where('user_id', $user_id);
            $this->db->group_by("member_id");
            $query2 = $this->db->get('organic_user_group');
            $row = $query2->row();
          
            $this->db->select('*');   
            $this->db->where('q_id', $oqid);         
            $query = $this->db->get('organic_members');
            $row = $query->row();
            
            $ret['oqalist'] = $query->result();
            $ret['num_ans'] = $query->num_rows();
            
            $this->db->select('*');   
            $this->db->where('q_id', $oqid);    
            $this->db->order_by("sort", "asc");
            $query1 = $this->db->get('organic_groups');
            $row = $query1->row();
            
            $ret['oqqlist'] = $query1->result();
            $ret['num_quz'] = $query1->num_rows();
            
            $ret['ans_grp'] = $query2->result();
            $ret['num_ansg'] = $query2->num_rows();
            
            
            return $ret;
       }
       
         
        
}

?>