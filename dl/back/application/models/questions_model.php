<?php

class Questions_model extends CI_Model{
    
    public function addQuestion(){
        
        //$userId = $this->session->userdata('p_id');
        $data = array(
            'quiz_id' => $this->input->post('ququiz'),
            'question_category' => $this->input->post('qucategory'),
            'name' => $this->input->post('qutitle'),
            'questiontext' => $this->input->post('qutext')
        );
        $dateTime['create_datetime'] = date('Y-m-d H:i:s');
        
        $query = $this->db->insert('questions',$data,$dateTime);
        if($query){
            return true;
        } else {
            return false;
        }
    }
    
    public function selectData(){
        
        $this->db->select('qz_id,qz_name');
        $query1 = $this->db->get("quiz");
        
        $this->db->select('id,category_name');
        $query2 = $this->db->get("groupcategories");
        
        $res['quiz_list'] = $query1->result();
        $res['row1'] = $query1->row();
        
        $res['category_list'] = $query2->result();
        $res['row2'] = $query2->row();

        return $res;
        
    } 
    
    
    
}

