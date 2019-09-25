<?php 
class gradeModel extends CI_Model {

	public function getGrades(){


         $query = $this->db->get('nana_grades');
         $rew['grades'] = $query->result();
         return  $rew;
        

	}
}